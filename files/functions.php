<?php
function jm_news_loop() {
	$img_options = get_option( 'jm_news_settings' );

	echo '<div id="post-id-' .get_the_ID() . '" class="jmunyan-news-item">';

		if ( has_post_thumbnail() ) :
			echo '<div class="jmunyan-news-img-con">';
				echo '<a class="jmunyan-news-item-link" href="' . get_the_permalink() . '">';

					
					 the_post_thumbnail('news_plugin_small', array('class' => 'jmunyan-news-img-default'));
					

				 echo '</a>';
			echo '</div>';
		endif;

		echo '<div class="jmunyan-news-text-con">';
			echo '<h4 class="jmunyan-news-title"><a class="jmunyan-news-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			echo '<div class="jmunyan-news-date">' . get_the_date() . '</div>';
			echo '<div class="jmunyan-news-excerpt">' . get_the_excerpt() . '</div>';
		echo '</div>';

	echo '</div>';
}


function jm_news_loop2() {
	return get_the_title();
}