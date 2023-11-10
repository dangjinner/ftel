<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBonusToServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_translations', function (Blueprint $table) {
            if(!Schema::hasColumn('service_translations', 'bonus')) {
                $table->text('bonus')->nullable()->after('feature');
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
        Schema::table('service_translations', function (Blueprint $table) {

        });
    }
}
