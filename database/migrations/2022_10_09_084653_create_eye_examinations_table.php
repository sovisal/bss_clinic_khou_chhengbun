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
			$table->string('image_uper_lide_re')->nullable();
			$table->string('image_uper_lide_le')->nullable();
			$table->string('image_eye_boll_re')->nullable();
			$table->string('image_eye_boll_le')->nullable();
			$table->string('image_locver_lide_re')->nullable();
			$table->string('image_locver_lide_le')->nullable();
			$table->string('initial_iop_re')->nullable();
			$table->string('initial_iop_le')->nullable();
			$table->string('primary_diagnosis_re')->nullable();
			$table->string('primary_diagnosis_le')->nullable();
			$table->string('initial_iop_re')->nullable();
			$table->string('initial_iop_le')->nullable();
			$table->string('primary_diagnosis_re')->nullable();
			$table->string('primary_diagnosis_le')->nullable();
			$table->string('ocular_movem_re')->nullable();
			$table->string('ocular_movem_le')->nullable();
			$table->string('eyelid_las_re')->nullable();
			$table->string('eyelid_las_le')->nullable();
			$table->string('conjunctiva_re')->nullable();
			$table->string('conjunctiva_le')->nullable();
			$table->string('cornea_re')->nullable();
			$table->string('cornea_le')->nullable();
			$table->string('ac_re')->nullable();
			$table->string('ac_le')->nullable();
			$table->string('lris_pupil_re')->nullable();
			$table->string('lris_pupil_le')->nullable();
			$table->string('lens_re')->nullable();
			$table->string('lens_le')->nullable();
			$table->string('retinal_reflex_re')->nullable();
			$table->string('retinal_reflex_le')->nullable();
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
