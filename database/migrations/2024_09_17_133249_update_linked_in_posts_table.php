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
    Schema::table('linked_in_posts', function (Blueprint $table) {
        $table->string('url', 1000)->change();
    });
}

public function down()
{
    Schema::table('linked_in_posts', function (Blueprint $table) {
        $table->string('url', 255)->change(); // Revert back to 255 if needed.
    });
}

};
