
<!--

<p class="byline author vcard"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>

-->
			<ul class="post-meta pull-left">
				<li class="fa-user">
				 <?php echo __('By', 'wes_khaled'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
				</li>
			<?php
				// Only show the comments link if comments are allowed and it's not password protected
			   if (comments_open()) { ?>
			   <li class="fa-comments">
				<?php	comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
		       </li>
			   <?php	} ?>
				<li class="post-tags fa-tags">
					<?php the_category('&nbsp;, '); ?> 
				</li><!-- .post-tags end -->
			</ul>
			<ul class="post-share pull-right">
				<span>Share</span>
				<li>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="#"> <i class="fa fa-facebook"></i></a>
				</li>
			</ul>