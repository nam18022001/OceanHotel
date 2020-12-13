<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBuildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('build', function (Blueprint $table) {
            //
            $table->integer('id_khachhang');
            $table->string('date_book');
            $table->string('check_out');
            $table->integer('id_phong')->nullable()->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('build', function (Blueprint $table) {
            //
        });
    }
}
