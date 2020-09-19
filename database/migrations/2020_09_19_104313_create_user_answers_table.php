<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('user_id');
            $table->text('answer')->nullable()->default('Not Answered');
            $table->unsignedTinyInteger('status_answer')->default(0)->nullable();//0,1(f,t)
            $table->unsignedInteger('percentage')->default(0)->nullable();//%
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
        Schema::dropIfExists('user_answers');
    }
}
