<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'nama_awal')) {
                $table->string('nama_awal')->nullable();
            }

            if (!Schema::hasColumn('users', 'nama_akhir')) {
                $table->string('nama_akhir')->nullable();
            }

            if (!Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp')->nullable();
            }

            if (!Schema::hasColumn('users', 'id_desa')) {
                $table->unsignedBigInteger('id_desa')->nullable();
            }

            if (!Schema::hasColumn('users', 'rt')) {
                $table->string('rt', 3)->nullable();
            }

            if (!Schema::hasColumn('users', 'rw')) {
                $table->string('rw', 3)->nullable();
            }

            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('USER');
            }

            if (!Schema::hasColumn('users', 'api_token')) {
                $table->string('api_token', 80)->nullable()->unique();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'nama_awal',
                'nama_akhir',
                'no_hp',
                'id_desa',
                'rt',
                'rw',
                'role',
                'api_token',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};