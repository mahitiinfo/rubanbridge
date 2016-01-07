<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->integer('card_id',false,false)->index();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name','50');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('no_of_people', 30);
            $table->string('target', 30);
            $table->text('address');
            $table->tinyInteger('active');
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
        Schema::drop('camps');
    }
}
