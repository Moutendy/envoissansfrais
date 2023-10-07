<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomReceiver extends Migration
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
            $table->string('nom_receiver')->after('end'); // Vous pouvez également utiliser d'autres types de colonnes comme integer, boolean, etc.
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
            $table->dropColumn('nom_receiver');
        });
    }
}
