<?php

namespace Themes\Fpt\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
    */

    public function build()
    {
        return $this->from('no-reply@gmail.com')
            ->subject('[FPT Telecom] Vui lòng xác thực tài khoản của bạn')
            ->view('public.mail.verify_account')
                    ->with(
                        'data', $this->data,
                        );
    }
}
