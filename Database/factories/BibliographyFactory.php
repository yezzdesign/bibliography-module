<?php

namespace Modules\Bibliography\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BibliographyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Bibliography\Entities\Bibliography::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'read_at'       =>  $this->faker->date(),
            'book_title'    =>  $this->faker->realText(rand(10,50)),
            'book_author'   =>  $this->faker->name(),
            'book_cover'    =>  '/uploads/blog/cover/placeholder.png',
            'book_blurb'    =>  $this->faker->realText(rand(100, 150)),
            'book_status'   =>  rand(0,1),


            /*'post_title'    =>  $this->faker->realText(rand(20,50)),
            'post_content'    alias sail='[ af sail ] && bash sail || bash vendor/bin/sail'=>  $this->faker->realText(rand(500,1000)),
            'post_content_short'    =>  $this->faker->realText(rand(100,150)),
            'post_category_id'      =>  rand(1,5),
            'post_image'            =>  false,
            'post_status'           =>  rand(0,1),
            'post_created_at'       =>  now(),
            'post_author'           =>  '1',*/
        ];
    }
}

