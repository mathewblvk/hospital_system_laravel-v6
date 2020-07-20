<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id')->unsigned()->unique()->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('patient_id')->unsigned()->unique()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('set null')->onUpdate("cascade");
            $table->text('description')->nullable();
            $table->char('medicine_issued',3)->default("NO");
            $table->text('bp')->nullable();
            $table->text('cholesterol')->nullable();
            $table->text('blood_sugar')->nullable();
            $table->text('medicines')->nullable();
            $table->text('height')->nullable();
            $table->text('weight')->nullable();
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
        Schema::dropIfExists('diagnosis');
    }
}
