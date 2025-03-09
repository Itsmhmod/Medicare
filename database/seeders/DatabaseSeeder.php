<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء أدمن تلقائيًا
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'), // تشفير كلمة المرور
            'role' => 'admin', // لو عندك عمود role في جدول users
        ]);

        // إنشاء 10 مستخدمين وهميين (اختياري)
        // User::factory(10)->create();
    }
}
