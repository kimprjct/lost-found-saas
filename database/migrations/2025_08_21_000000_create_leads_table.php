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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('organization_type'); // school, mall, workplace, etc.
            $table->string('contact_person');
            $table->string('position')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('status', ['pending', 'contacted', 'converted', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->string('source')->nullable(); // website, referral, cold call, etc.
            $table->integer('estimated_users')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('timeline')->nullable(); // when they want to start
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
