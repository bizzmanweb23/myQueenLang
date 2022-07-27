<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mlm_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('postcode');
            $table->string('nationality');
            $table->string('sponser_id')->nullable();
            $table->string('placement_id')->nullable();
            $table->string('placement')->nullable();
            $table->string('birthday');
            $table->string('referal_code');
            $table->string('gender');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('contact_address');
            $table->string('account_holder');
            $table->string('bank_name');
            $table->string('payment_information');
            $table->string('branch');
            $table->string('account_no');
            $table->string('placement_id_type')->nullable();
            $table->string('mlm_status');
            $table->string('left_id')->nullable();
            $table->string('right_id')->nullable();
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
        Schema::dropIfExists('mlm_users');
    }
}
