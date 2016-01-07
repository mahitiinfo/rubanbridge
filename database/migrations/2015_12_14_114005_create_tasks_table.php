<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->integer('card_id',false,false)->index();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title','50');
            $table->string('order_value',10);
            $table->string('delivery_time');
            $table->string('no_of_people', 30);
            $table->text('description');
            $table->tinyInteger('status');
            $table->integer('added_by',false,false);
            $table->integer('updated_by',false,false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
