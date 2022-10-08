<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setting', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('logo');
			$table->string('clinic_name_kh', 255);
			$table->string('clinic_name_en', 255);
			$table->string('sign_name_kh')->nullable();
			$table->string('sign_name_en')->nullable();
			$table->string('phone')->nullable();
			$table->text('address')->nullable();
			$table->text('description')->nullable();
			$table->text('echo_address')->nullable();
			$table->text('echo_description')->nullable();
			$table->string('navbar_color')->default('navbar-white navbar-light');
			$table->boolean('sidebar_color')->default(0);
			$table->boolean('legacy')->default(0);
			$table->unsignedBigInteger('user_id');
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		
		// Insert some languages
		$setting = [
			[
				'logo' => 'logo.png',
				'clinic_name_kh' => 'ឈ្មោះគ្លីនិច',
				'clinic_name_en' => 'Clinic Name',
				'sign_name_kh' => 'ឈ្មោះវេជ្ជបណ្ឌិត',
				'sign_name_en' => 'Dr. Name',
				'description' => 'បររិាយសេវាកម្មរបស់គ្លីនិច',
				'echo_description' => '-ពិនិត្យអេកូពំណ៍​<br/>
-ពិនិត្យឈាមដោយម៉ាស៊ីនស្វ័យប្រវត្ត<br/>
-ព្យាបាលេជំងឺ កុមារ មនុស្សចាស់ រោគស្រ្តី​ និង​សម្ភព',
				'phone' => '0',
				'address' => '0',
				'navbar_color' => 'navbar-white navbar-light',
				'sidebar_color' => 0,
				'user_id' => 1,
			],
		];
		DB::table('setting')->insert($setting);
	

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('setting');
	}
}
