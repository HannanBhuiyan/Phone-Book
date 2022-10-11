<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auth_id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('phone_number');
            $table->string('image');
            $table->tinyInteger('is_favorite')->comment('1=fav, 2=disfav');
            $table->tinyInteger('is_status')->comment('1=active, 2=inactive');
            $table->softDeletes();
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
        Schema::dropIfExists('contacts');
    }
};
