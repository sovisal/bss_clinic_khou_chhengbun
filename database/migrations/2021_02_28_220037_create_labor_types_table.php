<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaborTypesTable extends Migration
{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('labor_types', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('name', 255);
					$table->string('slug', 255)->unique();
					$table->text('description')->nullable();
					$table->timestamps();
			});

			
				// Insert some languages
				$labor_types = [
						[
							'name' => 'Labo',
							'slug' => 'labor-standard',
							'description' => '',
						],
						[
							'name' => 'Hematology',
							'slug' => 'hematology',
							'description' => '',
						],
						[
							'name' => 'Biologie',
							'slug' => 'biologie',
							'description' => '',
						],
						[
							'name' => 'Urine',
							'slug' => 'urine',
							'description' => '',
						],
						[
							'name' => 'Serologie',
							'slug' => 'serologie',
							'description' => '',
						],
						[
							'name' => 'Blood type',
							'slug' => 'blood-type',
							'description' => '',
						],
				];
				DB::table('labor_types')->insert($labor_types);
				
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
				Schema::dropIfExists('labor_types');
		}
}
