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
            $table->bigIncrements('au_id');
            $table->string('au_name');           
            $table->string('au_forms');
            $table->string('au_unique_id');
            $table->string('au_source');
            $table->string('au_fname');
            $table->string('au_lname');
            $table->string('au_email')->unique();
            $table->string('au_phone');
            $table->string('au_company');
            $table->string('au_job_title');
            $table->text('au_address');
            $table->string('au_city');
            $table->string('au_state')->nullable();
            $table->string('au_country')->nullable();
            $table->string('au_pincode');
            $table->string('au_refer_id')->nullable();
            $table->string('au_ip');
            $table->string('au_status');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('au_password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
