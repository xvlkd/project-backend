<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeluhanNasabah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KeluhanNasabah', function(Blueprint $table) {
            $table->id('id_keluhan');
            $table->string('asal_keluhan');
            $table->string('procedure');
            $table->integer('card_number');
            $table->string('account_name');
            $table->string('problem_solution');
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
        Schema::drop('KeluhanNasabah');
    }
}
