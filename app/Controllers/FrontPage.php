<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{
    public function getSliders()
    {
        $args = array(
        'post_type'              => 'slider',
        'posts_per_page'         => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'slide_location',
                'field' => 'slug',
                'terms' => 'home'
            )
        )
        );
        $people_query = new WP_Query($args);
        return $people_query;
    }
}
