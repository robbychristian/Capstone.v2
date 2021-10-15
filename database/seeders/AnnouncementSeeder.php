<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert([
            'brgy_position' => 'Chairman',
            'name' => 'Evandino Raymundo',
            'brgy_loc' => 'Santolan',
            'title' => 'NOTICE!',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error, similique quia. Maiores earum tenetur, sint, autem obcaecati ipsa maxime laudantium officiis enim quam minima sequi iste officia dolorem rerum cumque.'
        ]);

        DB::table('announcements')->insert([
            'brgy_position' => 'Chairman',
            'name' => 'Evandino Raymundo',
            'brgy_loc' => 'Santolan',
            'title' => 'NOTICE!',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error, similique quia. Maiores earum tenetur, sint, autem obcaecati ipsa maxime laudantium officiis enim quam minima sequi iste officia dolorem rerum cumque.'
        ]);

        DB::table('announcements')->insert([
            'brgy_position' => 'Chairman',
            'name' => 'Evandino Raymundo',
            'brgy_loc' => 'Santolan',
            'title' => 'NOTICE!',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error, similique quia. Maiores earum tenetur, sint, autem obcaecati ipsa maxime laudantium officiis enim quam minima sequi iste officia dolorem rerum cumque.'
        ]);

        DB::table('announcements')->insert([
            'brgy_position' => 'Chairman',
            'name' => 'Evandino Raymundo',
            'brgy_loc' => 'Santolan',
            'title' => 'NOTICE!',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error, similique quia. Maiores earum tenetur, sint, autem obcaecati ipsa maxime laudantium officiis enim quam minima sequi iste officia dolorem rerum cumque.'
        ]);

        DB::table('announcements')->insert([
            'brgy_position' => 'Chairman',
            'name' => 'Evandino Raymundo',
            'brgy_loc' => 'Santolan',
            'title' => 'NOTICE!',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error, similique quia. Maiores earum tenetur, sint, autem obcaecati ipsa maxime laudantium officiis enim quam minima sequi iste officia dolorem rerum cumque.'
        ]);
    }
}
