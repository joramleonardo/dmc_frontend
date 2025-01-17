<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTrackingEventLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
     public function up()
     {
         Schema::create('tbl_tracking_event_log', function (Blueprint $table) {
             $table->id();
             $table->string('album_id');
             $table->string('activity');
             $table->string('date');
             // $table->string('name_author');
             // $table->string('name_publisher');
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
        Schema::dropIfExists('tbl_tracking_event_log');
    }
}
