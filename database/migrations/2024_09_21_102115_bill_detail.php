<?php

use App\Models\Bill;
use App\Models\Product;
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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(Bill::class)->constrained();
            $table->string('bill_code');
            $table->integer( 'quantity');
            $table->integer( 'subtotal');
            $table->integer( 'price');
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
