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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('label');//->unique();
            $table->string('slug');//->unique();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('fee_type_id')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=>visible; 1=>hidden');
            $table->mediumText('small_description')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
