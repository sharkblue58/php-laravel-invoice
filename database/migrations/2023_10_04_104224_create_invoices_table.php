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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number', 50);
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('product', 50);
            $table->decimal('amount_collection',8,2)->nullable();;
            $table->decimal('amount_commission',8,2);
            $table->decimal('discount',8,2);
            $table->decimal('value_vat',8,2);
            $table->string('rate_vat', 999);
            $table->decimal('total',8,2);
            $table->string('status', 50)->default('غير مدفوع');
            $table->integer('value_status')->default(2);
            $table->text('note')->nullable();
            $table->date('Payment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
