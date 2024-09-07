<?php

namespace FleetCart\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\Comment\Entities\Comment;
use Modules\Post\Entities\Post;
use Themes\Fpt\Http\Services\GoogleSheetAdsen;

class ChatRegisterServiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $googleSheetAdsense = new GoogleSheetAdsen();

        try {
            $request = $this->request;
            $name = $request['chat_customer_name'];
            $phone = $request['chat_customer_phone'];
            $address = $request['chat_customer_address'];
            $service = $request['chat_service_option'];
            $message = '[Đăng ký từ hộp chat] ' . $request['chat_customer_note'];
            $currentDate = date('d/m/Y H:i:s');

            $utmSource = '';
            $utmMedium = '';
            $utmCapaign = '';
            $utmTerm = '';
            $utmContent = '';
            $ipAddress = $request['ip'];
            $currentURL = url('/') . $request['chat_current_url'];

            $googleSheetAdsense->saveDataToSheet([
                [$currentDate, $name, $phone, $address, $service ,$message, $utmSource, $utmMedium, $utmCapaign, $utmTerm,  $utmContent, $ipAddress,  $currentURL]
            ]);

            if($request['chat_customer_note']) {
                $currentURL = str_replace_first('/', '', $request['chat_current_url']);
                $post = Post::where('slug', $currentURL)->first();
                $commentType = Comment::TYPE_URL;
                $postId = 0;
                if($post) {
                    $commentType = Comment::TYPE_POST_ID;
                    $postId = $post->id;
                }
                Comment::create([
                    Comment::CUSTOMER_NAME => $name,
                    Comment::CUSTOMER_PHONE => $phone,
                    Comment::CONTENT => $request['chat_customer_note'],
                    Comment::URL => $currentURL,
                    Comment::TYPE => $commentType,
                    Comment::POST_ID => $postId
                ]);
            }

        }catch (\Exception $e) {
            $this->fail();
            Log::error($e->getMessage());
        }
    }
}
