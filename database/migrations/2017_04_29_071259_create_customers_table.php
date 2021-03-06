<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->bigInteger('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('phone')->unsigned();
            $table->string('address');
            $table->timestamps();

            $table->primary('id');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
