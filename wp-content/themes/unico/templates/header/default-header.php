<?php
$options = unico_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' );

//Dark Color Logo Settings
$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>
<?php if( $options->get( 'theme_preloader' ) ):?>
     <!-- Preloader -->
     <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'eazyrecruitz'); ?></div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>
<?php endif; ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

	<!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <div class="header header-light shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <div class="nav-brand">
                        <?php echo unico_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?>
                    </div>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    <ul class="nav-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                        'container_class'=>'navbar-collapse collapse navbar-right',
                        'menu_class'=>'nav navbar-nav',
                        'fallback_cb'=>false, 
                        'items_wrap' => '%3$s', 
                        'container'=>false,
                        'depth'=>'3',
                        'walker'=> new Bootstrap_walker()  
                    ) ); ?>
                    </ul>
                    <?php if($options->get('show_btn_v1')):?>
                    <ul class="nav-menu nav-menu-social align-to-right">
                        <li class="add-listing theme-bg">
                            <a href="<?php echo esc_url($options->get('btn_link_v1'), $allowed_html);?>" data-toggle="modal" data-target="#getstarted"><?php echo wp_kses($options->get('btn_title_v1'), $allowed_html);?></a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->