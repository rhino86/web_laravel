<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kols', function (Blueprint $table) {
            $table->string('tempatLahir', 225)->nullable();
            $table->date('tanggalLahir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kols', function (Blueprint $table) {
            $table->dropColumn('tempatLahir');
            $table->dropColumn('tanggalLahir');
        });
    }
}
