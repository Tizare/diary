<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('posts')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'user_id' => '1',
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'text' => \fake()->text(400),
                'created_at' => \now(),
            ];
        }
        return $data;
    }
}
