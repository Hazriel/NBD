<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general = $this->createCategory('General', 10);
        $games = $this->createCategory('Games',  20);
        $members = $this->createCategory('Members',  30);
        $archives = $this->createCategory('Archives',  100);

        $recruitement = $this->createForum([
            'title' => 'Recruitement',
            'description' => '',
            'display_order' => 10,
            'category_id' => $general->id
        ]);

        $pubg = $this->createForum([
            'title' => 'PLAYERUNKNOW\'S BATTLEGROUNDS',
            'description' => '',
            'display_order' => 10,
            'category_id' => $games->id
        ]);

        $bfh = $this->createForum([
            'title' => 'Battlefield Heroes',
            'description' => '',
            'display_order' => 20,
            'category_id' => $games->id
        ]);

        $csgo = $this->createForum([
            'title' => 'Counter-Strike: Global Offensive',
            'description' => '',
            'display_order' => 10,
            'category_id' => $games->id
        ]);

        $videos = $this->createForum([
            'title' => 'Videos',
            'description' => '',
            'display_order' => 10,
            'category_id' => $members->id
        ]);

        $videos = $this->createForum([
            'title' => 'Screenshots',
            'description' => '',
            'display_order' => 20,
            'category_id' => $members->id
        ]);

        $votes = $this->createForum([
            'title' => 'Votes',
            'description' => '',
            'display_order' => 30,
            'category_id' => $members->id
        ]);
    }

    private function createCategory($title, $order) {
        return \App\Category::create([
            'title' => $title,
            'display_order' => $order
        ]);
    }

    private function createForum(array $details) {
        return \App\Forum::create([
            'title' => $details['title'],
            'description' => $details['description'],
            'display_order' => $details['display_order'],
            'category_id' => $details['category_id'],
        ]);
    }

}
