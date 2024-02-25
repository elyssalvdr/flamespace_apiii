<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique()->nullable();           
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password')->default('');
            $table->enum('roles', ['admin', 'user']);
            $table->string('permissions');
            $table->rememberToken();
            $table->timestamps();
        });

        // Make sure to use a raw expression to generate the default password
        DB::table('users')->update(['password' => DB::raw("CONCAT(LEFT(name, 1), RIGHT(student_number, 6))")]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
