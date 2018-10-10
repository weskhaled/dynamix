<?php
use WeDevs\ORM\WP\Post as Post;
?>
<script>
console.log(<?php echo(Post::type('slider')->status('publish')->get())  ?>);
</script>