<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolservices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('idKol');
            $table->integer('idSocmed');
            $table->integer('service');
            $table->string('price', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolservices');
    }
}
