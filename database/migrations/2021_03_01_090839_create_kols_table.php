<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100)->nullable()->default('text');
            $table->string('email', 200)->nullable()->default('text');
            $table->string('password', 225)->nullable()->default('text');
            $table->string('username', 100)->nullable()->default('text');
            $table->string('category', 220)->nullable()->default('text');
            $table->string('contact_person', 100)->nullable()->default('text');
            $table->string('bank_name', 100)->nullable()->default('text');
            $table->string('bank_account', 100)->nullable()->default('text');
            $table->string('bank_number_account', 100)->nullable()->default('text');
            $table->string('audience_character', 220)->nullable()->default('text');
            $table->string('profesi', 100)->nullable()->default('text');
            $table->string('interst', 100)->nullable()->default('text');
            $table->integer('gender')->default(0);
            $table->integer('location')->default(0);
            $table->integer('religion')->unsigned()->nullable()->default(0);
            $table->integer('koltypes')->unsigned()->nullable()->default(0);
            $table->integer('status')->unsigned()->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kols');
    }
}
