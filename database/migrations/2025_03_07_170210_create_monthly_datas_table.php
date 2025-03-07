<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('amounth');
            $table->integer('id_advisor')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_advisor')->references('id')->on('advisors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('monthly_datas');
    }
}
