<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constellation', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('constellation');
            $table->string('overall_star');
            $table->string('overall_description');
            $table->string('love_star');
            $table->string('love_description');
            $table->string('career_star');
            $table->string('career_description');
            $table->string('money_star');
            $table->string('money_description');
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
        Schema::dropIfExists('constellation');
    }
}
