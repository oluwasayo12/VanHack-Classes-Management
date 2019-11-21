<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cl_id');
            $table->string('cl_user_id','11');
            $table->string('cl_title',"150");
            $table->longText('cl_description');
            $table->string('cl_material', '200');
            $table->dateTime('cl_start');
            $table->string('cl_duration','20');
            $table->enum('cl_status', ['Enabled', 'Disabled', 'Ended']);
            $table->string('cl_zoom_link');
            $table->timestamp('cl_created');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
