<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->string('name')->unique();
            $table->text('permissions');
            $table->tinyInteger('active');
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
        //
        Schema::drop('groups');
    }
    public function seed()
    {
        DB::table('groups')->insert(array(
            array(
                'name' => 'Super Admin',
                'active' =>1,
                'permissions'=>'{"superuser":"1"}',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'name' => 'Client',
                'active' =>1,
                                        'permissions'=>'{"ruban.home":"1","users.updateprofile":"1","users.profileudpate":"1","projects.view":"1","projects.create":"1","projects.update":"1","projects.delete":"1","cards.create":"1","cards.edit":"1","cards.view":"1","cards.delete":"1","cards.update":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.import":"1","districts.ajax":"1"}',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'name' => 'Partner',
                'active' =>1,
                'permissions'=>'{"ruban.home":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","cards.view":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1"}',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'name' => 'Operator',
                'active' =>1,
'permissions'=>'{"ruban.home":"1","users.view":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","projects.view":"1","cards.view":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1"}',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            )
        ));

    }
}
