<img align="right" src="https://raw.github.com/cliffano/wp-emptiness/master/avatar.jpg" alt="Avatar"/>

[![Build Status](https://secure.travis-ci.org/cliffano/wp-emptiness.png?branch=master)](http://travis-ci.org/cliffano/wp-emptiness)
<br/>

Emptiness
---------
Emptiness is a minimalist WordPress theme with a white background, containing mostly texts with a header image. Simple and clean, with very lightweight HTML and CSS. It automatically recognises [Get Recent Comments](http://blog.jodies.de/archiv/2004/11/13/recent-comments/) and [Most Commented plugins](http://wordpress.org/extend/plugins/most-commented/).

Starting version 1.0, this theme requires WordPress? 2.7 or later. Older versions require WordPress? 2.3 or later.

Screenshots
-----------

![](https://raw.github.com/cliffano/wp-emptiness/master/screenshots/emptiness.jpg)

![](https://raw.github.com/cliffano/wp-emptiness/master/screenshots/emptiness_comment.jpg)

FAQ
---

Q: How to remove the header text?

A: Open up header.php file, delete the following lines: `<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>` and `<?php bloginfo('description'); ?>`.
If you want to delete the whole row (along with the search box), then you have to delete the first `<div class="item">...</div>` section on that file.

Q: How to change the header image?

A: Starting from version 1.1, you can upload your own header image by using the form located at WordPress? Dashboard -> Appearance -> Custom Header -> Upload New Header Image, browse and upload the header image. Note that this feature requires PHP GD library, if you can't see the uploaded header image, it's quite likely that the library hasn't been installed.
Alternatively (with any version), create your own header image (file name must be header.jpg) with the exact dimension 500 pixels in width and 281 pixels in height. Replace the original header file wp-content/themes/emptiness/header.jpg with your own header.jpg . However, be careful not to overwrite your own header.jpg when you upgrade the theme later on in the future. You might be interested to learn A Cleaner Way To Customise WordPress Theme Styles.

Q: How to remove "by author_name" and other post details on the left side of each post?

A: Open up emptiness/index.php file. Find the word "the_author_posts_link()", that's pretty much the post details area on the left of each post. You can delete the lines that you don’t want there.

Q: How to change the height of the header section?

A: Starting version 1.5, you need to add the following styles in style.css: div#header div.side { max-height: 281px } div#bodyfooter { margin-top: 350px; }. But add the pixel difference to those values, e.g. if you want to increase the height by 200px, then set max-height: 465px and margin-top: 550px.

Q: What if I want to use a header image with height other than 281px, say 300px?

A: Also starting version 1.5, you have to change add div.splash { height: 300px; } . Remember to change the height of the header section as explained in the Q&A above.

Q: How to change the banner / middle column width to be larger than 500px?

A: E.g. if you want to change the width from 500px to 600px. First, you need to modify style.css file, change width value in div.main from 500px to 600px, then change div#container & div#header width from 1020px to 1020px + the increase in height (100px) = 1120px. Also modify functions.php file, change define('HEADER_IMAGE_WIDTH', 500); to define('HEADER_IMAGE_WIDTH', 600); .

Q: Why is there a huge space between the header and the post? Why are there overlapping texts on the header sidebars?

A: This happens when either the Header Left sidebar or the Header Right sidebar has a lot of content that takes up space longer than the height of the header image. It's usually caused by widgets that are placed on Header Left sidebar or Header Right sidebar, you should move them to Body Right sidebar instead. Please note that the height of the header sidebars are meant to be as high as the height of the header image (about 281px).

Q: Why is there a page/menu link showing up twice on the header left?

A: Some users reported this error which I can't reproduce consistently. One of them advised that the duplication disappeared after adding a custom link via Appearance -> Menus.

Q: After uploading custom header image, why are top corners rounded while bottom corners are not?

A: This is a bug on versions older than March 3rd 2011. The fix is to modify functions.php file, replace 265 with 281, the reupload your custom header image.

Q: On IE6, why does the right sidebar get pushed down below the body?

A: This only happens when you have a post containing text or image wider than the width of the body (by default it's 500px). So you can either modify the wide content to fit 500px, or modify style.css and assign larger width (width attribute for div#container and div.main).

Sidebar Widgets
---------------

There are 4 types of widget sidebars:

Header Left Sidebar - the left area of the header
Header Right Sidebar - the right area of the header
Body Right Sidebar- the right area of the body
Post Left Sidebar - the left area of each post

Starting v1.10, there are two more widget sidebars:

Body Right-Top Sidebar - above Body Right Sidebar widget
Body Right-Bottom Sidebar - bellow Body Right Sidebar widget

![](https://raw.github.com/cliffano/wp-emptiness/master/screenshots/emptiness_widgetready.jpg)
