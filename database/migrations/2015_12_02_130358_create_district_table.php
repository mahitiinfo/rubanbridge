<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('district', function (Blueprint $table) {
          $table->integer('id',true,false)->unique()->index(); 
          $table->string('state', 50);
          $table->string('district', 50);
			            $table->timestamps();
            $table->softDeletes();
             });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('district');
    }
}
