<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->integer('group_id',false,false)->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('first_name', 50);
            $table->string('last_name', 30);
            $table->string('pancard', 15);
            $table->string('company_name', 255);
            $table->text('address');
            $table->string('image', 255);
            $table->tinyInteger('active');
            $table->rememberToken();
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
        Schema::drop('users');
    }
    
     public function seed()
    {
        $group=DB::table('groups')->select('id')->where('name','Super Admin')->first();
        $client=DB::table('groups')->select('id')->where('name','Client')->first();
        $partner=DB::table('groups')->select('id')->where('name','Partner')->first();
        $operator=DB::table('groups')->select('id')->where('name','Operator')->first();
        
        $group_id=$group->id;
        DB::table('users')->insert(array(
            array(
                'email' => 'venkatesangee@gmail.com',
                'password' => bcrypt('123456'),
                'first_name' => 'Venkatesan',
                'group_id'=>$group_id,
                'name' => 'Venkatesan',
                'last_name' => 'C',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'email' => 'arun.kumar@mahiti.org',
                'password' => bcrypt('123456'),
                'first_name' => 'Arun',
                'group_id'=>$client->id,
                'name' => 'Arun',
                'last_name' => 'Kumar',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'email' => 'vijay@mahiti.org',
                'password' => bcrypt('123456'),
                'first_name' => 'Vijay',
                'group_id'=>$partner->id,
                'name' => 'Vijay',
                'last_name' => 'R',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ),
            array(
                'email' => 'venkatesan.c@mahiti.org',
                'password' => bcrypt('123456'),
                'first_name' => 'Venkatesan',
                'group_id'=>$operator->id,
                'name' => 'Venkatesan',
                'last_name' => 'C',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            )
        ));

    }
}
