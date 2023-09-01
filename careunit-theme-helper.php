<?php
/**
 * Plugin Name: careunit Helper Plugin
 * Plugin URI: http://www.themeebit.com
 * Description: After install the careunit WordPress Theme, you must need to install this "careunit Helper Plugin" first to get all functions of careunit WP Theme.
 * Version: 1.0.0
 * Author: ThemeeBiT
 * Author URI: http://www.themeebit.com
 * Text Domain: careunit
 * License: GPL/GNU.
 /*  Copyright 2014  careunit (email : support@themeebit.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//define
define( 'PLG_URL', plugins_url() );
define( 'PLG_DIR', dirname( __FILE__ ) ); 

function careunit_custom_tittle($tittle){
    $tittle = 'Hello Title'. $tittle
    return $tittle
}

/**----------------------------------------------------------------*/
/*    // careunit all shortcodes
/*-----------------------------------------------------------------*/  
include_once(PLG_DIR. '/careunit-custom-post.php');

add_shortcode('careunit_section_title', 'careunit_section_title_shortcode');
function careunit_section_title_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title' => '',
		'title_paragraph' => '',
	), $atts ) );
	
	ob_start(); ?>
        <div class="section_title">
            <?php if(!empty($title)){ ?>
                <h2 class="sec_Hd"><?php echo $title;?></h2>
            <?php } ?>
            <?php if(!empty($title_paragraph)){ ?>
            <p class="area_content">
                <?php echo $title_paragraph; ?>
            </p>
            <?php } ?>
        </div>
	<?php
	return ob_get_clean();
}
//Giant Top Sidebar
add_shortcode('top_sidebar', 'careunit_topsidebar_shortcode');
function careunit_topsidebar_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'topsidebar_title' => '',
		'topsidebar_paragraph' => '',
		'topsidebar_icon' => '',
	), $atts ) );
	
	ob_start(); ?>
        <div class="topsider_box">
            <i class="glyphicon glyphicon-<?php echo $topsidebar_icon; ?>"></i>
            <?php if(!empty($topsidebar_title)){ ?>
                <h3><?php echo $topsidebar_title; ?></h3>
            <?php } ?>
            <?php if(!empty($topsidebar_paragraph)){ ?>
                <p class="colorWhite">
                    <?php echo $topsidebar_paragraph; ?>
                </p>
            <?php } ?>
        </div> 
	<?php
	return ob_get_clean();
}
//Careunit Welcome
add_shortcode('welcome_careunit', 'careunit_welcome_careunit_shortcode');
function careunit_welcome_careunit_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'welcome_title' => '',
		'welcome_paragraph' => '',
        'choose_list_1' => '',
		'choose_list_2' => '',
		'choose_list_3' => '',
		'choose_list_4' => '',
		'choose_list_5' => '',
		'choose_list_6' => '',
		'image' => '',
	), $atts ) );
	$imgadd = wp_get_attachment_image_src($image, 'full');
	$image = $imgadd[0]; 
	ob_start(); ?>
        <!-- WELCOME AREA START --> 
        <section class="welcome_area">
            <div class="row">
                <div class="col-sm-5">
                    <div class="section_title">
                        <?php if(!empty($welcome_title)){ ?>
                            <h2 class="sec_Hd"><?php echo $welcome_title; ?></h2>
                        <?php } ?>
                        <?php if(!empty($welcome_paragraph)){ ?>
                        <p class="area_content">
                            <?php echo $welcome_paragraph; ?>
                        </p>
                        <?php } ?>
                    </div>
                    <div class="welcontent">
                        <ul class="choose-list">
                            <?php if(!empty($choose_list_1)){ ?>
                                <li><?php echo $choose_list_1; ?></li>
                            <?php } ?>
                            <?php if(!empty($choose_list_2)){ ?>
                                <li><?php echo $choose_list_2; ?></li>
                            <?php } ?>
                            <?php if(!empty($choose_list_3)){ ?>
                                <li><?php echo $choose_list_3; ?></li>
                            <?php } ?>
                            <?php if(!empty($choose_list_4)){ ?>
                                <li><?php echo $choose_list_4; ?></li>
                            <?php } ?>
                            <?php if(!empty($choose_list_5)){ ?>
                                <li><?php echo $choose_list_5; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7">
                    <figure class="wel_right">
                        <img src="<?php echo $image; ?>" alt="welcome" />
                    </figure>
                </div>
            </div>
        </section>
        <!-- WELCOME AREA END -->   
	<?php
	return ob_get_clean();
}
//usages: [clinical_service]
add_shortcode('clinical_service', 'careunit_clinical_service_shortcode');
function careunit_clinical_service_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
        'length' => 20
	),$atts));
	
	ob_start(); ?>
    <?php 
    $clinicalservice = new WP_Query( array( 
        'post_type' => 'clinical_service', 
        'posts_per_page'=> $posts_per_page
    )); ?>
    <div class="row">     
        <div class="col-md-12">
            <div class="item_clinicalservice">
                <div class="clinicalServices_nav">
                    <i class="fa fa-angle-left testi_prev"></i>
                    <i class="fa fa-angle-right testi_next"></i>
                </div>
                <div class="clinicalServices_inner">
                <?php 
                while ( $clinicalservice->have_posts() ) : $clinicalservice->the_post();
                $departname = get_post_meta( get_the_ID(), '_careunit_depart_name', 1 );
                $departicon = get_post_meta( get_the_ID(), '_careunit_depart_icon', 1 ); ?>
                    <div class="item">
                        <figure>
                            <?php the_post_thumbnail('careunit_clinical_img'); ?>
                            <figcaption>
                                <i class="flaticon-<?php echo $departicon; ?> "></i>
                                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                                <?php if(!empty($departname)){ ?>
                                    <h5><?php echo esc_html($departname); ?></h5>
                                <?php } ?>
                                <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                            </figcaption> 
                        </figure>
                    </div>
                    <?php endwhile; 
                    wp_reset_query(); ?> 
                </div>
            </div>
        </div>
    </div>
	<?php
	return ob_get_clean();
}
//usages: [careunitservice]
add_shortcode('careunitservice', 'careunit_service_shortcode');
function careunit_service_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 4,
        'length' => 10
	),$atts));
	
	ob_start(); ?>
    <?php 
    $generalservice = new WP_Query( array( 
        'post_type' => 'careunit_service', 
        'posts_per_page'=> $posts_per_page
    )); ?>
    
        <?php 
        while ( $generalservice->have_posts() ) : $generalservice->the_post();
        $serviceicon = get_post_meta( get_the_ID(), '_careunit_service_icon', 1 ); ?>
            <div class="col-sm-3">
                <div class="service_box">
                    <div class="service_icon">
                        <i class="fa fa-<?php echo $serviceicon; ?>"></i>
                    </div>
                    <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                    <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                    <a class="care_bt" href="<?php echo esc_url(get_permalink()); ?>">
                        <?php echo esc_html('Read More', 'careunit'); ?>
                    </a>
                </div> 
            </div>
            <?php endwhile; 
            wp_reset_query(); ?> 
          
	<?php
	return ob_get_clean();
}
//usages: [doctor_details]
add_shortcode('doctor_details', 'careunit_doctor_details_shortcode');
function careunit_doctor_details_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
        'length' => 10
	),$atts));
	
	ob_start(); ?>
    <!-- OUR DOCTORS STAET -->
    <section class="tab-area sd_sec_bg">
        <!-- Nav tabs -->
        <div class="row area_content">
            <div class="col-md-2 fix_p_r">
                <ul class="doctor_catagory" role="tablist">
                    <?php 
                        $all_terms = get_terms('doctor_category', array(
                        'hide_empty' => false
                        ));
                        $x=0;
                        foreach($all_terms as $single_term){
                            $active = $x==0 ? 'active' : '';
                                echo '<li class="'.$active.'">
                                <a href="#'.$single_term->slug.'" data-toggle="tab">'.$single_term->name .'</a>
                            </li>';
                        $x++; }
                    ?>
					<button class="mvvTabs__button nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Our MIssion</button>
                    <button class="mvvTabs__button nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Our Vision</button>
                    <button class="mvvTabs__button nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Our Values</button>
                </ul> 
            </div>
            <!-- Tab panes -->
            <div class="col-md-10">
                <div class="tab-content">
                <?php 
                    $x= 0;
                    $all_terms = get_terms('doctor_category', array(
                    'hide_empty' => false
                    ));
                    foreach($all_terms as $single_term){ ?>
                        <div role="tabpanel" class="tab-pane <?php echo $x==0 ? 'active': null; ?> fade in" id="<?php echo $single_term->slug; ?>">
                            <?php 
                                $doctor_tab = null;
                                $doctor_tab = new WP_Query(array(
                                    'post_type' => 'doctor_tab',
                                    'posts_per_page'=> -1,
                                    'doctor_category'=>$single_term->slug
                                ));
                                if( $doctor_tab->have_posts() ){
                                    while( $doctor_tab->have_posts() ){
                                        $doctor_tab->the_post(); 
                                        $doctordesignation = get_post_meta( get_the_ID(), '_careunit_doctor_designation', true );
                                        $icon_linkname = get_post_meta( get_the_ID(), '_careunit_doctor_social_icon', true );
                                        ?>
                                <div class="tab-item">
                                    <figure>
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                           <?php the_post_thumbnail('careunit_doc_img'); ?>
                                        </a>
                                        <figcaption>
                                            <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                                            <h5><?php echo $doctordesignation; ?></h5>
                                            <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                                            <ul class="doctor_social">
                                                <?php if( is_array($icon_linkname)){
                                                foreach($icon_linkname as $iconlink){ ?>
                                                <li>
                                                    <a href="<?php echo $iconlink['_careunit_socialicon_link']; ?>">
                                                    <i class="fa fa-<?php echo $iconlink['_careunit_socialicon_name']; ?>">
                                                    </i>
                                                    <i class="fa fa-<?php echo  $iconlink['_careunit_socialicon_name']; ?> hovereffect">
                                                    </i>
                                                    </a>
                                                </li>
                                                <?php  } 
                                                }?> 
                                            </ul>
                                        </figcaption>
                                    </figure>
                                </div>    
                                <?php }

                                }else{
                                    echo 'No post';
                                }
                                wp_reset_postdata();
                            ?>
                        </div>
                <?php $x++; } ?> 
                </div>
                <div class="tab_area_nav">
                    <i class="fa fa-angle-left testi_prev"></i>
                    <i class="fa fa-angle-right testi_next"></i>
                </div> 
            </div>
        </div> 
    </section>
    <!-- OUR DOCTORS END -->
	<?php
	return ob_get_clean();
}
//usages: [careunit_post]
add_shortcode('careunit_post', 'careunit_post_shortcode');
function careunit_post_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
		'length'=> 20
		
	),$atts));
    global $careunit_opt;
	ob_start();
            $bp_post = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page'=> $posts_per_page
            )); ?>
            <div class="row blog_area">
            <?php while ( $bp_post->have_posts() ) : $bp_post->the_post(); ?>
                <div class="col-sm-6">
                    <div class="single_news row fix_m">
                        <figure class="col-xs-12 col-sm-4 fix_p">
                            <?php the_post_thumbnail('careunit_post_img'); ?>
                        </figure>
                        <div class="news_txt col-xs-12 col-sm-8">
                            <?php
                                if ( is_sticky() ) {
                                    echo '<div class="sticky_post"><span>'.esc_html__('Featured', 'careunit').'</span></div>';
                                }
                                the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                            <ul class="single_post_admin">
                                <li><i class="fa fa-user"></i>
                                    <?php the_author_posts_link(); ?>
                                </li>
                                <li><i class="fa fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </li>
                            </ul>
                            <?php the_excerpt();
                                wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'careunit' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                                <a class="care_bt" href="<?php echo esc_url( get_permalink()); ?>">
                                    <?php careunit_blog_read_more(); ?>
                                </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
            </div>
	<?php
	return ob_get_clean();
}
// Our Mission And Vission
// usages: [call_to_action]
add_shortcode('subscribe_area', 'subscribe_shortcode');
function subscribe_shortcode($atts, $content=null){
	extract(shortcode_atts(array(),$atts));
    global $careunit_opt;
	ob_start(); ?>
       <!-- START SUBSCRIBE AREA -->
        <div class="col-sm-12">
            <div class="subscribe_form">
                <div class="subscribe_title">
                    <h2><?php echo esc_html($careunit_opt['newsletter_title']); ?></h2>
                </div>
                <div class="subscribe_form">
                      <?php if(class_exists( 'WYSIJA_NL_Widget' )){
                       the_widget('WYSIJA_NL_Widget', array(
                        'title' => '',
                        'form' => (int)$careunit_opt['newsletter_form'],
                        'id_form' => 'newsletter1_popup',
                        'success' => '',
                       ));
                      }?>
                </div>
            </div>  
        </div>
        <!-- END SUBSCRIBE AREA --> 
    <?php
	return ob_get_clean();
}
//usages: [clinical_service]
add_shortcode('testimonial', 'careunit_testimonial_shortcode');
function careunit_testimonial_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
	),$atts));
	ob_start(); ?>
    <?php 
    $patientssaying = new WP_Query( array( 
        'post_type' => 'patients_saying', 
        'posts_per_page'=> $posts_per_page
    )); ?>
            
    <div class="patientslide_item">
        <div id="patient_slide">
            <?php 
            while ( $patientssaying->have_posts() ) : $patientssaying->the_post();
            $client_designation = get_post_meta( get_the_ID(), '_careunit_desig', 1 );?>
                <div class="item">
                    <div class="patient_comment">
                        <?php the_content(); ?>
                    </div>
                    <div class="content mt-20">
                        <div class="thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="patient-details">
                            <h5 class="author"><?php the_title(); ?></h5>
                            <h6 class="title"><?php echo $client_designation; ?></h6>
                        </div>
                    </div>
                </div>
                <?php endwhile; 
                wp_reset_query(); ?>
        </div>
    </div>
	<?php
	return ob_get_clean();
}
//usages: [careunit_post]
add_shortcode('coundown_area', 'careunit_coundown_shortcode');
function careunit_coundown_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'coundown_icon'=> '',
		'counter'=> '',
		'title'=> '',
		'text_area'=> ''
		
	),$atts));
	ob_start(); ?>
            <div class="single_coudown">
                <i class="fa fa-<?php echo $coundown_icon; ?>"></i>
                <h1 class="counter"><?php echo $counter; ?></h1>
                <h3 class="text-center"><?php echo $title; ?></h3>
                <p class="text-center"><?php echo $text_area; ?></p>
            </div>
	<?php
	return ob_get_clean();
}
//Shortcode For Home Page-2
//usages: [careunit_post]
add_shortcode('feature2_area', 'careunit_feature2_area_shortcode');
function careunit_feature2_area_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'f_icon'=> '',
		'f_iconbg'=> '',
		'title'=> '',
		'f_text'=> '',
	),$atts));
	ob_start(); ?>
        <div class="index-2">
            <div class="single_feature text-center">
                <i class="fa fa-<?php echo $f_icon; ?> sfi_bg"></i>
                <i class="fa fa-<?php echo $f_iconbg; ?> bgicon"></i>
                <div class="singlefeature_cont">
                    <h4><?php echo $title; ?></h4>
                    <p class="text-center"><?php echo $f_text; ?></p>
                </div>
            </div> 
        </div>    
	<?php
	return ob_get_clean();
}
//usages: [clinical_service_2]
add_shortcode('clinical_service_2', 'careunit_clinical_service_2_shortcode');
function careunit_clinical_service_2_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
        'length' => 20
	),$atts));
	
	ob_start(); ?>
    <?php 
    $clinicalservice = new WP_Query( array( 
        'post_type' => 'clinical_service', 
        'posts_per_page'=> $posts_per_page
    )); ?>
           
        <?php 
            while ( $clinicalservice->have_posts() ) : $clinicalservice->the_post();
            $departicon = get_post_meta( get_the_ID(), '_careunit_depart_icon', 1 ); ?>
                    <div class="col-md-4 fix_p_l">
                        <div class="single_as">
                            <div class="as_icon">
                                <i class="flaticon-<?php echo $departicon; ?> "></i>
                            </div>
                            <div class="service_text">
                                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                                <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile; 
            wp_reset_query(); ?> 
	<?php
	return ob_get_clean();
}
//usages: [doctor_details]
add_shortcode('doctor_details_style2', 'careunit_doctor_detailsstyle2_shortcode');
function careunit_doctor_detailsstyle2_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
        'length' => 10
	),$atts));
	
	ob_start(); ?>
    <!-- OUR DOCTORS STAET -->
    <div class="index-2">
        <section class="tab-area">
            <!-- Nav tabs -->
            <div class="row area_content">
                <div class="col-md-12 fix_p_r">
                    <ul class="doctor_catagory" role="tablist">
                        <?php 
                            $all_terms = get_terms('doctor_category', array(
                            'hide_empty' => false
                            ));
                            $x=0;
                            foreach($all_terms as $single_term){
                                $active = $x==0 ? 'active' : '';
                                    echo '<li class="'.$active.'">
                                    <a href="#'.$single_term->slug.'" data-toggle="tab">'.$single_term->name .'</a>
                                </li>';
                            $x++; }
                        ?>
                    </ul> 
                </div>
                <!-- Tab panes -->
                <div class="col-md-12">
                    <div class="tab-content">
                    <?php 
                        $x= 0;
                        $all_terms = get_terms('doctor_category', array(
                        'hide_empty' => false
                        ));
                        foreach($all_terms as $single_term){ ?>
                            <div role="tabpanel" class="tab-pane <?php echo $x==0 ? 'active': null; ?> fade in" id="<?php echo $single_term->slug; ?>">
                                <?php 
                                    $doctor_tab = null;
                                    $doctor_tab = new WP_Query(array(
                                        'post_type' => 'doctor_tab',
                                        'posts_per_page'=> -1,
                                        'doctor_category'=>$single_term->slug
                                    ));
                                    if( $doctor_tab->have_posts() ){
                                        while( $doctor_tab->have_posts() ){
                                            $doctor_tab->the_post(); 
                                            $doctordesignation = get_post_meta( get_the_ID(), '_careunit_doctor_designation', true );
                                            $icon_linkname = get_post_meta( get_the_ID(), '_careunit_doctor_social_icon', true );
                                            ?>
                                    <div class="tab-item">
                                        <figure>
                                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                               <?php the_post_thumbnail('careunit_doc_img'); ?>
                                            </a>
                                            <figcaption>
                                                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                                                <h5><?php echo $doctordesignation; ?></h5>
                                                <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                                                <ul class="doctor_social">
                                                    <?php if( is_array($icon_linkname)){
                                                    foreach($icon_linkname as $iconlink){ ?>
                                                    <li>
                                                        <a href="<?php echo $iconlink['_careunit_socialicon_link']; ?>">
                                                        <i class="fa fa-<?php echo $iconlink['_careunit_socialicon_name']; ?>">
                                                        </i>
                                                        <i class="fa fa-<?php echo  $iconlink['_careunit_socialicon_name']; ?> hovereffect">
                                                        </i>
                                                        </a>
                                                    </li>
                                                    <?php  } 
                                                    }?> 
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>    
                                    <?php }

                                    }else{
                                        echo 'No post';
                                    }
                                    wp_reset_postdata();
                                ?>

                            </div>
                    <?php $x++; } ?> 
                    </div>
                    <div class="tab_area_nav">
                        <i class="fa fa-angle-left testi_prev"></i>
                        <i class="fa fa-angle-right testi_next"></i>
                    </div> 
                </div>
            </div> 
        </section>
    </div>
    <!-- OUR DOCTORS END -->
	<?php
	return ob_get_clean();
}
//usages: [careunit_post_style2]
add_shortcode('careunit_post_style2', 'careunit_post_style2_shortcode');
function careunit_post_style2_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 2,
		'length'=> 20
		
	),$atts));
    global $careunit_opt;
	ob_start();
            $bp_post = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page'=> $posts_per_page
            ));  ?>
            <div class="row blog_area">
            <?php while ( $bp_post->have_posts() ) : $bp_post->the_post(); ?>
                <div class="col-sm-6">
                    <div class="single_news row fix_m">
                        <figure class="col-sm-12 fix_p">
                            <?php the_post_thumbnail('careunit_post_style2_img'); ?>
                        </figure>
                        <div class="news_txt col-sm-12">
                            <?php 
                                if ( is_sticky() ) {
                                    echo '<div class="sticky_post"><span>'.esc_html__('Featured', 'careunit').'</span></div>';
                                }
                            the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                            <ul class="single_post_admin">
                                <li><i class="fa fa-user"></i>
                                    <?php the_author_posts_link(); ?>
                                </li>
                                <li><i class="fa fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </li>
                            </ul>
                            <?php the_excerpt();
                                wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'careunit' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                                <a class="care_bt" href="<?php echo esc_url( get_permalink()); ?>">
                                    <?php careunit_blog_read_more(); ?>
                                </a>
                        </div>
                    </div>
                
            </div>
            <?php endwhile; wp_reset_query(); ?>
            </div>
	<?php
	return ob_get_clean();
}
//usages: [careunit_post]
add_shortcode('coundown_style2', 'careunit_coundown_style2_shortcode');
function careunit_coundown_style2_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'coundown_icon'=> '',
		'counter'=> '',
		'title'=> '',
		'text_area'=> ''
		
	),$atts));
	ob_start(); ?>
        <div class="coundown_area">
            <div class="single_coudown">
                <div class="sc_icon">
                    <i class="fa fa-<?php echo $coundown_icon; ?>"></i>
                </div>
                <h1 class="counter"><?php echo $counter; ?></h1>
                <h3 class="text-center"><?php echo $title; ?></h3>
                <p class="text-center"><?php echo $text_area; ?></p>
            </div>
        </div>
	<?php
	return ob_get_clean();
}
//usages: [welcome_careunit_text]
add_shortcode('welcome_careunit_text', 'careunit_welcome_text_shortcode');
function careunit_welcome_text_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'welcome_sub_title'=> '',
		'welcome_title'=> '',
		'welcome_text1'=> '',
		'welcome_text2'=> '',
		'welcome_redmore'=> '',
		'redmore_link'=> '',
	),$atts));
	ob_start(); ?>
        <div class="about_cont">
            <h5><?php echo $welcome_sub_title; ?></h5>
            <h2 class="sec_Hd"><?php echo $welcome_title; ?></h2>
            <p class="area_content"><?php echo $welcome_text1; ?></p>
            <p><?php echo $welcome_text2; ?></p>
            <a class="care_bt" href="<?php echo $redmore_link; ?>">
                <?php echo $welcome_redmore; ?>
            </a>
        </div>
	<?php
	return ob_get_clean();
}
//usages: [welcome_careunit_text]
add_shortcode('careunit_ceo', 'careunit_ceo_shortcode');
function careunit_ceo_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'image'=> '',
		'title'=> '',
		'sub_title'=> '',
		'ceo_details'=> '',
		'link'=> '',
		'biography'=> '',
	),$atts));
    $imgadd = wp_get_attachment_image_src($image, 'full');
	$image = $imgadd[0];
	ob_start(); ?>
        <div class="single_ceo">
            <figure>
                <img src="<?php echo $image; ?>" alt="ceo" />
            </figure>
            <div class="ceo_text">
                <h4><?php echo $title; ?></h4>
                <h5><?php echo $sub_title; ?></h5>
                <p><?php echo $ceo_details; ?></p>
                <a class="btn btn-default btn-color-border-solid" href="<?php echo $link; ?>">
                    <?php echo $biography; ?>
                </a>
            </div>
        </div>
	<?php
	return ob_get_clean();
}
//usages: [welcome_careunit_text]
add_shortcode('our_history', 'careunit_our_history_shortcode');
function careunit_our_history_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'length' => '',
		'posts_per_page' => '',
	),$atts));
	ob_start(); ?>
        <div class="timeline_wrap">
            <div class="inner">
                <?php
                $ourhistorytimeline = "null";
                $ourhistorytimeline = new WP_Query(array(
                    'post_type' => 'our_history',
                    'posts_per_page'=> $posts_per_page
                ));
                if($ourhistorytimeline->have_posts()){
                    while($ourhistorytimeline->have_posts()){
                        $ourhistorytimeline->the_post(); ?>
                    <div class="timeline_item">
                        <i class="fa fa-square"></i>
                        <?php the_title( '<h3 class="sec_Hd"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                        <div class="timeline_item_content">
                            <?php the_post_thumbnail(); ?>
                            <?php echo careunit_excerpt_by_id(get_the_id(), $length); ?>
                        </div>
                    </div>
                   <?php }
            }else{
                echo 'No Post';
            }
            ?>
            </div>
        </div>
	<?php
	return ob_get_clean();
}
// Partner Logo
// usages: [ourpartner]
add_shortcode('ourpartner', 'careunit_partner_shortcode');
function careunit_partner_shortcode($atts, $content=null){
	global $careunit_opt;
	extract(shortcode_atts(array(
		
	),$atts));
	
	ob_start(); ?>
    <div class="col-xs-12">
        <?php if(isset($careunit_opt['partner_logos'])){ ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="partners_slider">
                        <?php foreach($careunit_opt['partner_logos'] as $partner) {
                            if(is_ssl()){
                                $partner['image'] = str_replace('http:', 'https:', $partner['image']);
                            } ?>
                            <div class="item">
                                <img src="<?php echo $partner['image']; ?>" alt="<?php echo $partner['title'] ?>" />
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<?php }
	return ob_get_clean();
}
// Google map
// usages: [careunit_googlemap]
add_shortcode('careunit_googlemap', 'careunit_google_map');
function careunit_google_map($atts, $content=null){
    global $careunit_opt;
	extract(shortcode_atts(array(
        'from_title'=> '',
        'adress_title'=> '',
        'phone_no'=> '',
        'mail'=> '',
        'address_line'=> '',
        'time'=> '',
        'web'=> '',
    ),$atts));
	global $careunit_opt;
	ob_start(); ?>
    <!-- ==================================================
					==Start contact map area==
    =================================================== -->
		 <section class="content_area">
            <div class="row area_content">
                <div class="col-sm-12">
                    <!-- Contact area START -->
                    <div class="contact_map_area">
                        <div class="map_wrapper">
                            <div class="contact_map">
                                <div id="contactgoogleMap"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact area START -->
                </div>
            </div>
            <div class="row area_content">
                <div class="col-sm-6">
                    <div class="address">
                       <h4><?php echo $adress_title; ?></h4>
                        <ul class="contact_address">
                            <li><i class="fa fa-phone"></i><a href="tel:<?php echo esc_attr($phone_no); ?>"><?php echo $phone_no; ?></a>
                            </li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></li>
                            <li><i class="fa fa-globe"></i><?php echo $web; ?></li>
                            <li><i class="fa fa-clock-o"></i><?php echo $time; ?></li>
                            <li><i class="fa fa-map-marker"></i><?php echo $address_line; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contact_box">
                        <h4><?php echo $from_title; ?></h4>
                        <?php echo do_shortcode( $content ); ?>
                    </div>
                </div>
            </div>
        </section>
		<!-- =======================================
					==Start contact map area==
		======================================= -->
	<?php
	return ob_get_clean();
}

//Shortcodes for Visual Composer
add_action( 'vc_before_init', 'careunit_vc_shortcodes' );
function careunit_vc_shortcodes() {
    vc_map( array(
		"name" => esc_html__( "Careunit Section Title", "careunit" ),
		"base" => "careunit_section_title",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Section Title", "careunit" ),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Section Sub Title", "careunit" ),
				"param_name" => "title_paragraph",
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "Careunit Top Sidebar", "careunit" ),
		"base" => "top_sidebar",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Sidebar Title", "careunit" ),
				"param_name" => "topsidebar_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Sidebar Paragraph", "careunit" ),
				"param_name" => "topsidebar_paragraph",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Top Sidebar Icon", "careunit" ),
				"param_name" => "topsidebar_icon",
			),
		)
	) );
     vc_map( array(
		"name" => esc_html__( "Welcom Careunit", "careunit" ),
		"base" => "welcome_careunit",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Welcome Title", "careunit" ),
				"param_name" => "welcome_title",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Welcome Title Paragraph", "careunit" ),
				"param_name" => "welcome_paragraph",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Choose List 1", "careunit" ),
				"param_name" => "choose_list_1",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Choose List 2", "careunit" ),
				"param_name" => "choose_list_2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Choose List 3", "careunit" ),
				"param_name" => "choose_list_3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Choose List 4", "careunit" ),
				"param_name" => "choose_list_4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Choose List 5", "careunit" ),
				"param_name" => "choose_list_5",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Welcome", "careunit" ),
				"param_name" => "image",
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "Clinical Service", "careunit" ),
		"base" => "clinical_service",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "20", "careunit" ),
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "CareUnit Service", "careunit" ),
		"base" => "careunitservice",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "4", "careunit" ),
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "CarePlus Doctor Details", "careunit" ),
		"base" => "doctor_details",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "10", "careunit" ),
			),
		)
	) );
    
    //Blog Post
	vc_map( array(
		"name" => esc_html__( "careunit Blog Post ", "careunit" ),
		"base" => "careunit_post",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Count of Blog Post", "careunit" ),
				"param_name" => "posts_per_page",
                "value" => esc_html__( "3", "careunit" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Length", "careunit" ),
				"param_name" => "length",
				"value" => esc_html__( "20", "careunit" ),
			)
		)
	) );
    
    //Subscribe_area
	vc_map( array(
		"name" => esc_html__( "Subscribe ", "careunit" ),
		"base" => "subscribe_area",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		
	) );
    //Testimonila
    vc_map( array(
		"name" => esc_html__( "careunit Testimonila", "careunit" ),
		"base" => "testimonial",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Testimonial Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
		)
	) );
    //Our Staff
    vc_map( array(
		"name" => esc_html__( "Our Staff", "careunit" ),
		"base" => "coundown_area",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Coundown Icon Name", "careunit" ),
				"param_name" => "coundown_icon",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Numeric", "careunit" ),
				"param_name" => "counter",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Title", "careunit" ),
				"param_name" => "title",
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Text", "careunit" ),
				"param_name" => "text_area",
			),
		)
	) );
    //Feature Area For Home-2
    vc_map( array(
		"name" => esc_html__( "Feature Area For Home-2", "careunit" ),
		"base" => "feature2_area",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Feature Icon", "careunit" ),
				"param_name" => "f_icon",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Feature Background Icon", "careunit" ),
				"param_name" => "f_iconbg",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Title", "careunit" ),
				"param_name" => "title",
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Text", "careunit" ),
				"param_name" => "f_text",
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "Clinical Service_2", "careunit" ),
		"base" => "clinical_service_2",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "20", "careunit" ),
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "CarePlus Doctor Details Style2", "careunit" ),
		"base" => "doctor_details_style2",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "-1", "careunit" ),
			),
		)
	) );
    //Blog Post Home-2
	vc_map( array(
		"name" => esc_html__( "Careunit Blog Post Style2 ", "careunit" ),
		"base" => "careunit_post_style2",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Count of Blog Post", "careunit" ),
				"param_name" => "posts_per_page",
                "value" => esc_html__( "2", "careunit" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Length", "careunit" ),
				"param_name" => "length",
				"value" => esc_html__( "20", "careunit" ),
			)
		)
	) );
    //Our Staff Style2
    vc_map( array(
		"name" => esc_html__( "Our Staff Style2", "careunit" ),
		"base" => "coundown_style2",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Coundown Icon Name", "careunit" ),
				"param_name" => "coundown_icon",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Numeric", "careunit" ),
				"param_name" => "counter",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Title", "careunit" ),
				"param_name" => "title",
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Counter Text", "careunit" ),
				"param_name" => "text_area",
			),
		)
	) );
    // About Us Shortcode
    vc_map( array(
		"name" => esc_html__( "Welcome Text", "careunit" ),
		"base" => "welcome_careunit_text",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Welcome Sub Title", "careunit" ),
				"param_name" => "welcome_sub_title",
				"description" => esc_html__( "Enter Welcome Sub Title", "careunit" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Welcome Title", "careunit" ),
				"param_name" => "welcome_title",
				"description" => esc_html__( "Enter Welcome Title", "careunit" )
			),	
			array(
				"type" => "textarea",
				"holder" => "div",
				"heading" => esc_html__( "welcome Text1", "careunit" ),
				"param_name" => "welcome_text1",
				"description" => esc_html__( "Enter Welcome Text2", "careunit" )
			),		
			array(
				"type" => "textarea",
				"holder" => "div",
				"heading" => esc_html__( "Welcome Text2", "careunit" ),
				"param_name" => "welcome_text2",
				"description" => esc_html__( "Enter Welcome Text2", "careunit" )
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Welcome Redmore", "careunit" ),
				"param_name" => "welcome_redmore",
				"description" => esc_html__( "Enter Welcome Redmore.", "careunit" )
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Redmore Link", "careunit" ),
				"param_name" => "redmore_link",
				"description" => esc_html__( "Enter Redmore Link.", "careunit" )
			),		
		)
	) );
    // CEO Shortcode
    vc_map( array(
		"name" => esc_html__( "CEO", "careunit" ),
		"base" => "careunit_ceo",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"heading" => esc_html__( "Ceo Image", "careunit" ),
				"param_name" => "image",
				"description" => esc_html__( "Enter Ceo Image", "careunit" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "CEO Title", "careunit" ),
				"param_name" => "title",
				"description" => esc_html__( "Enter Welcome Title", "careunit" )
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "CEO Sub Title", "careunit" ),
				"param_name" => "sub_title",
				"description" => esc_html__( "CEO Sub Title", "careunit" )
			),		
			array(
				"type" => "textarea",
				"holder" => "div",
				"heading" => esc_html__( "Ceo Details", "careunit" ),
				"param_name" => "ceo_details",
				"description" => esc_html__( "Enter Ceo Details", "careunit" )
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Welcome Redmore", "careunit" ),
				"param_name" => "link",
				"description" => esc_html__( "Enter Redmore Link", "careunit" )
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Redmore", "careunit" ),
				"param_name" => "biography",
				"description" => esc_html__( "Enter Biography.", "careunit" )
			),		
		)
	) );
    vc_map( array(
		"name" => esc_html__( "Our History", "careunit" ),
		"base" => "our_history",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "careunit" ),
				"param_name" => "posts_per_page",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content Length", "careunit" ),
				"param_name" => "length",
                "value" => esc_html__( "25", "careunit" ),
			),
		)
	) );
    //partner logos
	vc_map( array(
		"name" => esc_html__( "Partner Logos", "careunit" ),
		"base" => "ourpartner",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Title", "careunit" ),
				"param_name" => "title",
				"description" => esc_html__( "Enter Title.", "careunit" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Subtitle", "careunit" ),
				"param_name" => "contact_number",
				"description" => esc_html__( "Enter Subtitle Here.", "careunit" )
			),		
		)
	) );
    //Google Map
	vc_map( array(
		"name" => esc_html__( "Careunit Google Map ", "careunit" ),
		"base" => "careunit_googlemap",
		"class" => "",
		"category" => esc_html__( "Careunit Themes", "careunit"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( " Form Title", "careunit" ),
				"param_name" => "from_title",
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( " Contact Form", "careunit" ),
				"param_name" => "content",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Address Title", "careunit" ),
				"param_name" => "adress_title",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Contact Phone N0", "careunit" ),
				"param_name" => "phone_no",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Contact Mail", "careunit" ),
				"param_name" => "mail",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Time", "careunit" ),
				"param_name" => "time",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Web Address", "careunit" ),
				"param_name" => "web",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Address Line", "careunit" ),
				"param_name" => "address_line",
			),
		)
	) );
}
// Blog View Count
function careunit_getCrunchifyPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
 
function careunit_setCrunchifyPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
/* Blog sharing */
function careunit_blog_sharing() {
	global $post, $careunit_opt;	
	$share_url = get_permalink( $post->ID );
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$shearpostimg = $large_image_url[0];
	$posttitle = get_the_title( $post->ID );
	?>
		<ul>
			<li>
                <a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.$share_url); ?>'); return false;" title="Facebook" target="_blank">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook hovereffect"></i>
                </a>
			</li>
			<li>
                <a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo esc_url('https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url); ?>'); return false;" target="_blank">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter hovereffect"></i>
                </a>
			</li>
			<li>
                <a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$shearpostimg.'&amp;description='.$posttitle); ?>'); return false;" title="Pinterest" target="_blank">
                    <i class="fa fa-pinterest"></i>
                    <i class="fa fa-pinterest hovereffect"></i>
                </a>
			</li>
			<li>
			    <a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://plus.google.com/share?url='.$share_url); ?>'); return false;" title="Google +" target="_blank">
			        <i class="fa fa-google-plus"></i>
                    <i class="fa fa-google-plus hovereffect"></i>
			    </a>
            </li>
		</ul>
	<?php
}