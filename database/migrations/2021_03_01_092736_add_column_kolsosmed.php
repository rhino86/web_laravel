<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKolsosmed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kolsosmeds', function (Blueprint $table) {
            //
            $table->integer('follower');
            $table->integer('like');
            $table->integer('comment');
            $table->integer('engagement');
            $table->string('engagementrate', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kolsosmeds', function (Blueprint $table) {
            //
            $table->dropColumn('follower');
            $table->dropColumn('like');
            $table->dropColumn('comment');
            $table->dropColumn('engagement');
            $table->dropColumn('engagementrate');
        });
    }
}
