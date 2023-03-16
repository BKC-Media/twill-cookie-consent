<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookiesTables extends Migration
{
    public function up()
    {
        Schema::create('cookies', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->string('title', 200)->nullable();
            $table->text('cookie_banner_description')->nullable();
            $table->text('settings_title')->nullable();
            $table->text('settings_description')->nullable();

        });
    }

    public function down()
    {

        Schema::dropIfExists('cookies');
    }
}
