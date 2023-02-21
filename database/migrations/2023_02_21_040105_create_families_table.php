<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_parent')->unsigned()->nullable();
            $table->foreign('id_parent')
            ->references('id')
            ->on('families')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('name');
            $table->enum('jenis_kelamin', ['L','P']);
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
        Schema::dropIfExists('families');
    }
}
