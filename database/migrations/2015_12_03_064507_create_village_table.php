<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
          Schema::create('village', function (Blueprint $table) {
          $table->integer('id',true,false)->unique()->index(); 
          $table->integer('district_id', false,false);
           $table->string('taluk', 100);
			    $table->string('village', 100);
          $table->string('stcode',10);
          $table->string('dtcode',10);
			    $table->string('sdtcode', 10);
			    $table->string('tvcode',10);
			    $table->string('population');
			    $table->string('malepopulation');
			    $table->string('femalepopulation');
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
       Schema::drop('village');
    }
}
