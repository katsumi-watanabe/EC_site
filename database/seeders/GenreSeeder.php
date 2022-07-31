<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'id' => '1',
                'genre_name' => 'Women\'s',
            ],
            [
                'id' => '2',
                'genre_name' => 'Men\'s',
            ],
            [
                'id' => '3',
                'genre_name' => 'Kid\'s',
            ],
            [
                'id' => '4',
                'genre_name' => 'Accessories',
            ],
            [
                'id' => '5',
                'genre_name' => 'Cosmetics',
            ],
        ];

        $now = Carbon::now();
        foreach ($records as $record) {
            $record['created_at'] = $now;
            $record['updated_at'] = $now;
            DB::table('genres')->insert($record);
        }
    }
}
