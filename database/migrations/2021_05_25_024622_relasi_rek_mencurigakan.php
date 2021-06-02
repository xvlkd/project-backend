<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiRekMencurigakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RelasiRekMencurigakan', function (Blueprint $table){
            $table->id('id_relasi');
            $table->string('category');
            $table->integer('card_number_1');
            $table->integer('card_number_2');
            $table->integer('account_number_1');
            $table->integer('account_number_2');
            $table->string('account_name');
            $table->string('description');
            $table->string('operator');
            $table->string('corrector');
            $table->string('supervisor');
            $table->integer('office_code');
            $table->integer('section_code');
            $table->integer('id_user');
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
        Schema::drop('RelasiRekMencurigakan');
    }
}
