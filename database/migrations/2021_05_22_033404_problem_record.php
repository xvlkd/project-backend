<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProblemRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Problem_Record', function (Blueprint $table) {
            $table->id('id_problemrecord');
            $table->integer('id_category');
            $table->string('problem');
            $table->string('solution');
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
        Schema::drop('Problem_Record');
    }
}
