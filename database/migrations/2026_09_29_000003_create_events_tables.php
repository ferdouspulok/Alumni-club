<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('banner_image')->nullable();
            $table->date('event_date')->index();
            $table->string('event_time')->nullable();
            $table->string('venue');
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->boolean('is_registration_required')->default(false);
            $table->decimal('registration_fee', 10, 2)->default(0.00);
            $table->dateTime('registration_deadline')->nullable();
            $table->integer('max_participants')->nullable();
            $table->string('status')->default('published'); // draft, published, completed, cancelled
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('member_id')->nullable()->constrained('members')->nullOnDelete();
            $table->string('guest_name');
            $table->string('guest_phone');
            $table->string('guest_email')->nullable();
            $table->integer('guest_count')->default(1);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->string('payment_status')->default('free'); // free, pending, paid
            $table->string('transaction_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
        Schema::dropIfExists('events');
    }
};
