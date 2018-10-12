<?php

namespace App;
use WeDevs\ORM\WP\Post as Post;

class Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_get_modal', [$this, 'myajax_submit']);
        // add_action('wp_ajax_nopriv_get_modal', [$this, 'myMethod']);
    }

    public function myMethod()
    {
        echo(json_encode(Post::type('slider')->status('publish')->get(),true));
        wp_die();
    }
    function myajax_submit() {
        $post = get_post( 1 );

        $post['image'] = get_the_post_thumbnail( $post_id, 'medium' );
        
        echo json_encode( $post );
    }
}

new Ajax();