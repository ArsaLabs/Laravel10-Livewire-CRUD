<?php

use App\Models\CustomerModels;
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
        Schema::create('transaction_models', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CustomerModels::class)->constrained();
            $table->dateTime('transaction_date');
            $table->string('description');
            $table->string('debit_credit_status');
            $table->double('amount', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_models');
    }
};
