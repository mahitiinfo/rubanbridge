<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->integer('id',true,false)->unique()->index();
			$table->string('name', 100);
			$table->integer('sector_id',false,false);
            $table->integer('district_id',false,false);
			$table->integer('camps',false,false);
			$table->string('deliver_time',10);
			$table->string('total_villagers',10);
			$table->string('budget',15);
			$table->string('orders',15);
			$table->date('start_date');
			$table->date('end_date');
			$table->text('comments');
			$table->string('image', 50);
			$table->tinyInteger('active');
			$table->tinyInteger('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}
