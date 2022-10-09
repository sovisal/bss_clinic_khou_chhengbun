<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEyeExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eye_examinations', function (Blueprint $table) {
            $table->id();
			$table->date('date');
			$table->integer('ee_number');
			$table->double('plain_eye_vare');
			$table->double('plain_eye_vale');
			$table->double('with_ph_vare');
			$table->double('with_ph_vale');
			$table->double('with_glasses_vare');
			$table->double('with_glasses_vale');
			$table->double('initial_iop_re');
			$table->double('initial_iop_le');
			$table->double('primary_diagnosis_re');
			$table->double('primary_diagnosis_le');
			$table->double('image_uper_lide_re');
			$table->double('image_uper_lide_le');
			$table->double('image_eye_boll_re');
			$table->double('image_eye_boll_le');
			$table->double('locver_lide_re');
			$table->double('locver_lide_le');
			$table->text('remark')->nullable();
			$table->unsignedBigInteger('patient_id')->nullable();
			$table->unsignedBigInteger('created_by');
			$table->unsignedBigInteger('updated_by');
			$table->timestamps();

			$table->foreign('patient_id')
				->references('id')->on('patients')
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
        Schema::dropIfExists('eye_examinations');
    }
}
