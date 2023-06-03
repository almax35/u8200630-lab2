<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use Faker\Generator as Faker;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->paragraph,
            'dateTimeCreated'=>$this->faker->dateTime,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime,
            'author' => $this->faker->name,
        ];
    }
}