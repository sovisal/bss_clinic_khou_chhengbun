<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaborServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labor_services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('default_value')->nullable();
            $table->string('unit')->nullable();
            $table->double('ref_from')->nullable();
            $table->double('ref_to')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
  
            $table->foreign('category_id')
                ->references('id')->on('labor_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
  
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
        Schema::dropIfExists('labor_services');
    }
}
