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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            $table->string('voucher_code');
            $table->integer('quantity');
            $table->integer('price_sale');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('discount_type')->default('percentage'); // 'giảm tiền' hoặc 'giảm phần trăm'
            $table->decimal('discount_value', 8, 2)->default(0); // Giá trị giảm giáa
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
