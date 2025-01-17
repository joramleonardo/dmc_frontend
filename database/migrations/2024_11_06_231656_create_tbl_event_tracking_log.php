<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventTrackingLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_tracking_log', function (Blueprint $table) {
            $table->id();
            $table->string('album_id');
            $table->string('name_author');
            $table->string('name_publisher');
            $table->string('date_created');
            $table->string('date_submittedToPublisher');
            $table->string('date_reviewedByPublisher');
            $table->string('date_returnedForRevision');
            $table->string('date_revisedByAuthor');
            $table->string('date_publishedByPublisher');
            $table->string('date_unpublishedByPublisher');
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
        Schema::dropIfExists('tbl_event_tracking_log');
    }
}
