<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cat_id")->constrained("flight_categories")->onDelete("cascade");
            $table->foreignId("admin_id")->constrained("admins")->onDelete("cascade");
            $table->string('name');
            $table->string('departure');
            $table->string('arrival');
            $table->string('seats');
            $table->string('image');
            $table->integer('views');
            $table->text('description');
            $table->string("slug");
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
        Schema::dropIfExists('flights');
    }
}
