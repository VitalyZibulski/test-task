<?php

use App\Enums\PaymentStatus;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payer_name');
            $table->string('payer_surname');
            $table->integer('amount');
            $table->string('national_security_number');
            $table->string('payment_reference_id');
            $table->string('description')->nullable();
            $table->enum('state', collect(PaymentStatus::cases())->map->value->all())->nullable();
            $table->date('payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
