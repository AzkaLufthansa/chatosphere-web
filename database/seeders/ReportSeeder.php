<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'topic_id' => 1,
            'user_id' => 1,
            'message' => 'Topic terlalu toxic'
        ]);

        Report::create([
            'topic_id' => 3,
            'user_id' => 2,
            'message' => 'Topic tidak jelas'
        ]);

        Report::create([
            'topic_id' => 2,
            'user_id' => 3,
            'message' => 'Topic sensitif'
        ]);
    }
}
