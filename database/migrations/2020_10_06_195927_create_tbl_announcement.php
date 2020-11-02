<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_announcement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aa_title', 200);
            $table->text('aa_description');
            $table->date('aa_date');
            $table->string('aa_time', 20);
            $table->integer('aa_ae_id');
            $table->text('aa_action');
            $table->integer('aa_added_by');
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
        Schema::dropIfExists('tbl_announcement');
    }
}
