<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsCountToTblAlbumTable extends Migration
{
    public function up()
    {
        Schema::table('tbl_album', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('event_tags');
        });
    }

    public function down()
    {
        Schema::table('tbl_album', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });
    }
}
