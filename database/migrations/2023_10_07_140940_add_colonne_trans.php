<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('transaction_models', function (Blueprint $table) {
            $table->string('tel_receiver');
            $table->string('nom_user_send');
            $table->string('tel_user_send');
            // Vous pouvez également utiliser d'autres types de colonnes comme integer, boolean, etc.
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
        Schema::table('transaction_models', function (Blueprint $table) {
            $table->dropColumn('tel_receiver');
            $table->dropColumn('nom_user_send');
            $table->dropColumn('tel_user_send');
        });
    }
}
