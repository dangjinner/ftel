<?php

namespace Modules\Comment\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Services\GoogleSheetComment;

class SendCommentDataToSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
         $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $googleSheet = new GoogleSheetComment();
            $createdAt = Carbon::parse($this->comment->updated_at)->format('d/m/Y H:i:s');
            $customerName = $this->comment->customer_name;
            $gender = $this->comment->customer_gender;
            $phone = $this->comment->customer_phone;
            $email = $this->comment->customer_email;
            $content = $this->comment->content;
            $url = $this->comment->link();
            $googleSheet->saveDataToSheet([
                [$createdAt, $customerName, $gender, $phone, $email, $content, $url]
            ]);
        }catch (\Exception $e) {
            $this->fail($e);
        }

    }

    public function fail($exception = null)
    {
        Log::error($exception->getMessage());
    }
}
