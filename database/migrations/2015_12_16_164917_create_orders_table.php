<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id',true,false)->unique()->index();
            $table->integer('camp_id',false,false)->index();
            $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade')->onUpdate('cascade');
            $table->string('order_id',50);
            $table->string('warehouse',50);
            $table->datetime('ship_date')->nullable();
            $table->string('status', 30);
            $table->string('order_amount', 30);
            $table->string('actual_time_to_deliver', 10);
            $table->string('payment_method', 30);
            $table->string('associate', 30);
            $table->string('address_type', 30);
            $table->text('address');
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
        Schema::drop('orders');
    }
}
