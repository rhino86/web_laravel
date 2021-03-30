<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolsosmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolsosmeds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('idKol');
            $table->integer('sosmedtype');
            $table->string('username', 200);
            $table->string('url', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolsosmeds');
    }
}
