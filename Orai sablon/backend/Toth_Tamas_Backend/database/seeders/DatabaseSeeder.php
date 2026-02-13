<?php

namespace Database\Seeders;

use App\Models\Kategoria;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $kategoria = ['Ház', 'Lakás', 'Építési telek', 'Telek', 'Garázs', 'Mezőgazdasági terület', 'Ipari ingatlan'];

        foreach ($kategoria as $key => $value) {
            Kategoria::create([
                'nev' => $value
            ]);
        }
    }
}
