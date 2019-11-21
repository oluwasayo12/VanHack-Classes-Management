<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumUpgradePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_upgrade_payment', function (Blueprint $table) {
            $table->bigIncrements('pup_id');
            $table->string('pup_user_id','11');
            $table->string('pup_month_count',"11"); 
            $table->decimal('pup_base_amount', 8, 2);
            $table->decimal('pup_total_amount', 8, 2);
            $table->enum('pup_payment_status', ['Approved', 'Awaiting Confirmation', 'Declined']);
            $table->string('pup_gateway','50');
            $table->timestamp('pup_date');
            
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_upgrade_payment');
    }
}
