<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('person_mobiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned()->index()->nullable();
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
            $table->string('mobile_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_mobiles');
    }
};
