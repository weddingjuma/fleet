<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->authorities();
            $table->string('name');
            $table->string("f_name");
            $table->text('address');
            $table->string('nid_no');
            $table->string('email');
            $table->string('mobile_no');
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
        Schema::dropIfExists('Drivers');
    }
}
