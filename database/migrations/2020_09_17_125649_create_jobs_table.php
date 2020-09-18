<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('description');
            $table->unsignedInteger('ageGroupFrom');
            $table->unsignedInteger('ageGroupTo');
            $table->string('experience');
            $table->string('price');
            $table->string('specialization');// نوع العمل (تخصص العمل (ويب - موبايل - سكرتير ... )) //
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('typeJob');// partTime ,FullTime
            $table->string('DaysOfWork');// [Saturday- ... -Friday]
            $table->string('BusinessHoursFrom');//12:00
            $table->string('BusinessHoursFromTime');//PM,AM
            $table->string('BusinessHoursTo');//12:00
            $table->string('BusinessHoursToTime');//PM,AM
            $table->string('Year');//2020
            $table->string('day');//sunday
            $table->string('month');//month
            $table->string('date');//12-02-2020
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
        Schema::dropIfExists('jobs');
    }
}
