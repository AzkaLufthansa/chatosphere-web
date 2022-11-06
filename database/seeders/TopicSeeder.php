<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'slug' => 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit',
            'content' => ' Non consectetur, nemo repellendus quos et mollitia eveniet. Tempore voluptas, illum voluptate accusantium cupiditate ipsum neque quasi maxime accusamus nihil nam libero iste aperiam ea illo blanditiis necessitatibus facere eveniet ducimus, cumque quae saepe dolor totam? Perferendis eveniet maxime quibusdam numquam reiciendis fugiat quia consequuntur? Doloremque ad molestias repellat nostrum atque magni quis tempore nulla eaque velit ex numquam, porro consequuntur vero illum omnis illo eos fugit. Id cum commodi dignissimos omnis unde vero impedit sunt sapiente voluptate odio. Nisi rerum, reprehenderit, aliquam quia fugiat error, mollitia impedit consequatur optio consectetur cupiditate.'
        ]);

        Topic::create([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'Lorem ipsum dolor sit amet consectetur.',
            'slug' => 'lorem-ipsum-dolor-sit-amet-consectetur',
            'content' => ' Non consectetur, nemo repellendus quos et mollitia eveniet. Tempore voluptas, illum voluptate accusantium cupiditate ipsum neque quasi maxime accusamus nihil nam libero iste aperiam ea illo blanditiis necessitatibus facere eveniet ducimus, cumque quae saepe dolor totam? Perferendis eveniet maxime quibusdam numquam reiciendis fugiat quia consequuntur? Doloremque ad molestias repellat nostrum atque magni quis tempore nulla eaque velit ex numquam, porro consequuntur vero illum omnis illo eos fugit. Id cum commodi dignissimos omnis unde vero impedit sunt sapiente voluptate odio. Nisi rerum, reprehenderit, aliquam quia fugiat error, mollitia impedit consequatur optio consectetur cupiditate.'
        ]);
        
        Topic::create([
            'user_id' => 3,
            'category_id' => 3,
            'title' => 'Lorem ipsum dolor sit.',
            'slug' => 'lorem-ipsum-dolor-sit',
            'content' => ' Non consectetur, nemo repellendus quos et mollitia eveniet. Tempore voluptas, illum voluptate accusantium cupiditate ipsum neque quasi maxime accusamus nihil nam libero iste aperiam ea illo blanditiis necessitatibus facere eveniet ducimus, cumque quae saepe dolor totam? Perferendis eveniet maxime quibusdam numquam reiciendis fugiat quia consequuntur? Doloremque ad molestias repellat nostrum atque magni quis tempore nulla eaque velit ex numquam, porro consequuntur vero illum omnis illo eos fugit. Id cum commodi dignissimos omnis unde vero impedit sunt sapiente voluptate odio. Nisi rerum, reprehenderit, aliquam quia fugiat error, mollitia impedit consequatur optio consectetur cupiditate.'
        ]);
    }
}
