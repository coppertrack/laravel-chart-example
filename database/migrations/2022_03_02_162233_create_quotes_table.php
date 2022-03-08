<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            /**
             * Toch naar een timestamp veranderd met index
             * wat de snelheid ten goede komt
             */
            $table->timestamp('payment_date')->index();
            $table->timestamps();
        });
    }
};
