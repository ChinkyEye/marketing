<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_meetings', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients');
            // $table->integer('mediator_id')->unsigned();
            // $table->foreign('mediator_id')->references('id')->on('mediators');
            $table->text('description')->nullable();
            $table->string('c_name');
            $table->integer('priority')->nullable(); //1 for high 2 for medium  3 for low
            $table->integer('sort_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
            $table->string('created_at_np',20);
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
        Schema::dropIfExists('client_meetings');
    }
}
