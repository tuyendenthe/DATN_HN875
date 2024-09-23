<?php

use App\Models\Status;
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
        Schema::create('fix_book', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string( 'email');
            $table->string('content');
            $table->integer('phone');
            $table->foreignIdFor( Status::class)->constrained();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};