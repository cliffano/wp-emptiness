<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}
?>

          <?php if ('open' == $post->comment_status && 'closed' != get_option('default_comment_status')) : ?>
            <?php if ($comments) : ?>
              <div class="item" id="comments"></div>
              <?php wp_list_comments(array('style' => 'div', 'type' => 'all', 'callback' => 'mytheme_comment', 'post' => $post)); ?>
              <div class="item">
                <div class="side left">&nbsp;</div>
                <div class="main nav"><?php paginate_comments_links(); ?></div>
              </div>
            <?php endif; ?>
            <div id="respond" class="item">
              <div class="side left">
              </div>
              <div class="main">
                <?php comment_form(); ?>
              </div>
              <!--
              <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
                <div class="side left">
                  <?php if ( $user_ID ) : ?>
                    logged in as<br/>
                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a><br/>
                    <?php if (function_exists('wp_logout_url')) { ?>
	                    <a href="<?php echo wp_logout_url(); ?>">log out</a><br/>
	                <?php } else { ?>
	                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">log out</a><br/>
                    <?php } ?>
                  <?php else : ?>
                    *name<br/>
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="17" tabindex="1" /><br/>
                    *e-mail<br/>
                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="17" tabindex="2" /><br/>
                    web site<br/>
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="17" tabindex="3" /><br/>
                  <?php endif; ?>
                </div>
                <div class="main">
                  <?php comment_form_title( 'leave a comment', 'leave a reply to %s' ); ?><br/>
                  <div id="cancel-comment-reply"><?php cancel_comment_reply_link('cancel reply') ?></div>
                  <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea><br/>
                  <input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /><br/>
                  <?php comment_id_fields(); ?>
                  <?php do_action('comment_form', $post->ID); ?>
                </div>
                -->
              </form>
            </div>
          <?php endif; ?>