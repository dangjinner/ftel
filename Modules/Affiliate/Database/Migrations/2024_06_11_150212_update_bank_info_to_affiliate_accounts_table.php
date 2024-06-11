<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBankInfoToAffiliateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_accounts', function (Blueprint $table) {
            $table->string('bank_account_name')->after('address')->nullable();
            $table->string('bank_account_number')->after('bank_account_name')->nullable();
            $table->string('bank_name')->after('bank_account_number')->nullable();
            $table->string('bank_branch')->after('bank_name')->nullable();
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
