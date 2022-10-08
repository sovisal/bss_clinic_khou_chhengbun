<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('patients', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('id_card')->nullable();
          $table->string('email')->nullable();
          $table->string('phone')->nullable();
          $table->string('gender')->nullable();
          $table->string('age')->nullable();
          $table->text('description')->nullable();

          $table->string('full_address')->nullable();
          $table->string('address_village')->nullable();
          $table->string('address_commune')->nullable();
          $table->unsignedBigInteger('address_district_id')->nullable();
          $table->unsignedBigInteger('address_province_id')->nullable();

          $table->unsignedBigInteger('created_by');
          $table->unsignedBigInteger('updated_by');
          $table->timestamps();

          $table->foreign('address_district_id')
              ->references('id')->on('districts')
              ->onDelete('no action')
              ->onUpdate('no action');

          $table->foreign('address_province_id')
              ->references('id')->on('provinces')
              ->onDelete('no action')
              ->onUpdate('no action');

          $table->foreign('created_by')
              ->references('id')->on('users')
              ->onDelete('no action')
              ->onUpdate('no action');

          $table->foreign('updated_by')
              ->references('id')->on('users')
              ->onDelete('no action')
              ->onUpdate('no action');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
