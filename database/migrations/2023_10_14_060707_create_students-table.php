<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentsS',function (Blueprint $table){
            $table -unsignedBigInteger('class_id');
            $table ->string('name',448)->nullable();
            $table ->integer('roll')->nullable();
            $table ->string('email',07)->nullable();
            $table ->integer('phone')->nullable();
            $table ->text('address')->nullable();
            $table ->string('image')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelecte('cascade');

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
        Schema::dropIfExists('students');
    }
}
