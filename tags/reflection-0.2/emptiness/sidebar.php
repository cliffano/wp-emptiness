        <div class="side right">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Body Right Sidebar') ) : ?>
            <h3>Recent Posts</h3>
            <ul>
              <?php wp_get_archives('type=postbypost&limit=10'); ?> 
            </ul>
            <?php if (function_exists('get_recent_comments')) { ?>
              <h3>Recent Comments</h3>
              <ul>
                <?php get_recent_comments(); ?>
              </ul>
            <?php } ?>
	        <h3>Linkroll</h3>
		    <ul>
			  <?php get_links(-1, '<li>', '</li>', ' - '); ?>
		    </ul>
		  <?php endif; ?>
        </div>