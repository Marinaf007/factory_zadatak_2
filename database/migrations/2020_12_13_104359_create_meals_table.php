<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('meals')) {
            Schema::create('meals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->longText('description')->nullable();
                $table->longText('description_cro')->nullable();
                $table->integer('category_id')->unsigned();
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
