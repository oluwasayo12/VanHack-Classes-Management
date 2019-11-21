<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_settings', function (Blueprint $table) {
            $table->bigIncrements('ps_id');
            $table->string('ps_user_id','11');
            $table->decimal('ps_base_amount', 8, 2);
            $table->string('ps_name','50');
            $table->enum('ps_status', ['active', 'inactive']);
            $table->timestamp('ps_date');
            
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_settings');
    }
}
