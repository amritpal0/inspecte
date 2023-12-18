<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('fr_name')->nullable();
            $table->longText('fr_description')->nullable();
            $table->string('fr_slug')->nullable();
            $table->string('fr_alt')->nullable();
            $table->string('fr_meta_title')->nullable();
            $table->string('fr_meta_description')->nullable();
            $table->string('fr_meta_keyword')->nullable();
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
    }
}
