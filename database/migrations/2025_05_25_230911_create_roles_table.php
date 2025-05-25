<?php

declare(strict_types = 1);

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        #permission_role
        Schema::create('permission_role', function (Blueprint $table): void {
            $table->foreignIdFor(Permission::class)->constrained();
            $table->foreignIdFor(Role::class)->constrained();
            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('role_user', function (Blueprint $table): void {
            $table->foreignIdFor(Role::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->primary(['role_id', 'user_id']);
        });

        Schema::create('permission_user', function (Blueprint $table): void {
            $table->foreignIdFor(Permission::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->primary(['permission_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_user');
    }
};
