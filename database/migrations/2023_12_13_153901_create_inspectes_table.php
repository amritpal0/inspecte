<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspectes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vehicle_id');
            $table->longText('face_side');
            $table->longText('rear_side');
            $table->longText('right_side');
            $table->longText('left_side');
            $table->longText('extra_check');
            $table->longText('geolocation');
            $table->longText('immobilizer');
            $table->longText('standard_equipment');
            $table->longText('ramp');
            $table->longText('abyss');
            $table->longText('interior_damage');
            $table->longText('exterior');
            $table->longText('interior');
            $table->longText('description');
            $table->longText('photos');
            $table->longText('confirm');
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
        Schema::dropIfExists('inspectes');
    }
}
