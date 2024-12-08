<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToAffiliateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_accounts', function (Blueprint $table) {
            if (!Schema::hasColumn('affiliate_accounts', 'type')) {
                $table->string('type', 50)->default(\Modules\Affiliate\Entities\AffiliateAccount::TYPE_NORMAL);
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
        Schema::table('affiliate_accounts', function (Blueprint $table) {

        });
    }
}
