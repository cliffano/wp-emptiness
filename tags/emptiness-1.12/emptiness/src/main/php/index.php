<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
  <head>
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <style type="text/css" media="screen, projection">
      @import url( <?php bloginfo('stylesheet_url'); ?> );
    </style>
    <style type="text/css" media="print">
      @import url( <?php bloginfo('stylesheet_directory'); ?>/print.css );
    </style>
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <!-- Emptiness Theme by Studio Cliffano -->
  </head>
  <body>
    <div id="container">
      <div id="bodyfooter">
        <div id="body">
          <div id="content">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="item">
                  <div class="vcard side left">
                    <span class="date"><?php the_time('j M Y, g:ia') ?></span><br/>
                    <span class="labels"><?php the_category(' ') ?><?php the_tags(': ', ' '); ?></span><br/>
                    by <span class="fn"><?php the_author_posts_link(); ?></span><br/>
                    <?php echo get_avatar( get_the_author_meta('ID'), $size = '48', $default = 'identicon' ); ?><br/>
                    <?php comments_popup_link('leave a comment', '1 comment', '% comments'); ?>
                    <?php edit_post_link('edit', '', ''); ?><br/>
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Left Sidebar') ) : ?>
                    <?php endif; ?>
                  </div>
                  <div class="main">
                    <h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content('more &raquo;'); ?>
                    <div class="nav">
                      <?php wp_link_pages('before=pages:&next_or_number=number&pagelink=%'); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php comments_template(); ?>
              <div class="item">
                <div class="side left">
                  &nbsp;
                </div>
                <div class="main nav">
                  <?php previous_post_link('&larr; %link') ?>&nbsp;&nbsp;<?php next_post_link('%link &rarr;') ?>
                </div>
              </div>
              <div class="item">
                <div class="side left">
                  &nbsp;
                </div>
                <div class="main nav">
                  <?php posts_nav_link('&nbsp;&nbsp;', __('&larr; Newer Posts'), __('Older Posts &rarr;')); ?>
                </div>
              </div>
            <?php else : ?>
              <div class="item">
                <div class="side left">
                  &nbsp;
                </div>
                <div class="main">
                  <h2>Posts Not Found</h2>
                  <p>Sorry, no posts matched your criteria.</p>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <?php get_sidebar(); ?>
          <br style="clear: both;"/>
        </div>
        <?php get_footer(); ?>
      </div>
      <div id="header">
        <?php get_header(); ?>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>