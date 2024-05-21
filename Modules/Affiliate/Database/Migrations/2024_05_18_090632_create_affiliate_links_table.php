<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('aff_account_id')->index();
            $table->unsignedBigInteger('aff_product_id')->index();
            $table->string('code')->unique()->index();
            $table->string('utm_source');
            $table->string('utm_campaign');
            $table->string('utm_content');
            $table->string('utm_medium');
            $table->boolean('status');
            $table->dateTime('expired_at');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_links');
    }
}
