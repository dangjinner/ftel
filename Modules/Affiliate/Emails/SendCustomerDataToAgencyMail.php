<?php

namespace Modules\Affiliate\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Affiliate\Entities\AffiliateAccount;
use Modules\Affiliate\Entities\AffiliateCustomer;

class SendCustomerDataToAgencyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $affiliateCustomer;
    protected $affiliateAgency;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AffiliateCustomer $affiliateCustomer, AffiliateAccount $affiliateAgency)
    {
        $this->affiliateCustomer = $affiliateCustomer;
        $this->affiliateAgency = $affiliateAgency;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("[Ftel.vn] Khách hàng {$this->affiliateCustomer->name} vừa đăng ký dịch vụ!")
            ->view('affiliate::emails.customer_data_for_agency', [
                'affiliateCustomer' => $this->affiliateCustomer,
                'affiliateAccount' => $this->affiliateAgency
            ]);
    }
}
