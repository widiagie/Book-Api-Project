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
        Schema::table('book_rental', function (Blueprint $table) {
            $table->enum("rent" , ['Y', 'N']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_rental', function (Blueprint $table) {
            Schema::dropColumn('rent');
        });
    }
};
