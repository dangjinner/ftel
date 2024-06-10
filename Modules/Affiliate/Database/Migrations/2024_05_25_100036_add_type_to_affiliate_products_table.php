<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToAffiliateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_products', function (Blueprint $table) {
            $table->boolean('type')->after('page_url')->default(1);
            $table->smallInteger('cookie_duration')->after('type')->default(7);
            $table->boolean('is_set_cookie')->after('cookie_duration')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_products', function (Blueprint $table) {

        });
    }
}
