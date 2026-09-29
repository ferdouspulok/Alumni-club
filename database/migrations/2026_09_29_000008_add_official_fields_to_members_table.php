<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('nominee_name')->nullable()->after('spouse_name');
            $table->string('nationality')->default('Bangladeshi')->after('date_of_birth');
            $table->string('whatsapp_number')->nullable()->after('mobile');
            $table->string('seconder_name')->nullable()->after('proposed_by_member_id');
            $table->string('seconder_member_id')->nullable()->after('seconder_name');
            $table->string('facebook_profile')->nullable()->after('seconder_member_id');
            $table->string('instagram_profile')->nullable()->after('facebook_profile');
            $table->string('linkedin_profile')->nullable()->after('instagram_profile');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'nominee_name',
                'nationality',
                'whatsapp_number',
                'seconder_name',
                'seconder_member_id',
                'facebook_profile',
                'instagram_profile',
                'linkedin_profile',
            ]);
        });
    }
};
