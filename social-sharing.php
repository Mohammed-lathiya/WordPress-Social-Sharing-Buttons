<?php
function ms_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$msURL = urlencode(get_permalink());
 
		// Get current page title
		$msTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $msTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$msThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$msTitle.'&amp;url='.$msURL.'&amp;';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$msURL;
		$googleURL = 'https://plus.google.com/share?url='.$msURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$msURL.'&amp;text='.$msTitle;
		$whatsappURL = 'https://wa.me/?text='.$msTitle . ' ' . $msURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$msURL.'&amp;title='.$msTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$msURL.'&amp;media='.$msThumbnail[0].'&amp;description='.$msTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required.';
		$content .= '<div class="ms-social">';
		$content .= '<h5>SHARE ON</h5>';
		$content .= '<a href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$content .= '<a href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '<a href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$content .= '<a href="'.$pinterestURL.'" target="_blank">Pin It</a>';
		$content .= '</div>';
		return $content;
	}else{
		return $content;
	}
};
add_filter( 'the_content', 'ms_social_sharing_buttons');
?>
