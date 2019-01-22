<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('patient_id')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse')->nullable();
            $table->string('pressure')->nullable();
            $table->string('glucose')->nullable();
            $table->string('syntoms')->nullable();
            $table->boolean('status')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_location')->nullable();
            $table->unsignedInteger('prescription_id')->nullable();
            $table->unsignedInteger('fee')->nullable();
            $table->datetime('treatment_time')->nullable();
            $table->text('description')->nullable();
            $table->text('advice')->nullable();
            $table->text('tests')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
