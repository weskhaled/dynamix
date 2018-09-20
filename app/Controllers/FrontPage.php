<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{
    public function getPeople()
    {
        $args = array(
        'post_type'              => 'slider',
        'posts_per_page'         => -1,
        );
        $people_query = new WP_Query($args);
        return $people_query;
    }
}
