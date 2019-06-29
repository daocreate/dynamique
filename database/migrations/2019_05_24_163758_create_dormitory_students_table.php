<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormitoryStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitory_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('regi_no');
            $table->date('joinDate');
            $table->date('leaveDate')->nullable();
            $table->integer('dormitory');
            $table->string('roomNo',4);
            $table->decimal('monthlyFee',10,2);
            $table->string('isActive',3);
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
        Schema::dropIfExists('dormitory_students');
    }
}