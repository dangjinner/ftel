<?php

namespace Modules\Affiliate\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Modules\Affiliate\Emails\SendCustomerDataToAgencyMail;
use Modules\Affiliate\Entities\AffiliateCustomer;

class SendCustomerDataToAgencyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $affiliateCustomer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AffiliateCustomer $affiliateCustomer)
    {
        $this->affiliateCustomer = $affiliateCustomer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $affiliateAccount = $this->affiliateCustomer->account;

        if ($affiliateAccount && $affiliateAccount->isAgency()) {
            Mail::to($affiliateAccount->email)->send(new SendCustomerDataToAgencyMail(
                $this->affiliateCustomer,
                $affiliateAccount
            ));
        }
    }
}
