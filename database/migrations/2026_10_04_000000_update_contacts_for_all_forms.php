<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Two forms write to contacts:
     *  - /contact (Livewire ContactForm): name, email, phone, services, message
     *  - footer "Pitch us your idea" (EnquiryController): name, email, subject, message
     *
     * The footer form has no phone field, so phone becomes nullable; subject is
     * new; source records which form a row came from.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('subject')->nullable()->after('phone');
            $table->string('source', 32)->default('contact')->after('message')->index();
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['source']);
            $table->dropColumn(['subject', 'source']);
        });

        // Footer rows have no phone; backfill so NOT NULL can be restored.
        DB::table('contacts')->whereNull('phone')->update(['phone' => '']);

        Schema::table('contacts', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change();
        });
    }
};
