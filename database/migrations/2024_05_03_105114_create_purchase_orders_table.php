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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('POId');
            $table->foreignId('SupplierId')->constrained(table: 'suppliers', indexName: 'purchase_orders_supplier_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('RestaurantId')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->date('OrderDate');
            $table->time('OrderTime');
            $table->date('DeliveryDate');
            $table->unsignedBigInteger('ApprovedBy')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
