<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['url' => 'sale', 'title' => 'Sales']);
        Tag::create(['url' => 'damaged', 'title' => 'With damaged']);
        Tag::create(['url' => 'sport', 'title' => 'Sport cars']);
    }
}
