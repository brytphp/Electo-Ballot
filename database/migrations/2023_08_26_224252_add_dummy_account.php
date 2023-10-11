<?php

use App\Models\Election;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'ec',
        ]);

        $user = User::create([
            'first_name' => 'Ganyo',
            'other_names' => 'Bright',
            'email' => 'brytphp@gmail.com',
            'phone' => '0248130692',
            'access_role' => 'admin',
            'password' => '$2y$10$TLLCnY9OsxJ2HQJJ311QBODj5FxzlOgHOXuBZl3Uw8XrseBpaBzce',
        ]);
        $user->syncRoles(['admin']);

        Election::create([
            'election' => 'first election',
            'slug' => 'first-election',
            'voters_name' => 'Voters',
            'start_date' => now(),
            'end_date' => now()->addDay(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
