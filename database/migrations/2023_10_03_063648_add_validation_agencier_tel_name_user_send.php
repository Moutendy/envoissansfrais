<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidationAgencierTelNameUserSend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('validation_models', function (Blueprint $table) {
            $table->string('agencier_tel');
            $table->string('agencier_name'); // Vous pouvez également utiliser d'autres types de colonnes comme integer, boolean, etc.
            $table->string('user_send_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('validation_models', function (Blueprint $table) {
            $table->dropColumn('agencier_tel');
            $table->dropColumn('agencier_name');
            $table->dropColumn('user_send_name');
        });
    }
}
