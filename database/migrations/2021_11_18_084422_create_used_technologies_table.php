<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_technologies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('technology_id')->contrained('technologies');
            $table->foreignId('project_id')->contsrained('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('used_technologies');
    }
}
