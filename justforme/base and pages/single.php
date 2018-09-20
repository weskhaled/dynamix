<?php 
if(has_post_format('gallery',$post->id)){
get_template_part('templates/content', 'single-gallery');

}
else{
get_template_part('templates/content', 'single');
}
?>
