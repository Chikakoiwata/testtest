<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
        // 追記開始

\App\Models\Tag::create([
    'name' => 'ライフハック'
]);
\App\Models\Tag::create([
    'name' => 'エッセイ'
]);
\App\Models\Tag::create([
    'name' => 'お知らせ'
]);

\App\Models\User::create([
    'name' => 'テストユーザ',
    'email' => 'test@example.com',
    'password' => bcrypt('password'),
]);
\App\Models\User::create([
    'name' => 'ぼやき太郎',
    'email' => 'boyaki@example.com',
    'password' => bcrypt('password'),
]);
\App\Models\Tweet::create([
    'message' => 'テストユーザによる投稿',
    'user_id' => 1
]);
\App\Models\Tweet::create([
    'message' => 'ぼやき太郎による投稿',
    'user_id' => 2
]);
// 追記終了
    
    }
}
