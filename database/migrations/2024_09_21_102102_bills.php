<?php

use App\Models\Status;
use App\Models\User;
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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();


            $table->string('bill_code');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->string('note');
            $table->string('checkout');

            $table->string('payment_method');
            $table->integer('total');
            $table->string('status');







            $table->timestamps('date_created');
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
