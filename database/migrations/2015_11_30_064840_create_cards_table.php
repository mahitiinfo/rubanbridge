<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('cards', function(Blueprint $table) {
			$table->integer('id',true,false)->unique()->index();
			$table->integer('project_id',false,false);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('sector_id',false,false);
            $table->integer('district_id',false,false);
			$table->string('name', 100);
			$table->integer('camps',false,false);
			$table->string('deliver_time',10);
			$table->string('total_villagers',10);
			$table->string('budget',15);
			$table->string('orders',15);
			$table->date('start_date');
			$table->date('end_date');
			$table->text('comments');
			$table->tinyInteger('active');
			$table->tinyInteger('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cards');
	}
}
