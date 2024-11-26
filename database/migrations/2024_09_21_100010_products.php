<?php

use App\Models\Category;
use App\Models\Variant;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained();
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->string('content');
            $table->string('chip'); // thêm loại chip cho sản phẩm
            $table->string('ram');
            $table->string('memory'); //bộ nhớ
            $table->string('screen');  //kích thước màn
            $table->string('resolution'); // độ phân giải
            $table->string('content_short');
            $table->integer('role')->nullable();
            $table->softDeletes();
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
