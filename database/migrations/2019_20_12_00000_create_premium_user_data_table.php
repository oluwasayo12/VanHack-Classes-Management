<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_user_data', function (Blueprint $table) {
            $table->bigIncrements('pud_id');
            $table->string('pud_user_id','11');
            $table->string('pud_pup_id',"11");
            $table->enum('pud_status', ['Approved', 'Declined']);
            $table->string('pud_reason'); 
            $table->timestamp('pud_date');
            
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_user_data');
    }
}
