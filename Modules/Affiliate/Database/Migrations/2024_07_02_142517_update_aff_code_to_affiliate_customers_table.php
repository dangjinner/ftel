<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAffCodeToAffiliateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_customers', function (Blueprint $table) {
            if(Schema::hasColumn('affiliate_customers', 'aff_code')) {
                $table->string('aff_code')->nullable()->change();
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

        });
    }
}
