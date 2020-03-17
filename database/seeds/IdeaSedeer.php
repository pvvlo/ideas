<?php

use App\Idea;
use Illuminate\Database\Seeder;

class IdeaSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idea::create([
            'descripcion' => 'Curso de Laravel mas VUE',
            'created_at' => now(),
            
        ]);
        Idea::create([
            'descripcion' => 'Curso de Laravel: Permisos',
            'created_at' => now(),
            
        ]);
    }
}
