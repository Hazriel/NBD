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
        $general = $this->createCategory('General', 0, 10);
        $games = $this->createCategory('Games', 0, 20);
        $members = $this->createCategory('Members', 50, 30);
        $archives = $this->createCategory('Archives', 100, 100);

        $recruitement = $this->createForum([
            'title' => 'Recruitement',
            'description' => '',
            'required_view_power' => 0,
            'required_topic_create_power' => 0,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 0,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 10,
            'category_id' => $general->id
        ]);

        $pubg = $this->createForum([
            'title' => 'PLAYERUNKNOW\'S BATTLEGROUNDS',
            'description' => '',
            'required_view_power' => 0,
            'required_topic_create_power' => 0,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 0,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 10,
            'category_id' => $games->id
        ]);

        $bfh = $this->createForum([
            'title' => 'Battlefield Heroes',
            'description' => '',
            'required_view_power' => 0,
            'required_topic_create_power' => 0,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 0,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 20,
            'category_id' => $games->id
        ]);

        $csgo = $this->createForum([
            'title' => 'Counter-Strike: Global Offensive',
            'description' => '',
            'required_view_power' => 0,
            'required_topic_create_power' => 0,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 0,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 10,
            'category_id' => $games->id
        ]);

        $videos = $this->createForum([
            'title' => 'Videos',
            'description' => '',
            'required_view_power' => 50,
            'required_topic_create_power' => 50,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 50,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 10,
            'category_id' => $members->id
        ]);

        $videos = $this->createForum([
            'title' => 'Screenshots',
            'description' => '',
            'required_view_power' => 50,
            'required_topic_create_power' => 50,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 50,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 20,
            'category_id' => $members->id
        ]);

        $votes = $this->createForum([
            'title' => 'Votes',
            'description' => '',
            'required_view_power' => 50,
            'required_topic_create_power' => 50,
            'required_topic_update_power' => 100,
            'required_topic_delete_power' => 100,
            'required_post_create_power' => 50,
            'required_post_update_power' => 100,
            'required_post_delete_power' => 100,
            'display_order' => 30,
            'category_id' => $members->id
        ]);
    }

    private function createCategory($title, $power, $order) {
        return \App\Category::create([
            'title' => $title,
            'required_view_power' => $power,
            'display_order' => $order
        ]);
    }

    private function createForum(array $details) {
        return \App\Forum::create([
            'title' => $details['title'],
            'description' => $details['description'],
            'required_view_power' => $details['required_view_power'],
            'required_topic_create_power' => $details['required_topic_create_power'],
            'required_topic_update_power' => $details['required_topic_update_power'],
            'required_topic_delete_power' => $details['required_topic_delete_power'],
            'required_post_create_power' => $details['required_post_create_power'],
            'required_post_update_power' => $details['required_post_update_power'],
            'required_post_delete_power' => $details['required_post_delete_power'],
            'display_order' => $details['display_order'],
            'category_id' => $details['category_id'],
        ]);
    }

}
