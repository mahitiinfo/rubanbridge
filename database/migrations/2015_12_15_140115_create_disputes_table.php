<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->integer('project_id',false,false)->index();
            $table->foreign('project_id')->references('id')->on('cards')->onDelete('cascade')->onUpdate('cascade');
            $table->text('reason');
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
        Schema::drop('disputes');
    }
}
