<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('fee', 10, 2)->default(0.00);
            $table->string('validity_type')->default('annual'); // annual, lifetime, custom
            $table->text('description')->nullable();
            $table->integer('order_num')->default(0);
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('membership_type_id')->constrained('membership_types');
            $table->string('member_id')->nullable()->unique()->index(); // e.g. CEC-2026-0001
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->default('male'); // male, female, other
            $table->string('blood_group')->nullable(); // A+, B+, etc.
            $table->string('mobile')->index();
            $table->string('emergency_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('nid_or_passport')->nullable();
            $table->string('photo')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('district')->default('Noakhali');
            $table->string('upazila')->default('Chatkhil');
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->string('proposed_by_name')->nullable();
            $table->string('proposed_by_member_id')->nullable();
            $table->string('status')->default('pending')->index(); // pending, approved, rejected, inactive
            $table->text('rejection_reason')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->boolean('is_public_directory')->default(true);
            $table->boolean('show_phone_public')->default(false);
            $table->boolean('show_email_public')->default(false);
            $table->timestamps();
        });

        Schema::create('membership_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('purpose')->default('admission_fee'); // admission_fee, annual_subscription, donation, event_fee, other
            $table->string('payment_method')->default('bkash'); // bkash, nagad, bank_transfer, cash, other
            $table->string('transaction_id')->nullable()->index();
            $table->string('slip_attachment')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('status')->default('pending'); // pending, verified, rejected
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_payments');
        Schema::dropIfExists('members');
        Schema::dropIfExists('membership_types');
    }
};
