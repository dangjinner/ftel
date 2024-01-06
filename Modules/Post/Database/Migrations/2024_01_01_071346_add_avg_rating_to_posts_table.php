<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvgRatingToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if(!Schema::hasColumn('posts', 'is_default_rating')) {
                $table->boolean('is_default_rating')->default(1)->after('video');
            }
            if(!Schema::hasColumn('posts', 'custom_avg_rating')) {
                $table->float('custom_avg_rating', 2,1)->default(5)->after('is_default_rating');
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
        Schema::table('posts', function (Blueprint $table) {

        });
    }
}
