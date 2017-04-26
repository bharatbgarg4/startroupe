<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('bio');
			$table->string('imgUrl');
			$table->string('mobile');

			$table->timestamp('viewed');

			$table->string('facebook');
			$table->string('youtube');
			$table->string('twitter');
			$table->string('linkedin');

			$table->integer('views')->unsigned()->default(1);
			$table->integer('likes')->unsigned()->default(0);
			$table->string('birthDate');
			$table->string('lastJob');
			$table->text('lastJobDetails');
			$table->text('company');
			$table->string('height');
			$table->string('skinColor');
			$table->string('eyesColor');
			$table->string('chest');
			$table->string('waist');
			$table->string('hips');
			$table->string('hairColor');
			$table->string('house');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->string('pinCode');
			$table->boolean('married')->default(false);
			$table->boolean('travel')->default(true);
			$table->string('language');

			$table->string('email')->unique()->index();
			$table->string('username')->unique()->index();
			$table->string('password', 60)->index();
			$table->boolean('admin')->default(false);
			$table->boolean('editor')->default(false);
			$table->boolean('artist')->default(false);
			$table->string('token')->nullable()->default(null);
			$table->rememberToken();
			$table->timestamps();

			$table->integer('talent_id')->unsigned()->nullable()->index();
			$table->foreign('talent_id')->references('id')->on('talents')->onDelete('set null');

			$table->integer('location_id')->unsigned()->nullable()->index();
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
