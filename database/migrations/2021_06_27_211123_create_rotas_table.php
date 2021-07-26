<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('week_number');
            $table->date('week_ending'); 
            $table->string('shift_type');
            $table->string('shift_day');
            $table->string('duties');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('holiday_approved');
            $table->boolean('holiday_requested');
            $table->integer('store_code');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rotas');
    }
}
