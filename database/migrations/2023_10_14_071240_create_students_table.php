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
        Schema::create('students',function (Blueprint $table){
            $table ->unsignedBigInteger('class_id');
            $table ->string('name',448)->nullable();
            $table ->integer('roll')->nullable();
            $table ->string('email',07)->nullable();
            $table ->integer('phone')->nullable();
            $table ->text('address')->nullable();
            $table ->string('image')->nullable();
            

            $table->timestamps();
            // $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');


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
