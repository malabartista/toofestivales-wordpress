<?php if (!is_home() && !is_page( 'mapa-festivales' )) { ?>
<div id="page-title">
	<div class="content page-title-container">
		<div class="container box">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( function_exists('yoast_breadcrumb') ) {
		                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		            } ?>
					<h1 class="page-title"><?php echo roots_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php if (!is_search()) { ?>
	<div class="page-title-bg">
		<?php echo get_the_post_thumbnail( $page->ID ); ?>
	</div>
	<?php } ?>
</div>
<?php } ?>