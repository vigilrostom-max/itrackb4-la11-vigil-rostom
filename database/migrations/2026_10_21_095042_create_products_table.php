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
        Schema::create('products', function (Blueprint $table) {
 $table->id();
 $table->string('name'); // short text
 $table->integer('price'); // a whole number
 $table->integer('stock'); // a whole number
 $table->string('category'); // short text
 $table->boolean('is_available')->default(true); // true or false
 $table->string('brand')->nullable(); // may be left empty
 $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
