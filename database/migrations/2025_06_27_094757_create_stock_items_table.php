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
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->integer('quantity')->default(0);
            $table->timestamps();

            {
                Schema::table('stock_items', function (Blueprint $table) {
                    $table->decimal('price', 8, 2)->default(0.00);
                });
            }

        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_items');

        {
            Schema::table('stock_items', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }

    }
};
