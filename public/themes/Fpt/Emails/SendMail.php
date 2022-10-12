<?php

namespace Themes\Fpt\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $provinces;
    public $district;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $provinces, $district)
    {
        $this->data = $data;
        $this->provinces = $provinces;
        $this->district = $district;
    }

    /**
     * Build the message.
     *
     * @return $this
    */

    public function build()
    {
        return $this->from('no-reply@gmail.com')->subject('Đăng ký dịch vụ FPT')->view('public.mail.mail_register')
                    ->with(
                        'data', $this->data,
                         'provinces', $this->provinces, 
                         'district', $this->district
                        );
    }
}
