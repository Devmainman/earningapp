<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('client_videos', function (Blueprint $table) {
        $table->boolean('watched')->default(false); // Add the 'watched' column
    });
}

public function down()
{
    Schema::table('client_videos', function (Blueprint $table) {
        $table->dropColumn('watched'); // Remove the 'watched' column if needed
    });
}

};
