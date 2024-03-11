<?php

class Post
{
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $ad_id;
    public $impressions;
    public $clicks;
    public $unique_clicks;
    public $leads;
    public $conversion;
    public $roi;

    public function __construct($ad_id, $impressions, $clicks, $unique_clicks, $leads, $conversion, $roi)
    {
        $this->ad_id = $ad_id;
        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->unique_clicks = $unique_clicks;
        $this->leads = $leads;
        $this->conversion = $conversion;
        $this->roi = $roi;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM test_data');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['ad_id'], $post['impressions'], $post['clicks'], $post['unique_clicks'], $post['leads'], $post['conversion'], $post['roi']);
        }

        return $list;
    }


    public static function get_data_to_table()
    {

        $db = Db::getInstance();

        $del = $db->prepare("DELETE FROM test_data");
        $del->execute();

        $json1 = file_get_contents('https://submitter.tech/test-task/endpoint1.json');
        $json2 = file_get_contents('https://submitter.tech/test-task/endpoint2.json');

        $a = json_decode($json1, true);
        $b = json_decode($json2, true);


        foreach ($a as $a_val) {

            foreach ($b['data']['list'] as $b_val) {
                if ($a_val['name'] == $b_val['dimensions']['ad_id']) {
                    $insert = $db->prepare('INSERT INTO test_data (ad_id, impressions, clicks, unique_clicks, leads, conversion, roi) VALUES (?, ?, ?, ?, ?, ?, ?)');
                    $insert->execute([$b_val['dimensions']['ad_id'], $b_val['metrics']['impressions'], $a_val['clicks'], $a_val['unique_clicks'], $a_val['leads'], $b_val['metrics']['conversion'], $a_val['roi']]);
                }

            }
        }

        $req = $db->query('SELECT * FROM test_data');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['ad_id'], $post['impressions'], $post['clicks'], $post['unique_clicks'], $post['leads'], $post['conversion'], $post['roi']);
        }

        return $list;
    }
}