<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Programming',
                'description' => 'General programming topics, languages, and techniques'
            ],
            [
                'name' => 'Web Development',
                'description' => 'Topics related to building websites and web applications'
            ],
            [
                'name' => 'Mobile Development',
                'description' => 'Content about creating apps for iOS, Android and other mobile platforms'
            ],
            [
                'name' => 'DevOps & Infrastructure',
                'description' => 'Cloud services, deployment, CI/CD pipelines, and infrastructure management'
            ],
            [
                'name' => 'Data & Analytics',
                'description' => 'Database systems, big data, data science, and analytics'
            ],
            [
                'name' => 'Security',
                'description' => 'Cybersecurity, encryption, vulnerability testing, and secure coding practices'
            ],
            [
                'name' => 'AI & Machine Learning',
                'description' => 'Artificial intelligence, machine learning, and deep learning topics'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
