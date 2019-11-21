<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_register', function (Blueprint $table) {
            $table->bigIncrements('cr_id');
            $table->string('cr_class_id','11');
            $table->string('cr_user_id',"11");
            $table->enum('cr_status', ['active', 'passive']);
            $table->timestamp('cr_date_attended');
            
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_register');
    }
}
