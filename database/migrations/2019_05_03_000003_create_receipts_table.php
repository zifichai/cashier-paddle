<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billable_id');
            $table->string('billable_type');
            $table->unsignedBigInteger('paddle_subscription_id')->nullable()->index();
            $table->string('checkout_id');
            $table->string('order_id')->unique();
            $table->string('amount');
            $table->string('tax');
            $table->string('currency', 3);
            $table->integer('quantity');
            $table->string('receipt_url')->unique();
            $table->timestamp('paid_at');
            $table->timestamps();

            $table->index(['billable_id', 'billable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
};
