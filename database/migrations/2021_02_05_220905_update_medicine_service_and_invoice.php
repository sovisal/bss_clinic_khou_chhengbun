<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMedicineServiceAndInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->double('price')->after('name');
        });


        Schema::table('invoice_details', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable()->change();
        });

        Schema::table('invoice_details', function (Blueprint $table) {
          $table->unsignedBigInteger('medicine_id')->nullable()->after('service_id');

          $table->foreign('medicine_id')
              ->references('id')->on('medicines')
              ->onDelete('cascade')
              ->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function($table) {
            $table->dropColumn('price');
        });
        Schema::table('invoice_details', function($table) {
            $table->dropForeign(['medicine_id']);
            $table->dropColumn('medicine_id');
        });
    }
}
