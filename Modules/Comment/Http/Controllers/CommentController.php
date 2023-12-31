<?php

namespace Modules\Comment\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Comment\Emails\SendCommentNoticeMail;
use Modules\Comment\Emails\SendReplyCommentNoticeMail;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Entities\LikeCommentHistory;
use Modules\Comment\Http\Requests\Client\GetCommentListRequest;
use Modules\Comment\Http\Requests\Client\ReplyCommentRequest;
use Modules\Comment\Http\Requests\Client\SeedingCommentRequest;
use Modules\Comment\Http\Requests\Client\StoreCommentRequest;
use Modules\Comment\Services\GoogleSheetComment;
use Spatie\SchemaOrg\ComedyClub;

class CommentController extends Controller
{
    public function getCommentList(GetCommentListRequest  $request)
    {
        $comments = Comment::with(['replies' => function($query) {
                $query->with(['user'])->active();
            }, 'user'])
            ->orderBy($request->sort_by ?? 'created_at', $request->sort_type ?? 'DESC')
            ->filterByType($request->type, $request->url, $request->post_id)
            ->where(Comment::REPLY_ID, 0)
            ->search($request->keyword)
            ->active()
            ->paginate(5);
        return response()->json($comments);
    }

    public function storeComment(StoreCommentRequest $request)
    {
        $user = \auth()->user();

        if(!$user) return back();

        $comment = Comment::create([
            Comment::TYPE => $request->type,
            Comment::USER_ID => $user->id,
            Comment::CONTENT => $request->get('content'),
            Comment::POST_ID => $request->post_id,
            Comment::URL => $request->url,
            Comment::CUSTOMER_NAME => $user->first_name,
            Comment::CUSTOMER_EMAIL => $user->email,
            Comment::STATUS => ($user->isAdmin() || $user->isEditor()) ? Comment::APPROVED : Comment::PENDING,

        ]);

        $mails = str_replace(' ', '', setting('store_email'));
        $mails = explode(',', $mails);

        Mail::to($mails)
            ->queue(new SendCommentNoticeMail($comment));

        return response()->json($comment, 201);
    }

    public function seedingComment(SeedingCommentRequest  $request)
    {
        $comment = Comment::create($request->all());
        $mails = str_replace(' ', '', setting('store_email'));
        $mails = explode(',', $mails);

        Mail::to($mails)
            ->queue(new SendCommentNoticeMail($comment));

        return response()->json($comment, 201);
    }

    public function likeComment($commentId, Request $request)
    {
        DB::beginTransaction();
        try{
            $comment = Comment::findOrFail($commentId);
            $checkLiked = $comment->likeHistories()->where(LikeCommentHistory::IP_ADDRESS, $request->ip())->exists();
            if($checkLiked) {
                return response()->json(false, 400);
            }
            $comment->increment(Comment::TOTAL_LIKE);
            $comment->likeHistories()->create([
                LikeCommentHistory::IP_ADDRESS => $request->ip()
            ]);
            DB::commit();
            return response()->json(true);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }
    }

    public function replyComment($commentId, ReplyCommentRequest $request)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::findOrFail($commentId);
            $user = Auth::user();
            $customerName = $user->first_name;
            $createdAt = Carbon::now();

            if($user->isAdmin() && request('customer_name')) {
                $customerName = request('customer_name');
            }

            if($user->isAdmin() && request('created_at')) {
                $createdAt = request('created_at');
            }

            $reply = $comment->replies()->create([
                Comment::TYPE => $request->type,
                Comment::USER_ID => $user->id,
                Comment::CONTENT => $request->get('content'),
                Comment::POST_ID => $request->post_id,
                Comment::URL => $request->url,
                Comment::CUSTOMER_NAME => $customerName,
                Comment::STATUS => $user->isAdmin() || $user->isEditor() ? Comment::APPROVED : Comment::PENDING,
                Comment::CUSTOMER_EMAIL => $user->email,
                Comment::CREATED_AT => $createdAt,

            ]);


            DB::commit();

            if($reply->replyTo && $reply->replyTo->customer_email) {
                Mail::to($reply->replyTo->customer_email)
                    ->queue(new SendReplyCommentNoticeMail($reply));
            }

            return response()->json($comment);
        }catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(false, 500);
        }
    }

    public function seedingReplyComment($commentId, ReplyCommentRequest $request)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::findOrFail($commentId);
            $reply = $comment->replies()->create($request->all());
            $user = Auth::user();
            $reply->update([
                Comment::USER_ID => Auth::id(),
                Comment::STATUS => $user->isAdmin() || $user->isEditor() ? Comment::APPROVED : Comment::PENDING,
            ]);
            DB::commit();
            if($reply->replyTo->customer_email) {
                Mail::to($reply->replyTo->customer_email)
                    ->queue(new SendReplyCommentNoticeMail($reply));
            }
            return response()->json($comment);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(false, 500);
        }
    }
}
