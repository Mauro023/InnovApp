<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('second_last_name')->nullable();
            $table->string('state');
            $table->integer('workposition_id')->unsigned();
            $table->integer('cost_center_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('workposition_id')->references('id')->on('work_positions');
            $table->foreign('cost_center_id')->references('id')->on('cost_centers');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
