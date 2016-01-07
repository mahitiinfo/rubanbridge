<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function(Blueprint $table) {
			$table->integer('id',true,false)->unique()->index();
			$table->string('name', 100);
			$table->timestamps();
			$table->softDeletes();
			});
			$this->seed();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('sector');
    }
    public function seed()
    {
    DB::table('sector')->insert(array(
            array(
                'name' => 'Agriculture',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Education',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Health Care',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Water',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'House',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Hand',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            )
        ));
    }
}
