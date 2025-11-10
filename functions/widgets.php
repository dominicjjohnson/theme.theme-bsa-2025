<?php
//PHP8 Ready

class latest_blog_posts_widget extends WP_Widget {

	// constructor
	public function __construct() {
	
		parent::__construct(
			'latest_blog_posts_widget', 
			'Latest Blog Posts', 
			[ 'description' => 'Add a list of the latest blog posts to the site' ] 
		);
	
	}

		// widget form creation
		function form($instance) {

			// Check values
			if( $instance) {
			     $title = esc_attr($instance['title']);
			     $count = esc_attr($instance['count']);
			} else {
			     $title = '';
			     $count = 5;
			}

			?>

			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'textdomain'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count:', 'textdomain'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" />
			</p>
		<?php
		}

		// update widget
		function update($new_instance, $old_instance) {
		    $instance = $old_instance;
		    // Fields
		    $instance['title'] = strip_tags($new_instance['title']);
		    $instance['count'] = strip_tags($new_instance['count']);
		    // return
		    return $instance;
		}

		// widget display
		function widget($args, $instance) {
			
			extract($args);

			$title = apply_filters('widget_title', $instance['title']);


			echo $before_widget;

		   	if ( $title ) {
		    	echo $before_title . $title . $after_title;
		   	}

		   	$args = array(
		   		'post_type' => 'post',
		   		'posts_per_page' => $count
		   	);
		   	$blog_posts = new WP_Query($args);

		   	if($blog_posts->have_posts()):
		   		while($blog_posts->have_posts()): $blog_posts->the_post();
		   			global $post;
		   			$date = get_the_date();
		   			$title = get_the_title($post->ID);
		   			$thumbnail = get_the_post_thumbnail($post->ID, 'small_thumbnail');
		   			$permalink = get_permalink($post->ID);
		   			echo <<<HERE
<div class="footer-blog--wrapper clear clearfix">
	<div class="thumbnail"><a href="{$permalink}" title="">{$thumbnail}</a></div>
	<p class="date">{$date}</p>
	<p class="title"><a href="{$permalink}" title="">{$title}</a></p>
</div>
HERE;
		   		endwhile;
		   	endif;

		   	echo $after_widget;

		}
	}

	// register widget
	function register_latest_blog_posts_widget(){
		register_widget('latest_blog_posts_widget');
	}
	add_action('widgets_init', 'register_latest_blog_posts_widget');

// Dates To Diary Widget
if( class_exists( 'WP_Widget' ) ){
	// Add Widget
	class Extranet_Datestodiary extends WP_Widget {
	
		// constructor
		public function __construct() {
			$widget_ops = [
				'classname'   => 'extranet_dates_to_diary',
				'description' => 'Add Dates To Diary Button',
			];
			parent::__construct( 'dates-to-diary', __( 'Add Dates To Diary', 'extranet' ), $widget_ops );
		}
	
		// Admin update
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			return $instance;
		}
	
		// Admin Form
		public function form( $instance ) {
			echo '<p>There are no options.</p>';
		}

		// Vistor / Site View
		public function widget( $args, $instance ) {
			echo $before_widget;
			echo '<div id="dates-to-diary-widgets-div">';
			echo '<a id="dates-to-diary-widgets-link" class="sidebar-link" href="' . trailingslashit( home_url() ) . 'add-dates-to-diary/' . '">Add To Diary</a>';
			echo '</div>';
			echo $after_widget;
		} // Display
	
	} // Extranet_Datestodiary

	// Register Widget
	register_widget('Extranet_Datestodiary');
}
