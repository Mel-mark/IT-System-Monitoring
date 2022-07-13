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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->text('s_description');
            $table->text('l_description');
            $table->text('name');
            $table->text('comment');
            $table->text('system');
            $table->text('pri_level');
            $table->text('status');
            $table->text('ass_personel');
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
        Schema::dropIfExists('reports');
    }
};
