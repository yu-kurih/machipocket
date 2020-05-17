<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('event_id')->unsigned()->index();
            $table->timestamps();
            $table->integer('deleted_flag')->default(0);
            
            //外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');;
            
            // user_idとevent_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled');
    }
}
