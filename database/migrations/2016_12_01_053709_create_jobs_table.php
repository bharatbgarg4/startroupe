<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->timestamp('start');
			$table->timestamp('finish');
			$table->text('content');
			$table->string('title');
			$table->string('budget')->default('0');

			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
		Schema::drop('jobs');
	}
}
