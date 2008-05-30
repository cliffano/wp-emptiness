        <div class="side right">
          <h3>Recent Posts</h3>
          <ul>
            <?php wp_get_archives('type=postbypost&limit=10'); ?> 
          </ul>
          <?php if (function_exists('get_recent_comments')) { ?>
            <h4>Recent Comments</h4>
            <ul>
              <?php get_recent_comments(); ?>
            </ul>
          <?php } ?>
	        <h4>Linkroll</h4>
		      <ul>
			      <?php get_links(-1, '<li>', '</li>', ' - '); ?>
		      </ul>
        </div>