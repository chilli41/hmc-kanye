<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanyes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');           
            $table->string('userEmail');
            $table->longText('quoteFirst');
            $table->longText('quoteSecond');
            $table->longText('quoteThird');
            $table->longText('quoteFourth');
            $table->longText('quoteFifth');
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
        Schema::dropIfExists('kanyes');
    }
}
