<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("country");
            $table->string("town");
            $table->string("commune")->nullable();
            $table->string("quarter")->nullable();
            $table->string("street")->nullable();
            $table->string("number")->nullable();
            $table->string("reference")->nullable();  
            $table->foreignId('developer_id')
                    ->constrained('developers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');         
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
        Schema::dropIfExists('addresses');
    }
}
