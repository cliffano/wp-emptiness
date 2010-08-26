        <div class="item">
          <div class="side left">
            &nbsp;
          </div>
          <div class="main">
            <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php bloginfo('description'); ?>
          </div>
          <div class="side right" style="overflow: hidden;">
            <form method="get" action="<?php bloginfo('url'); ?>/">
              <div><input type="text" value="search..." name="s" onclick="this.value = ''"/></div>
            </form>
          </div>
        </div>
        <div class="item">
          <div class="side left" style="overflow: hidden;">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Left Sidebar') ) : ?>
              <ul>
                <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                <?php wp_list_pages('title_li='); ?>
                <li><a href="<?php bloginfo('atom_url'); ?>">Feed</a></li>
                <?php if (is_user_logged_in()) { ?>
                    <li><a href="<?php echo get_option('siteurl'); ?>/wp-admin/">Admin</a></li>
                <?php } ?>
                <li><?php wp_loginout(); ?></li>
              </ul>
            <?php endif; ?>
          </div>
          <div class="main splash">
            &nbsp;
          </div>
          <div class="side right">
            <?php
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Right Sidebar') ) :
                if ( count(get_tags()) > 0 ) :
            ?>
              <h3>Tags</h3>
              <ul>
                <li>
                  <?php wp_tag_cloud('smallest=9&largest=14&number=25'); ?>
                </li>
              </ul>
            <?php
                endif;
                if ( count(get_categories()) > 0 ) :
            ?>
              <h3>Categories</h3>
              <ul>
                <?php wp_list_categories('hierarchical=false&title_li='); ?> 
              </ul>
            <?php
                endif;
              endif;
            ?>
          </div>
          <br style="clear: both;"/>
        </div>