<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->integer('id',true,false)->unique()->index();
            $table->string('name', 100);
            $table->text('permissions');
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
		Schema::drop('permissions');
	}

    /**
     * Create default Permissions
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return void
     */
    public function seed()
    {
        DB::table('permissions')->insert(array(
            array(
                'name' => 'Dashboard',
                'permissions' => json_encode(array('ruban.home')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Users',
                'permissions' => json_encode(array('users.view','users.create','users.update','users.delete')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Groups',
                'permissions' => json_encode(array('groups.view','groups.create','groups.update','groups.delete')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Permissions',
                'permissions' => json_encode(array('permissions.view','permissions.create','permissions.update','permissions.delete')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Projects',
                'permissions' => json_encode(array('projects.view','projects.create','projects.update','projects.delete')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Cards',
                'permissions' => json_encode(array('cards.view','cards.create','cards.update','cards.delete')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ),
            array(
                'name' => 'Districts',
                'permissions' => json_encode(array('districts.view','districts.create','districts.update','districts.delete','districts.import')),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            )
           
        ));


    }
}

