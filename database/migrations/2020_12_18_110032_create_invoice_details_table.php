<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invoice_details', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->double('quantity');
          $table->double('amount');
          $table->text('description');
          $table->integer('index');
          $table->double('discount')->default('0');
          $table->unsignedBigInteger('invoice_id');
          $table->unsignedBigInteger('service_id');
          $table->unsignedBigInteger('created_by');
          $table->unsignedBigInteger('updated_by');
          $table->timestamps();

          $table->foreign('invoice_id')
              ->references('id')->on('invoices')
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->foreign('service_id')
              ->references('id')->on('services')
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
        Schema::dropIfExists('invoice_details');
    }
}
