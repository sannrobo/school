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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('st_code');
            $table->string('st_name_kh');
            $table->string('st_name_en');
            $table->enum('st_gender',[1,0]);
            $table->date('st_dob');
            $table->string('phone')->nullable();
            $table->string('mt_name_kh');
             $table->string('mt_name_en');
             $table->string('mt_job');
             $table->string('mt_phone');
             $table->string('ft_name_kh');
             $table->string('ft_name_en');
             $table->string('ft_job');
             $table->string('ft_phone');
            $table->string('address')->nullable();
            $table->string('status')->nullable();
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
