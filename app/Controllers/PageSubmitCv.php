<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageSubmitCv extends Controller
{
    public function getPartners()
    {
        $args = array(
        'post_type'              => 'partner',
        'posts_per_page'         => -1
        );
        $query = new WP_Query($args);
        return $query;
    }
    public function submitCv()
    {
        if(isset($_POST['submitted'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mail = $_POST['mail'];
            $phone = $_POST['phone'];
            $resumefile = $_FILES['resumefile'];
            $message = $_POST['message'];
            // return $resumefile['name'];
            // if (!is_user_logged_in()){
            //     $new_post = array(
            //         'post_title' => 'Test Post Title test for condidate',
            //         'post_content' => 'Test Post Content',
            //         'post_status' => 'pending',
            //         'post_author' => 0,
            //         'post_type' => 'condidate',
        
            //     );
            //     $newid = wp_insert_post($args); 
            //     if ($newid){ 
            //         // add_post_meta here if  your post type have 
            //         //some success notification 
            //         return $newid;
            //     } else { 
            //         return false;
            //     }
            // }
            if(isset($mail)) {
                $new_post = array(
                    'post_title' => $firstname,
                    'post_content' => $mail,
                    'post_name' => $mail ,
                    'post_status' => 'pending',
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_type' => 'condidate'
                );
                $post_id = wp_insert_post($new_post); 
                if ($post_id){ 
                    add_post_meta($post_id, 'FIRSTNAME', $firstname, true);
                    add_post_meta($post_id, 'LASTNAME', $lastname, true);
                    add_post_meta($post_id, 'MAIL', $mail, true);
                    add_post_meta($post_id, 'PHONE', $phone, true);
                    add_post_meta($post_id, 'MESSGAE', $message, true);
                    add_post_meta($post_id, 'RESUMEURL', $message, true);
                    echo get_post_meta( $post_id, 'RESUMEURL' );
                    return $post_id;
                } else { 
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false;
        }

    }
    public function getCaptcha(){

    }
}
