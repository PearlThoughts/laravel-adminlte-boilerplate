<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id');
            $table->string('dose');
            $table->string('indication');
            $table->string('dose_indication');
            $table->string('adverse_effect');
            $table->string('counselling');
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
        Schema::dropIfExists('card_answers');
    }
}
