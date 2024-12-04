<?php

namespace Modules\Affiliate\Console;

use Illuminate\Console\Command;
use Modules\Affiliate\Entities\AffiliateCustomer;

class UpdateAffiliateCustomerCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'affiliate:update-customer-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update fields value for affiliate customer.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $affiliateCustomers = AffiliateCustomer::whereDate('created_at', '<=', '2024-12-4')->get();

        foreach ($affiliateCustomers as $affiliateCustomer) {
            $link = $affiliateCustomer->link;
            if ($affiliateCustomer->link) {
                $affiliateCustomer->update([
                    'aff_account_id' => $link->aff_account_id,
                    'aff_product_id' => $link->aff_product_id,
                    'aff_link_id' => $link->id
                ]);
            }
        }
    }
}
