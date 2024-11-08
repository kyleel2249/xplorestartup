<?php

class Popular_Tab_Widget extends Newspaperup_Widget_Base {
	/**
	 * Widget constructor.
	 */
	function __construct()
	{
		$this->text_fields = array('newspaperup-tabbed-popular-posts-title', 'newspaperup-tabbed-latest-posts-title', 'newspaperup-tabbed-categorised-posts-title', 'newspaperup-excerpt-length', 'newspaperup-posts-number');

		$this->select_fields = array('newspaperup-show-excerpt', 'newspaperup-enable-categorised-tab', 'newspaperup-select-category');

		$widget_options = array(
			'classname'   => 'popular_tab_Widget',
			'description' => __( 'Popular Tab', 'newspaperup' ),
		);
		parent::__construct( 'popular_tab_Widget', __( 'AR: Popular Tab', 'newspaperup' ), $widget_options );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget($args, $instance)
	{
		$instance = parent::newspaperup_sanitize_data($instance, $instance);
		$tab_id = 'tabbed-' . $this->number;


		/** This filter is documented in wp-includes/default-widgets.php */

		$show_excerpt = 'false';
		$excerpt_length = '20';
		$number_of_posts =  '4';


		$popular_title = isset($instance['newspaperup-tabbed-popular-posts-title']) ? $instance['newspaperup-tabbed-popular-posts-title'] : __('Popular', 'newspaperup');
		$latest_title = isset($instance['newspaperup-tabbed-latest-posts-title']) ? $instance['newspaperup-tabbed-latest-posts-title'] : __('Latest', 'newspaperup');


		$enable_categorised_tab = isset($instance['newspaperup-enable-categorised-tab']) ? $instance['newspaperup-enable-categorised-tab'] : 'true';
		$categorised_title = isset($instance['newspaperup-tabbed-categorised-posts-title']) ? $instance['newspaperup-tabbed-categorised-posts-title'] : __('Trending', 'newspaperup');
		$category = isset($instance['newspaperup-select-category']) ? $instance['newspaperup-select-category'] : '0';


		// open the widget container
		echo $args['before_widget'];
		?>
		<!-- Popular Tab widget start-->

		<div class="tab-wrapper tabbed-post-widget wd-back">	
			<div class="tabs">
				<div bs-tab="<?php echo esc_attr($tab_id); ?>-home" class="tab-button active"><i class="fa-solid fa-newspaper"></i> <?php echo $categorised_title; ?></div> 
				<div bs-tab="<?php echo esc_attr($tab_id); ?>-popular" class="tab-button"><i class="fa-solid fa-fire"></i> <?php echo $popular_title; ?></div>
				<div bs-tab="<?php echo esc_attr($tab_id); ?>-latest" class="tab-button"><i class="fa-solid fa-bolt-lightning"></i> <?php echo $latest_title; ?></div>
			</div>
			<!-- Start Tabs -->	
			<div class="tab-contents">
				<div id="<?php echo esc_attr($tab_id); ?>-home" class="tab-content active d-grid">
					<?php newspaperup_render_posts('recent', $show_excerpt, $excerpt_length, $number_of_posts);	?>
				</div>
				<div id="<?php echo esc_attr($tab_id); ?>-popular" class="tab-content d-grid">
					<?php newspaperup_render_posts('popular', $show_excerpt, $excerpt_length, $number_of_posts); ?>
				</div>
				<?php if ($enable_categorised_tab == 'true'){ ?>
				<div id="<?php echo esc_attr($tab_id); ?>-latest" class="tab-content d-grid">
					<?php newspaperup_render_posts('categorised', $show_excerpt, $excerpt_length, $number_of_posts, $category);	?>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php
		// close the widget container
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$this->form_instance = $instance;
		$enable_categorised_tab = array(
			'true' => __('Yes', 'newspaperup'),
			'false' => __('No', 'newspaperup')

		);



		// generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
		?><h4><?php _e('Latest Posts', 'newspaperup'); ?></h4><?php
		echo parent::newspaperup_generate_text_input('newspaperup-tabbed-latest-posts-title', __('Title', 'newspaperup'), __('Latest', 'newspaperup'));

		?><h4><?php _e('Popular Posts', 'newspaperup'); ?></h4><?php
		echo parent::newspaperup_generate_text_input('newspaperup-tabbed-popular-posts-title', __('Title', 'newspaperup'), __('Popular', 'newspaperup'));

		$categories = newspaperup_get_terms();
		if (isset($categories) && !empty($categories)) {
			?><h4><?php _e('Categorised Posts', 'newspaperup'); ?></h4>
			<?php
			echo parent::newspaperup_generate_select_options('newspaperup-enable-categorised-tab', __('Enable Categorised Tab', 'newspaperup'), $enable_categorised_tab);
			echo parent::newspaperup_generate_text_input('newspaperup-tabbed-categorised-posts-title', __('Title', 'newspaperup'), __('Trending', 'newspaperup'));
			echo parent::newspaperup_generate_select_options('newspaperup-select-category', __('Select category', 'newspaperup'), $categories);

		}

	}
}