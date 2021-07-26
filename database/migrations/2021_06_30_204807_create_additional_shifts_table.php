<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_shifts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('shift_type');
            $table->string('shift_day');
            $table->integer('store_code');
            $table->string('duties');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('shift_filled');
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_shifts');
    }
}
