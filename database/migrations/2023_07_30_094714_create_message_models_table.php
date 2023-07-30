<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_models', function (Blueprint $table) {
            $table->id();
            $table->string('issue',100);
            $table->string('recipient',100);
            $table->string('sms_text',2000)->nullable();
            $table->string('sms_image',2000)->nullable();
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
        Schema::dropIfExists('message_models');
    }
}
