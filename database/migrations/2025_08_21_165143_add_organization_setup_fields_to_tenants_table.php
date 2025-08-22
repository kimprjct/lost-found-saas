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
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('contact_email')->nullable()->after('address');
            $table->string('contact_phone')->nullable()->after('contact_email');
            $table->text('claim_process_rules')->nullable()->after('contact_phone');
            $table->text('verification_steps')->nullable()->after('claim_process_rules');
            $table->boolean('setup_completed')->default(false)->after('verification_steps');
            $table->timestamp('setup_completed_at')->nullable()->after('setup_completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn([
                'contact_email',
                'contact_phone',
                'claim_process_rules',
                'verification_steps',
                'setup_completed',
                'setup_completed_at'
            ]);
        });
    }
};
