<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoghoghs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('code_mely');
            $table->string('age');
            $table->string('hoghogh');
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
        Schema::dropIfExists('hoghoghs');
    }
};
