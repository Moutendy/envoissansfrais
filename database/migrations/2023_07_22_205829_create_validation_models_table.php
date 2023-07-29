<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validation_models', function (Blueprint $table) {
            $table->id();
            $table->string('idUserSend')->unique();
            $table->string('idUserReceiver')->unique();
            $table->string('idUserAgency')->unique();
            $table->string('desc');
            $table->bigInteger('transaction_model')->unsigned();
            $table->foreign('transaction_model')->references('id')->on('transaction_models')->onDelete('cascade');
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
        Schema::dropIfExists('validation_models');
    }
}
