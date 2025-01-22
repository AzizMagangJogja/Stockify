<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Stockify');
            $table->text('logo')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'name' => 'Stockify',
            'logo' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5v9a1.5 1.5 0 001.5 1.5h15a1.5 1.5 0 001.5-1.5v-9L12 3 3 7.5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-3h6v3M9 10h.008v.008H9V10zm3 0h.008v.008H12V10zm3 0h.008v.008H15V10z" />
                    </svg>'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
