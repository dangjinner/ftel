<?php

namespace Themes\Fpt\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterOnlineMail extends Mailable
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
        return $this->from('no-reply@gmail.com')->subject('Đăng ký dịch vụ FPT')->view('public.mail.mail_register_online')
                    ->with(
                        'data', $this->data,
                        );
    }
}
