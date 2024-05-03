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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->bigIncrements('PODetailId');
            $table->foreignKey('POId')->constrained( table: 'purchase_orders', indexName: 'purchase_order_details_POId')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignKey('VariantId')->constrained( table: 'product_variants', indexName: 'purchase_order_details_VariantId')->onUpdate('cascade')->onDelete('cascade');
            $table->double('Quantity');
            $table->double('UnitCost');
            $table->double('TotalCost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_details');
    }
};
