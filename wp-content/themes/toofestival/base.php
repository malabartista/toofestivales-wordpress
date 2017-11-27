<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->
    <div id="scroll-top-anchor"></div>
    <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
        //get_template_part('templates/header-top-navbar');
        get_template_part('templates/header-top-navbar-festival');
    } else {
        get_template_part('templates/header');
    }
    ?>

    <div id="wrap" class="wrap" role="document">
        <div class="content">
            <div id="main" class="main <?php echo roots_main_class(); ?>" role="main">
                <?php include roots_template_path(); ?>
            </div><!-- /.main -->
            <?php if (roots_display_sidebar()) : ?>
                <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                    <?php include roots_sidebar_path(); ?>
                </aside><!-- /.sidebar -->
            <?php endif; ?>
        </div><!-- /.container -->
    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
