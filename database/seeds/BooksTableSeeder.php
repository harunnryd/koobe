<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cookbooks = Category::create([
            'name' => 'cookbooks',
        ]);

        $design = Category::create([
            'name' => 'design',
        ]);

        $programming = Category::create([
            'name' => 'programming',
        ]);

        $agile = Category::create([
            'name' => 'agile',
        ]);

        

        $programming->books()->sync([
            Book::insertGetId(['title' => 'laravel', 'page' => 92, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
            Book::insertGetId(['title' => 'ruby', 'page' => 30, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
        ]);

         $agile->books()->sync([
            Book::insertGetId(['title' => 'design pattern laravel', 'page' => 92, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
            Book::insertGetId(['title' => 'design pattern ruby', 'page' => 30, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
        ]);

        $cookbooks->books()->sync([
            Book::insertGetId(['title' => 'laravel cookbooks', 'page' => 92, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
            Book::insertGetId(['title' => 'ruby on rails cookbooks', 'page' => 30, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]),
            Book::firstOrCreate(['title' => 'laravel'])->id,
        ]);
        

        $this->command->info('Selesai seeding sampe database Book dan Category :D');
    }
}
