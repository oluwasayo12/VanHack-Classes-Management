<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('account_type', ['normal', 'premium', 'admin']);
            $table->enum('account_status', ['active', 'inactive']);
            $table->rememberToken();
            $table->timestamps();
		});

		DB::table('users')->insert([
            [
	            'email' => 'olu@vanhack.com',
	            'password' => bcrypt('Qwerty@456!!!'),
                'account_type' => 'admin',
                'account_status' => 'active',
            ],
            [
	            'email' => 'oluwasayo@gmail.com',
	            'password' => bcrypt('following'),
                'account_type' => 'premium',
                'account_status' => 'active',
            ],
            [
	            'email' => 'bola@gmail.com',
	            'password' => bcrypt('f0ll0wing'),
                'account_type' => 'normal',
                'account_status' => 'active',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
