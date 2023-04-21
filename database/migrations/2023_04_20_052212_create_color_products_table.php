<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->index()->constrained('colors')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->index()->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('color_products');
    }
};
