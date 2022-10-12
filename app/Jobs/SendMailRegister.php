<?php

namespace FleetCart\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Themes\Fpt\Emails\RegisterOnlineMail;

class SendMailRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $toEmails;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($toEmails, $data)
    {
        $this->toEmails = $toEmails;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->toEmails)->send(new RegisterOnlineMail($this->data));
    }
}
