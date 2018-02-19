<?php
/* The Template to Render the showcase
*
*/

//Define all Variables.
if ( get_theme_mod('tromax_fn2_enable' ) && is_front_page() ) : 

		?>
		<div id="showcase">
			<div class="container">
				<div class="showcase-container">
			            <div class="swiper-wrapper">
			            <?php
			            
			            $count = 1;
				        $args = array( 
				        	'post_type' => 'post',
				        	'posts_per_page' => 4, 
				        	'cat'  => esc_html( get_theme_mod('tromax_fn2_cat',0) ),
				        	'ignore_sticky_posts' => 1,
			        	);
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : 
				        
				        	$loop->the_post(); 				      
							
							?>
							<div class="showcase-item col-md-3 col-sm-3 col-xs-6">
				            	<a href="<?php the_permalink(); ?>">
				            		<?php the_post_thumbnail('tromax-pop-thumb'); ?>
				            	<div class="showcase-caption">					                					               	
						                <div class="showcase-title"><?php the_title() ?></div>
								</div>
								
								</a>

				            </div>
			             <?php endwhile; ?>
			             <?php wp_reset_postdata(); ?>
			               
			            </div>
			         
			        </div>
			</div> 
		</div>
	<?php	
	
endif;	?>	   