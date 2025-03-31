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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address')->nullable();

            $table->string('password');
            $table->string('image')->nullable();
            $table->integer('add')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('poin')->nullable();

            $table->enum('status', ['1', '2'])->default('1')->comment('1  hoạt động | ngưng 2 hoạt động'); // 1 hoạt động | 2 ngưng hoạt động
            $table->enum('role', ['1', '2','3'])->default('2')->comment('1 Admin | 2 User | 3 Admin phụ'); // 1 admin | 2 user | 3 admin phụ

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
