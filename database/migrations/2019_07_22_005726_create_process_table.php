<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::dropIfExists('processes');

        Schema::create('processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('contact_date');
            $table->string('purpose');
            $table->integer('progress_rate');
            $table->integer('user_id')->nullable();
            $table->integer('customer_id');
            $table->integer('product_id')->nullable();
            $table->integer('industory_id');
            $table->text('memo')->nullable();
            $table->boolean('done')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process');
    }
}
