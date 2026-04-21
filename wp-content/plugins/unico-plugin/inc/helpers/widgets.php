<?php
///----Blog widgets---
//Latest Blogs 
class Unico_Latest_Blogs extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Unico_Latest_Blogs', /* Name */esc_html__('Unico Latest Blogs','unico'), array( 'description' => esc_html__('Show the Latest Blogs', 'unico' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <div class="side-widget-body">
            <div class="side-list">
                <ul class="side-blog-list">
                    <?php $query_string = 'posts_per_page='.$instance['number'];
                        if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                        $this->posts($query_string);
                    ?>
                </ul>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Latest Blogs', 'unico');
		$number = ( $instance ) ? esc_attr($instance['number']) : 4;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'unico'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'unico'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'unico'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'unico'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li class="blog-post">
                <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>">
                    <div class="blog-list-img" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);"></div>
                </a>
                <div class="blog-list-info">
                    <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>" title="blog"><?php echo unico_trim( get_the_title(), '3' );?></a></h5>
                    <div class="blog-post-meta">
                        <span class="updated"><?php echo get_the_date();  ?></span>					
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer widgets---
//Follow Us
class Unico_Follow_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Unico_Follow_Us', /* Name */esc_html__('Unico Follow Us','unico'), array( 'description' => esc_html__('Show the Follow Us', 'unico' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="form-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
				<?php if( $instance['show'] ): ?>
				<?php echo wp_kses_post(unico_get_social_icons2()); ?>
                <?php endif; ?>
                
                <form class="signup-frm mt-4" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="get">
                    <input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post($instance['form_id']); ?>">
                    <input type="email" class="form-control sigmup-me" placeholder="<?php esc_html_e('Your Email Address', 'unico'); ?>" required="required">
                    <button type="submit" class="btn btn-primary"><i class="ti-arrow-right"></i></button>
                </form>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['form_id'] = $new_instance['form_id'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Follow Us';
		$form_id = ($instance) ? esc_attr($instance['form_id']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'unico'); ?></label>
            <input placeholder="<?php esc_attr_e('Follow Us', 'unico');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_id')); ?>"><?php esc_html_e('FeedBurner ID:', 'unico'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('form_id')); ?>" name="<?php echo esc_attr($this->get_field_name('form_id')); ?>" ><?php echo wp_kses_post($form_id); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'unico'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>      
                
		<?php 
	}
	
}

//Contact Details
class Unico_Contact_Details extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Unico_Contact_Details', /* Name */esc_html__('Unico Contact Details','unico'), array( 'description' => esc_html__('Show the Contact Details', 'unico' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
        	<div class="contact-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
                <?php if($instance['address']):?><p><?php echo wp_kses_post($instance['address']); ?></p><?php endif; ?>
                <?php if($instance['email_address']):?><p><?php echo wp_kses_post($instance['email_address']); ?></p><?php endif; ?>
                <?php if($instance['phone_no']):?><p><?php echo wp_kses_post($instance['phone_no']); ?></p><?php endif; ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['address'] = $new_instance['address'];
		$instance['mail_chimp_form'] = $new_instance['mail_chimp_form'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Get in Touch';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'unico'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Us', 'unico');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'unico'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'unico'); ?></label>
            <input placeholder="<?php esc_attr_e('supportteam@info.com', 'unico');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'unico'); ?></label>
            <input placeholder="<?php esc_attr_e('+1-800-555-44-00', 'unico');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p>
               
		<?php 
	}
	
}