<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('category_books', 'book_category');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('book_category', 'category_books');
    }
};
