<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomAvgRatingToCategoryServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_services', function (Blueprint $table) {
            if(!Schema::hasColumn('category_services', 'is_default_rating')) {
                $table->boolean('is_default_rating')->default(1)->after('position');
            }
            if(!Schema::hasColumn('category_services', 'custom_avg_rating')) {
                $table->float('custom_avg_rating', 2,1)->default(5)->after('is_default_rating');
            }
            if(!Schema::hasColumn('category_services', 'custom_rating_count')) {
                $table->integer('custom_rating_count')->default(0)->after('custom_avg_rating');
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
        Schema::table('category_services', function (Blueprint $table) {

        });
    }
}
