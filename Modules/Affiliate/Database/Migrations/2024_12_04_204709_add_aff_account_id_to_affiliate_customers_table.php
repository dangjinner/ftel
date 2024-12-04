<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAffAccountIdToAffiliateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_customers', function (Blueprint $table) {
            if (!Schema::hasColumn('affiliate_customers', 'aff_account_id')) {
                $table->unsignedBigInteger('aff_account_id')->default(0)->index();
            }

            if (!Schema::hasColumn('affiliate_customers', 'aff_product_id')) {
                $table->unsignedBigInteger('aff_product_id')->default(0)->index();
            }

            if (!Schema::hasColumn('affiliate_customers', 'aff_link_id')) {
                $table->unsignedBigInteger('aff_link_id')->default(0)->index();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_customers', function (Blueprint $table) {
            if (Schema::hasColumn('affiliate_customers', 'aff_account_id')) {
                $table->dropColumn('aff_account_id');
            }

            if (Schema::hasColumn('affiliate_customers', 'aff_product_id')) {
                $table->dropColumn('aff_product_id');
            }

            if (Schema::hasColumn('affiliate_customers', 'aff_link_id')) {
                $table->dropColumn('aff_link_id');
            }
        });
    }
}
