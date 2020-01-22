<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Photo = new Photo;
        $Photo->local = 'Inglaterra';
        $Photo->pictureDate = '01/01/2020';
        $Photo->save();

        $Photo = new Photo;
        $Photo->local = 'Brasil';
        $Photo->pictureDate = '01/02/2020';
        $Photo->save();

        $Photo = new Photo;
        $Photo->local = 'Itália';
        $Photo->pictureDate = '01/03/2020';
        $Photo->save();

        $Photo = new Photo;
        $Photo->local = 'Portugal';
        $Photo->pictureDate = '01/04/2020';
        $Photo->save();

        $Photo = new Photo;
        $Photo->local = 'Noruega';
        $Photo->pictureDate = '01/05/2020';
        $Photo->save();

        $Photo = new Photo;
        $Photo->local = 'Argentina';
        $Photo->pictureDate = '01/02/2020';
        $Photo->save();
    }
}
