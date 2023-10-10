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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('number')->unique();
            $table->float('quantity_purchased');//->nullable();
            $table->unsignedBigInteger('operation_type_id')->nullable();
            $table->float('amount');//->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=open;1=hidden,3=closed');
            $table->timestamp('registration_date')->nullable();//date d'enregistrement
            $table->text('observations')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
