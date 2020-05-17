<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->index();
            $table->string('title');
            $table->string('date');
            $table->string('time');
            $table->string('place');
            $table->string('content');
            $table->integer('capasity');
            $table->string('deadlinedate');
            $table->string('deadlinetime');
            $table->string('image');
            $table->string('situation');
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
