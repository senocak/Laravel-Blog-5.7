<?php

use App\Ayar;
use Illuminate\Database\Seeder;

class AyarTableSeeder extends Seeder{
    public function run(){
        Ayar::create([
            "tema"=>"w3css",
            "twitter"=>"twitter",
            "github"=>"github",
            "linkedin"=>"linkedin"
        ]);
    }
}
