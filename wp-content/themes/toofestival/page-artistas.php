<?php get_template_part('templates/page', 'header'); ?>
<div class="container">
	<section class="row">
		<div class="col-sm-12">
			<div class="tags-list">
				<div class="row">
					<div class="col-sm-12">
						<span class="post-excerpt">
							<div id="tag-index-page" class="isotope">
								<?php
								$args = array(
								    'hide_empty' => false,
								    'orderby' => 'title',
								    'order' => 'ASC'
								);
								$terms = get_terms( 'event-tags', $args );
								$length = count($terms);
								if ( !empty( $terms ) && !is_wp_error( $terms ) ){
								 	 $nextletter = NULL;
								     for ( $i = 0; $i < $length; ++$i ) {
								     	$term = $terms[$i];
								     	$title=$term->name;
								     	$initial=strtoupper(substr($title,0,1));

								     	$nextterm = $terms[$i+1];
								     	$nexttitle=$nextterm->name;
							        	$nextletter=strtoupper(substr($nexttitle,0,1));

							        	if($initial!=$letter){
							        		echo '<div class="tag-group isotope-item">';
								          	echo '<h3 class="tag-title">'.$initial.'</h3>';
								          	echo '<ul class="tag-list">';
								          	$letter=$initial;
								        }
								     	?>
								        <li class="tag-item">
								            <a href="<?php echo $term->slug; ?>" title="Ver festivales del artista/grupo: <?php echo $term->name; ?>"><span class="tag-name"><?php echo $term->name; ?></span></a>
								            <span class="tag-count"><?php echo $term->count; ?></span>
								        </li>
							        		<?php
									        if($initial!=$nextletter){
								        		echo '</ul></div>';
								        	}
										}
								 } ?>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>