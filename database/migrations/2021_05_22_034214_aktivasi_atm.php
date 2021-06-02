<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AktivasiAtm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AktivasiATM', function(Blueprint $table){
            $table->id('id_aktivasi');
            $table->integer('card_number');
            $table->string('account_name');
            $table->string('procedure');
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
        Schema::drop('AktivasiATM');
    }
}
