<?php
/**
 * Plugin Name: dexpress Helper Plugin
 * Plugin URI: https://www.digitalexpressionsltd.com
 * Description: After install the dexpress WordPress Theme, you must need to install this "dexpress Helper Plugin" first to get all functions of dexpress WP Theme.
 * Version: 1.0.0
 * Author: Mushfiqur Rahman
 * Author URI: https://www.digitalexpressionsltd.com
 * Text Domain: dexpress
 * License: GPL/GNU.
 /*  Copyright 2014  dexpress (email : info@digitalexpressionsltd.com)

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
define( 'dexpress_PLG_DIR', dirname( __FILE__ ) );

/**----------------------------------------------------------------*/
/*    // dexpress all shortcodes
/*-----------------------------------------------------------------*/  
include_once(dexpress_PLG_DIR. '/dexpress-custom-post.php');


add_shortcode('dexpress_section_title', 'dexpress_section_title_shortcode');
function dexpress_section_title_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title' => '',
		'title_paragraph' => '',
	), $atts ) );
	
	ob_start(); ?>
    <div class="clearfix">
        <div class="col-sm-12">
            <div class="section_title">
                <?php if(!empty($title)){ ?>
                    <h2><?php echo $title;?></h2>
                <?php } ?>
                <?php if(!empty($title_paragraph)){ ?>
                <p class="area_content">
                    <?php echo $title_paragraph; ?>
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
	<?php
	return ob_get_clean();
}

//usages: [dexpressservice Title]
add_shortcode('dexpress_service_title', 'dexpress_service_title_shortcode');
function dexpress_service_title_shortcode( $atts, $content = null  ) {
  extract( shortcode_atts( array(
    'title' => '',
    'title2' => '',
    'title_paragraph' => '',
  ), $atts ) );
  
  ob_start(); ?>
    <div class="clearfix">
        <div class="col-sm-12">
            <div class="section_title">
                <?php if(!empty($title)){ ?>
                    <h2><?php echo $title;?></h2>
                <?php } ?>
                <?php if(!empty($title2)){ ?>
                    <h4><?php echo $title2;?></h4>
                <?php } ?>
                <?php if(!empty($title_paragraph)){ ?>
                <p class="area_content">
                    <?php echo $title_paragraph; ?>
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
  <?php
  return ob_get_clean();
}

//usages: [dexpressservice]
add_shortcode('dexpress_service', 'dexpress_service_shortcode');
function dexpress_service_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
	),$atts));
    ob_start(); ?>
    <?php 
    $generalservice = new WP_Query( array( 
        'post_type' => 'dexpress-service', 
        'posts_per_page'=> $posts_per_page,
        'order' =>'ASC' 
    )); ?>
    <section class="service_area">
       <?php
       while ( $generalservice->have_posts() ) : $generalservice->the_post();
       $s_img = get_post_meta( get_the_ID(), '_dexpress_serviceimge', true );
        
       ?>
        <!-- ==================================================  
						Start Service Area
		=================================================== -->
       <div class="col-md-4" data-aos="zoom-out-up" data-aos-duration="3000">
            <figure class="single_sv_slider">
                <div class="single_sv_slider_img">
                    <a class="venobox vbox-item" data-gall="gallery01" href="<?php echo $s_img; ?>">
                        <img src="<?php echo $s_img; ?>" alt="service image">
                    </a>
                </div>
                <figcaption class="service_content">
                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php echo esc_url(get_permalink() ) ?>">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </figcaption>
            </figure>
        </div>
		<!-- ==================================================  
						End Service Area
		=================================================== --> 
        <?php endwhile; 
        wp_reset_query(); ?> 
    </section>
	<?php
	return ob_get_clean();
}
//usages: [dexpressservice Sister]
add_shortcode('dexpress_service_sis', 'dexpress_service_sis_shortcode');
function dexpress_service_sis_shortcode($atts, $content=null){
  extract(shortcode_atts(array(
    'posts_per_page'=> -1,
  ),$atts));
    ob_start(); ?>
    <?php 
    $generalservice = new WP_Query( array( 
        'post_type' => 'dexpress-service', 
        'posts_per_page'=> $posts_per_page,
        'order' =>'DESC' 
    )); ?>
    <section class="service_area">
       <?php
       while ( $generalservice->have_posts() ) : $generalservice->the_post();
       $s_img = get_post_meta( get_the_ID(), '_dexpress_serviceimge', true );
        
       ?>
    <!-- ==================================================  
            Start Service Area
    =================================================== -->
       <div class="col-md-4" data-aos="zoom-out-up" data-aos-duration="3000">
            <figure class="single_sv_slider">
                <div class="single_sv_slider_img">
                    <a class="venobox vbox-item" data-gall="gallery01" href="<?php echo $s_img; ?>">
                        <img src="<?php echo $s_img; ?>" alt="service image">
                    </a>
                </div>
                <figcaption class="service_content">
                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php echo esc_url(get_permalink() ) ?>">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </figcaption>
            </figure>
        </div>
    <!-- ==================================================  
            End Service Area
    =================================================== --> 
        <?php endwhile; 
        wp_reset_query(); ?> 
    </section>
  <?php
  return ob_get_clean();
}
//usages: [dexpress_service]
add_shortcode('dexpress_service_page', 'dexpress_service_page_shortcode');
function dexpress_service_page_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
	),$atts));
	
	ob_start(); ?>
    <?php 
    $generalservice = new WP_Query( array( 
        'post_type' => 'dexpress-service', 
        'posts_per_page'=> $posts_per_page
    )); 
    while ( $generalservice->have_posts() ) : $generalservice->the_post();
            ?>
        <!-- ==================================================  
						Start Service Area
		=================================================== -->
        <div class="col-sm-3 servicepage fix_p_l">
            <figure class="single_sv_slider">
                <div class="single_sv_slider_img">
                    <a class="venobox vbox-item" data-gall="gallery01" href="<?php the_post_thumbnail_url(); ?>">
                        <img src="<?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_dexpress_serviceimge', 1 ), 'dexpress-service-img' );?>">
                    </a>
                </div>
                <figcaption class="service_content">
                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                    <?php the_excerpt(); ?>
                </figcaption>
            </figure>
        </div>
		<!-- ==================================================  
						End Service Area
		=================================================== --> 
        <?php endwhile; 
        wp_reset_query();
	return ob_get_clean();
}
//service page end
//usages: [dexpress_subscribe]
add_shortcode('dexpress_subscribe', 'dexpress_subscribe_shortcode');
function dexpress_subscribe_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'subscribe_title'=> '',
        'subscribe_detail'=> '',
        'subscribebtn_link'=> '',
        'subscribebtn_text'=> '',
    ),$atts));
	ob_start(); ?>
        <!-- ==================================================  
						Start Subscribe Area
		=================================================== -->
		<section class="subscribe_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscribe_content" class="subscribe_btn" data-aos="fade-right" data-aos-duration="3000">
							<h4><?php echo $subscribe_title; ?></h4>
							<p><?php echo $subscribe_detail; ?> </p>
						</div>
						<div class="subscribe_btn" data-aos="fade-left" data-aos-duration="3000">
							<div class="btn_two"></div>
							<a href="<?php echo $subscribebtn_link; ?>" class="talk_text">
							  <?php echo $subscribebtn_text; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ==================================================  
						End Subscribe Area
		=================================================== -->
	<?php
	return ob_get_clean();
}
//usages: [dexpress_Portfolio]
add_shortcode('dexpress_portfolio', 'dexpress_portfolio_shortcode');
function dexpress_portfolio_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
		'work_category'=> '',
	),$atts));
	ob_start(); ?>
        <!-- ======================================================
                    ==Start Portfolio==
        ====================================================== -->
        <div class="portfolio_area row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="portfolio_filter">
							<ul class="filter_list">
								<li class="filter active">
                                    <?php echo esc_html('All', 'dexpress'); ?>
                                </li>
                                <?php 
                                    $all_terms = get_terms('work_category', array(
                                    'hide_empty' => false
                                    ));
                                    if(is_array($all_terms)){
                                        foreach($all_terms as $single_term){
                                                echo '<li class="filter" data-filter=".'.$single_term->slug.'">
                                                <a>'.$single_term->name .'</a>
                                            </li>';
                                        }
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-md-12">
                        <div class="grid">
                            <?php
                                $g_recentwork = null;
                                $g_recentwork = new WP_Query( array( 
                                    'post_type' => 'dexpress-work', 
                                    'posts_per_page'=> $posts_per_page,                                    
                                    'work_category'=> $work_category
                                )); ?>
                                <?php $counter = 0;
                                while ( $g_recentwork->have_posts() ) : $g_recentwork->the_post(); 
                                $counter++;
                                $idd = get_the_ID();
                                $post_terms = get_the_terms(get_the_ID(), 'work_category');
                                $protfolio_video = esc_url( get_post_meta( $idd, '_dexpress_protfolioLink', 1 ) );
                                ?>
                                <div class="grid_item <?php if(is_array($post_terms)){foreach($post_terms as $post_term){echo $post_term->slug . ' '; }}?>">
                                    <div class="single_portfolio_item">
                                        <div class="portfolio_image">
                                            <?php the_post_thumbnail('dexpress-protfolio-img'); ?>
                                        </div>
                                        <div class="portfolio_hover">
                                            <?php if($protfolio_video){ ?>
                                                <a class="popup-youtube" href="<?php echo esc_attr ( $protfolio_video ); ?>">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            <?php }else{ ?>
                                                <div class="portfolio_hover_content_inner">
                                                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
                                                ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata();
                                $g_recentwork = null; ?>
                        </div>
            	    </div>
            	</div>
			</div>
		</div>
        <!-- ======================================================
                    ==End Portfolio==
        ====================================================== -->
	<?php
	return ob_get_clean();
}
//usages: [dexpress_Portfolio Style Two]
add_shortcode('dexpress_portfolio_2', 'dexpress_portfolio_2_shortcode');
function dexpress_portfolio_2_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'posts_per_page'=> -1,
	),$atts));
	ob_start(); ?>
        <!-- OUR DOCTORS STAET -->
    <section class="tab-area sd_sec_bg">
        <!-- Nav tabs -->
        <div class="row">
            <div class="col-md-12 fix_p" data-aos="fade-right" data-aos-duration="3000">
                <ul class="doctor_catagory" role="tablist">
                    <?php 
                        $all_terms = get_terms('work_category', array(
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
            <div class="col-md-12" data-aos="fade-left" data-aos-duration="3000">
                <div class="tab-content">
                <?php 
                    $x= 0;
                    $all_terms = get_terms('work_category', array(
                    'hide_empty' => false
                    ));
                    foreach($all_terms as $single_term){ ?>
                        <div role="tabpanel" class="tab-pane <?php echo $x==0 ? 'active': null; ?> fade in" id="<?php echo $single_term->slug; ?>">
                            <?php 
                                $g_recentwork = null;
                                $g_recentwork = new WP_Query(array(
                                    'post_type' => 'dexpress-work',
                                    'posts_per_page'=> -1,
									'order'=>'ASC',
                                    'work_category'=>$single_term->slug
                                ));
                                if( $g_recentwork->have_posts() ){
                                    while($g_recentwork->have_posts() ){
                                        $g_recentwork->the_post();
                                        $idd = get_the_ID();
                                        $clientname = get_post_meta($idd, '_dexpress_client_name', 1 );
                                        $protfolio_video = esc_url( get_post_meta( $idd, '_dexpress_protfolioLink', 1 ) );
                                        ?>
                                        <div class="single_portfolio_item">
                                            <div class="portfolio_image">
                                                <?php the_post_thumbnail('dexpress-protfolio-img'); ?>
                                            </div>
                                            <div class="portfolio_hover">
                                                <?php if($protfolio_video){ ?>
                                                
                                                
                                                <div class="portfolio_hover_content_inner">
                                                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
                                                ?>
                                                </div>
                                                <div class="clientanme">
                                                   <?php if( is_array($clientname)){
                                                        foreach($clientname as $canme){ ?>
                                                        <h5>
                                                           <?php echo ($canme); ?>
                                                        </h5>
                                                        <?php  } 
                                                        }?> 
                                                </div>
        
                                                <a class="popup-youtube" href="<?php echo esc_attr ( $protfolio_video ); ?>">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                <?php }else{ ?>
                                                        <div class="portfolio_hover_content_inner">
                                                            <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
                                                            ?>
                                                        </div>
                                                        <div class="clientanme">
                                                           <?php if( is_array($clientname)){
                                                                foreach($clientname as $canme){ ?>
                                                                <h5>
                                                                   <?php echo ($canme); ?>
                                                                </h5>
                                                                <?php  } 
                                                                }?> 
                                                        </div>
                                                    <?php } ?>
                                            </div>
                                        </div>  
                                <?php }
                                    wp_reset_postdata();
                                }else{
                                    echo 'No post';
                                }
                                
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
//usages: [dexpress_Portfolio page]
add_shortcode('dexpress_portfolio_page', 'dexpress_portfolio_page_shortcode');
function dexpress_portfolio_page_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'posts_per_page'=> -1,
        'work_category'=> $work_category
	),$atts));
	ob_start(); ?>
        <!-- OUR DOCTORS STAET -->
    <section class="tab-area sd_sec_bg">
        <!-- Nav tabs -->
        <div class="row">
            <!-- Tab panes -->
            <div class="col-md-12" data-aos="fade-left" data-aos-duration="3000">
                <div class="tab-content">
                <?php 
                    $x= 0;
                    $all_terms = get_terms('work_category', array(
                    'hide_empty' => false
                    ));
                    foreach($all_terms as $single_term){ ?>
                        <div role="tabpanel" class="tab-pane">
                            <?php 
                                $g_recentwork = null;
                                $g_recentwork = new WP_Query(array(
                                    'post_type' => 'dexpress-work',
                                    'posts_per_page'=> -1,
                                    'order'=>'DESC',
                                    'work_category'=> $work_category
                                ));
                                if( $g_recentwork->have_posts() ){
                                    while($g_recentwork->have_posts() ){
                                        $g_recentwork->the_post();
                                        $idd = get_the_ID();
                                        $protfolio_video = esc_url( get_post_meta( $idd, '_dexpress_protfolioLink', 1 ) );
                                        ?>
                                        <div class="single_portfolio_item">
                                            <div class="portfolio_image">
                                                <?php the_post_thumbnail('dexpress-protfolio-img'); ?>
                                            </div>
                                            <div class="portfolio_hover">
                                                <?php if($protfolio_video){ ?>
                                                <a class="popup-youtube" href="<?php echo esc_attr ( $protfolio_video ); ?>">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                <?php }else{ ?>
                                                        <div class="portfolio_hover_content_inner">
                                                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
                                                    ?>
                                                </div>
                                                    <?php } ?>
                                            </div>
                                        </div>  
                                <?php }
                                    wp_reset_postdata();
                                }else{
                                    echo 'No post';
                                }
                                
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
//usages: [dexpress_success_story]
add_shortcode('dexpress_success_story', 'dexpress_success_story_shortcode');
function dexpress_success_story_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'story1_title'=> '',
        'story1_des'=> '',
		'movie_img1'=> '',
		'day1'=> '',
		'month1'=> '',
		'year1'=> '',
        'story2_title'=> '',
        'story2_des'=> '',
		'movie_img2'=> '',
		'day2'=> '',
		'month2'=> '',
		'year2'=> '',
        'story3_title'=> '',
        'story3_des'=> '',
		'movie_img3'=> '',
		'day3'=> '',
		'month3'=> '',
		'year3'=> '',		
		'story4_title'=> '',
        'story4_des'=> '',
		'movie_img4'=> '',
		'day4'=> '',
		'month4'=> '',
		'year4'=> '',
		'story5_title'=> '',
        'story5_des'=> '',
		'movie_img5'=> '',
		'day5'=> '',
		'month5'=> '',
		'year5'=> '',
		
		
		
		
		
		
		
    ),$atts));
	ob_start();
     
	
	$imgadd1 =  wp_get_attachment_image_src($movie_img1, 'full');
	$imgadd2 =  wp_get_attachment_image_src($movie_img2, 'full');
	$imgadd3 =  wp_get_attachment_image_src($movie_img3, 'full');
	$imgadd4 =  wp_get_attachment_image_src($movie_img4, 'full');
	$imgadd5 =  wp_get_attachment_image_src($movie_img5, 'full');
	
    ?>
        <!-- ==================================================  
						Start Subscribe Area
		=================================================== -->
		<section class="success_story_area">
            <div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="title_icon">
					<i class="fa fa-align-center" aria-hidden="true"></i>
					<h2>Release Dates</h2>
				</div>
					
				</div>
			</div>			
			<div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="success_story_list">
                            <ul>
                                <li data-aos="fade-left" data-aos-duration="3000">
                                    <div class="s_story_img">
                                        <div class="s_story_img_bg">
                                            <div class="date">
												<div class="day"><?php echo $day1; ?></div>
												<div class="month"><?php echo $month1; ?></div>
												<div class="year"><?php echo $year1; ?></div>
											</div>
                                        </div>
                                    </div>
                                    <div class="s_story_content">
                                        <h4><?php echo $story1_title; ?></h4>
                                        <p><?php echo $story1_des; ?></p>
                                    </div>
									<div class="movie-imge">
									 <img src="<?php echo esc_url($imgadd1[0]); ?>" alt="Movie">
									</div>
                                </li>
                                <li data-aos="fade-left" data-aos-duration="2500">
                                    <div class="s_story_img">
                                        <div class="s_story_img_bg">
										<div class="date">
												<div class="day"><?php echo $day2; ?></div>
												<div class="month"><?php echo $month2; ?></div>
												<div class="year"><?php echo $year2; ?></div>
											</div>
                                        </div>
                                    </div>
                                    <div class="s_story_content">
                                        <h4><?php echo $story2_title; ?></h4>
                                        <p><?php echo $story2_des; ?></p>
                                    </div>
									<div class="movie-imge">
									 <img src="<?php echo esc_url($imgadd2[0]); ?>" alt="Movie">
									</div>
                                </li>
                                <li data-aos="fade-left" data-aos-duration="3000">
                                    <div class="s_story_img">
                                        <div class="s_story_img_bg">
										<div class="date">
												<div class="day"><?php echo $day3; ?></div>
												<div class="month"><?php echo $month3; ?></div>
												<div class="year"><?php echo $year3; ?></div>
											</div>
                                        </div>
                                    </div>
                                    <div class="s_story_content">
                                        <h4><?php echo $story3_title; ?></h4>
                                        <p><?php echo $story3_des; ?></p>
                                    </div>
									<div class="movie-imge">
									 <img src="<?php echo esc_url($imgadd3[0]); ?>" alt="Movie">
									</div>
                                </li>
								<li data-aos="fade-left" data-aos-duration="3000">
                                    <div class="s_story_img">
                                        <div class="s_story_img_bg">
											<div class="date">
												<div class="day"><?php echo $day4; ?></div>
												<div class="month"><?php echo $month4; ?></div>
												<div class="year"><?php echo $year4; ?></div>
											</div>
                                        </div>
                                    </div>
                                    <div class="s_story_content">
                                        <h4><?php echo $story4_title; ?></h4>
                                        <p><?php echo $story4_des; ?></p>
                                    </div>
									<div class="movie-imge">
									 <img src="<?php echo esc_url($imgadd4[0]); ?>" alt="Movie">
									</div>
                                </li>
								<li data-aos="fade-left" data-aos-duration="3000">
                                    <div class="s_story_img">
                                        <div class="s_story_img_bg">
											<div class="date">
												<div class="day"><?php echo $day5; ?></div>
												<div class="month"><?php echo $month5; ?></div>
												<div class="year"><?php echo $year5; ?></div>
											</div>
                                        </div>
                                    </div>
                                    <div class="s_story_content">
                                        <h4><?php echo $story5_title; ?></h4>
                                        <p><?php echo $story5_des; ?></p>
                                    </div>
									<div class="movie-imge">
									 <img src="<?php echo esc_url($imgadd5[0]); ?>" alt="Movie">
									</div>
                                </li>
                            </ul>
                        </div>
                    </div>
					
                </div>
            </div>
		</section>
		<!-- ==================================================  
						End Subscribe Area
		=================================================== -->
	<?php
	return ob_get_clean();
}
//Testimonials
//usages: [dexpresstestimonial]
add_shortcode('dexpresstestimonial', 'dexpress_testimonial_shortcode');
function dexpress_testimonial_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3
		
	),$atts));
	
	ob_start(); ?>
        <div class="col-md-12">
            <div class="tesm_slider owl-carousel"> 
                <?php 
                $cl_testi = new WP_Query( array( 
                    'post_type' => 'dexpress_testimonial', 
                    'posts_per_page'=> $posts_per_page
                )); ?>
                <?php $counter = 0;
                while ( $cl_testi->have_posts() ) : $cl_testi->the_post(); 
                $counter++; 
                $dexpresstesti = get_post_meta(get_the_id(),'_dexpress_client_desig', true); ?>
                <div class="single_tesm_slider" data-aos="fade-left" data-aos-duration="3000">
                    <div class="tesm_img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="tesm_content">
                        <?php the_content(); ?>
                    </div>
                    <div class="tesm_desig">
                        <h5>
                            <?php the_title(); ?>
                            <span><?php echo $dexpresstesti; ?></span>
                        </h5>
                    </div>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>    
	<?php
	return ob_get_clean();
}
//usages: [dexpress_success_story]
add_shortcode('dexpress_counter', 'dexpress_counter_shortcode');
function dexpress_counter_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'counter_icon'=> '',
        'counter_numeric'=> '',
        'counter_title'=> '',
        'counter_icon2'=> '',
        'counter_numeric2'=> '',
        'counter_title2'=> '',
        'counter_icon3'=> '',
        'counter_numeric3'=> '',
        'counter_title3'=> '',
        'counter_icon4'=> '',
        'counter_numeric4'=> '',
        'counter_title4'=> '',
    ),$atts));
	ob_start(); ?>
        <!-- ==================================================  
						Start CounterUp Area
		=================================================== -->
            <div class="col-md-10 col-md-offset-1">
                <div class="counter_list">
                    <ul>
                        <li class="single_count" data-aos="zoom-in" data-aos-duration="3000">
                            <div class="single_count_img">
                                <i class="fa fa-<?php echo $counter_icon; ?>"></i>
                            </div>
                            <div class="counter_count">
                                <span class="counter">
                                    <?php echo $counter_numeric; ?>
                                </span>
                                <span>+</span>
                                <p><?php echo $counter_title; ?></p>
                            </div>
                        </li>
                        <li class="single_count" data-aos="zoom-in" data-aos-duration="3000">
                            <div class="single_count_img">
                                <i class="fa fa-<?php echo $counter_icon2; ?>"></i>
                            </div>
                            <div class="counter_count">
                                <span class="counter">
                                    <?php echo $counter_numeric2; ?>
                                </span>
                                <span>+</span>
                                <p><?php echo $counter_title2; ?></p>
                            </div>
                        </li>
                        <li class="single_count" data-aos="zoom-in" data-aos-duration="3000">
                            <div class="single_count_img">
                                <i class="fa fa-<?php echo $counter_icon3; ?>"></i>
                            </div>
                            <div class="counter_count">
                                <span class="counter">
                                    <?php echo $counter_numeric3; ?>
                                </span>
                                <span class="degree"><i class="fa fa-circle" aria-hidden="true"></i>
</span>
                                <p><?php echo $counter_title3; ?></p>
                            </div>
                        </li>
                        <li class="single_count" data-aos="zoom-in" data-aos-duration="3000">
                            <div class="single_count_img">
                                <i class="fa fa-<?php echo $counter_icon4; ?>"></i>
                            </div>
                            <div class="counter_count">
                                <span class="counter">
                                    <?php echo $counter_numeric4; ?>
                                </span>
                                
                                <p><?php echo $counter_title4; ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
		<!-- ==================================================  
						End CounterUp Area
		=================================================== -->
	<?php
	return ob_get_clean();
}

//usages: [dexpress_post]
add_shortcode('dexpress_post', 'dexpress_post_shortcode');
function dexpress_post_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 3,
		'length'=> 20
		
	),$atts));
        global $dexpress_opt;
        ob_start();
            $bp_post = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page'=> $posts_per_page
            )); 
    
            while ( $bp_post->have_posts() ) : $bp_post->the_post(); ?>
            <!-- ==================================================  
                            Start Blog Area
            =================================================== -->
                <div class="col-sm-4 fix_p_l">
                    <div class="single_post_big">
                        <article class="single_post">
                            <div class="post_thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('dexpress-blog-img'); ?>
									<i class="fa fa-link" aria-hidden="true"></i>
								</a>
                            </div>
                            <div class="post_content">
                                <div class="post_meta">
                                    <ul>
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            <?php echo get_the_date(); ?></li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <?php echo get_the_author_link(); ?>
                                        </li>
                                        <li>
                                            <i class="fa fa-comments mrs"></i>
                                            <?php comments_popup_link( esc_html__('No Comment','dexpress'), esc_html__('1 Comment', 'dexpress'), esc_html__('% Comments','dexpress'), ' ', esc_html__('Comments off','dexpress')); ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post_title">
                                    <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' ); ?>
                                </div>
                                <div class="post_desc">
                                    <?php echo dexpress_excerpt_by_id(get_the_id(), $length); ?>
                                </div>
                                <div class="post_btn">
                                    <a class="care_bt" href="<?php echo esc_url( get_permalink()); ?>">
                                        <?php dexpress_blog_read_more(); ?>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                                <?php
                                    if ( is_sticky() ) {
                                    echo '<div class="sticky_post"><span>'.esc_html__('Featured', 'dexpress').'</span></div>';
                                } ?>
                            </div>
                        </article>
                    </div>
                </div>
            <!-- ==================================================  
                            End Blog Area
            =================================================== -->
            <?php endwhile; wp_reset_query(); ?>
	<?php
	return ob_get_clean();
}
//usages: [dexpress_post]
add_shortcode('dexpress_team', 'dexpress_dexpress_team_shortcode');
function dexpress_dexpress_team_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
		'length'=> 20,
		'dexpress_teamcat'=> ''
		
	),$atts));
        global $dexpress_opt;
        ob_start();
            $bp_post = new WP_Query( array( 
                'post_type' => 'dexpress-team', 
                'posts_per_page'=> $posts_per_page,
                'order'=>'ASC',
                'dexpress-teamcat'=> $dexpress_teamcat,
                
            )); 
    
            while ( $bp_post->have_posts() ) : $bp_post->the_post(); 
            $icon_linkname = get_post_meta( get_the_ID(), '_dexpress_team_social_icon', true );
            $teamdesignation = get_post_meta( get_the_ID(), '_dexpress_team_designation', true );
            ?>
            <!--==================================================  
                            Start Blog Area
            ===================================================-->
            <div class="col-md-2 col-sm-6 director_margin fix_p_l">
                <div class="single_team">
                    <div class="single_team_img">
                        <div class="single_team_img_overlay">
                            <?php the_post_thumbnail('dexpress-team-img'); ?>
                            <div class="single_team_social">
                                <ul>
                                <?php if( is_array($icon_linkname)){
                                    foreach($icon_linkname as $iconlink){ ?>
                                    <li>
                                        <a href="<?php echo $iconlink['_dexpress_socialicon_link']; ?>">
                                            <i class="fa fa-<?php echo $iconlink['_dexpress_socialicon_name']; ?>">
                                        </i>
                                        </a>
                                    </li>
                                    <?php  }
                                } ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_team_desig">
                        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                        <h5><?php echo $teamdesignation; ?></h5>
                    </div>
                </div>
            </div>
            <!-- ==================================================  
                            End Blog Area
            =================================================== -->
            <?php endwhile; wp_reset_query(); ?>
	<?php
	return ob_get_clean();
}

//usages: [dexpress_All Team]
add_shortcode('dexpress_allteam', 'dexpress_allteam_shortcode');
function dexpress_allteam_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> -1,
		'portfolio_page_link' => '',
	),$atts));
	ob_start(); ?>
        <!-- ======================================================
                    ==Start Portfolio==
        ====================================================== -->
        <div class="allteam_area row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="team_filter">
							<ul class="filter_list">
								<li class="filter active">
                                    <?php echo esc_html('All', 'dexpress'); ?>
                                </li>
                                <?php 
                                    $all_terms = get_terms('dexpress-teamcat', array(
                                    'hide_empty' => false
                                    ));
                                    if(is_array($all_terms)){
                                        foreach($all_terms as $single_term){
                                                echo '<li class="filter" data-filter=".'.$single_term->slug.'">
                                                <a>'.$single_term->name .'</a>
                                            </li>';
                                        }
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-md-12">
                        <div class="grid">
                            <?php
                                $allteam = null;
                                $allteam = new WP_Query( array( 
                                    'post_type' => 'dexpress-team', 
                                    'posts_per_page'=> $posts_per_page,
                                    'order'=>'ASC',
                                )); ?>
                                <?php $counter = 0;
                                while ( $allteam->have_posts() ) : $allteam->the_post();
                                $icon_linkname = get_post_meta( get_the_ID(), '_dexpress_team_social_icon', true );
                                $teamdesignation = get_post_meta( get_the_ID(), '_dexpress_team_designation', true );
                                $post_terms = get_the_terms(get_the_ID(), 'dexpress-teamcat');
                                $counter++;
                                $idd = get_the_ID();
                                ?>
                                <div class="alteam grid_item <?php if(is_array($post_terms)){foreach($post_terms as $post_term){echo $post_term->slug . ' '; }}?>">
                                    <div class="single_team">
                                        <div class="single_team_img">
                                            <div class="single_team_img_overlay">
                                                <?php the_post_thumbnail('dexpress-allteam-img'); ?>
                                                <div class="single_team_social">
                                                    <ul>
                                                    <?php if( is_array($icon_linkname)){
                                                        foreach($icon_linkname as $iconlink){ ?>
                                                        <li>
                                                            <a href="<?php echo $iconlink['_dexpress_socialicon_link']; ?>">
                                                                <i class="fa fa-<?php echo $iconlink['_dexpress_socialicon_name']; ?>">
                                                            </i>
                                                            </a>
                                                        </li>
                                                        <?php  }
                                                    } ?> 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_team_desig">
                                            <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                                            <h5><?php echo $teamdesignation; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata();
                                $allteam = null; ?>
                        </div>
            	    </div>
            	</div>
			</div>
		</div>
        <!-- ======================================================
                    ==End Portfolio==
        ====================================================== -->
	<?php
	return ob_get_clean();
}

// Partner Logo
// usages: [ourpartner]
add_shortcode('ourpartner', 'dexpress_partner_shortcode');
function dexpress_partner_shortcode($atts, $content=null){
	global $dexpress_opt;
	extract(shortcode_atts(array(
		
	),$atts));
	
	ob_start(); ?>
        <?php if(isset($dexpress_opt['partner_logos'])){ ?>
        <div class="branding_slider owl-carousel">
<?php foreach($dexpress_opt['partner_logos'] as $partner) {
                if(is_ssl()){
                    $partner['image'] = str_replace('http:', 'https:', $partner['image']);
                } ?>
    <div class="single_brand_item">
        <img src="<?php echo $partner['image']; ?>" alt="<?php echo $partner['title'] ?>" />
    </div>
    <?php } ?>
        </div>
	
	<?php }
	return ob_get_clean();
}

// Add term page
function pippin_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[custom_term_meta]"><?php _e( 'Example meta field', 'pippin' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
<?php
}
add_action( 'service_category_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );

//usages: [dexpress]
add_shortcode('dexpress_tab', 'dexpress_tab_shortcode');
function dexpress_tab_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> 1,
	),$atts));
	
	ob_start(); ?>
       <!-- ==================================================  
						Start Service Area
		=================================================== -->
        <div class="col-md-12">
            <ul class="tabmenu">
                <?php 
                    $all_terms = get_terms('service_category', array(
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
            <div class="tab-content">
                <?php 
                    $x= 0;
                    $all_terms = get_terms('service_category', array(
                    'hide_empty' => false
                    ));
                    foreach($all_terms as $single_term){ ?>
                        <div role="tabpanel" class="tab-pane <?php echo $x==0 ? 'active': null; ?> fade in" id="<?php echo $single_term->slug; ?>">
                            <?php 
                                $dexpress_tab = null;
                                $dexpress_tab = new WP_Query(array(
                                    'post_type' => 'dexpress-service',
                                    'posts_per_page'=> $posts_per_page,
                                    'service_category'=>$single_term->slug
                                ));
                                if( $dexpress_tab->have_posts() ){
                                    while( $dexpress_tab->have_posts() ){
                                        $dexpress_tab->the_post(); 
                                        ?>
                                        <div class="tab-pane fade in secondRow" id="creative">
                                            <div class="single_tab_service">
                                                <div class="single_tab_service_left">
                                                    <?php the_post_thumbnail(''); ?>
                                                </div>
                                                <div class="single_tab_service_right">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
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
        </div>
		<!-- ==================================================  
						End Service Area
		=================================================== -->
    <?php
	return ob_get_clean();
}


//usages: [welcome_about_area]
add_shortcode('dexpress_welcome_about_area', 'dexpress_welcome_about_area_shortcode');
function dexpress_welcome_about_area_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        'image'=> '',
        'about_title'=> '',
        'about_des'=> '',
		'about_des2'=> '',
    ), $atts));
    $imgadd = wp_get_attachment_image_src($image, 'full');
	$image = $imgadd[0];
	ob_start(); ?>
        <!-- ==================================================  
						Start welcome about Area
		=================================================== -->
		<div class="row">
            <div class="welcome_about_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="welcome_about_img">
                                <img src="<?php echo $image; ?>" alt="img">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="welcome_about_desc">
								<div class="title_icon">
									<i class="fa fa-align-center" aria-hidden="true"></i>
								</div>
                                <div class="section_title">
                                    <h2><?php echo $about_title; ?></h2>
                                </div>
                                <div class="about_new_desc">
                                    <?php echo $about_des; ?>
                                </div>
                            </div>
                        </div>
						<div class="col-md-12 col-sm-12">
                            <div class="welcome_about_desc2">
                                <div class="about_new_desc">
                                    <?php echo $about_des2; ?>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
            </div>
			
		</div>
		
		
		
		<!-- ==================================================  
						End welcome about Area
		=================================================== -->   
	<?php
	return ob_get_clean();
}
//usages: [dexpress_about_new_plan]
add_shortcode('dexpress_about_new_plan', 'dexpress_about_new_plan_shortcode');
function dexpress_about_new_plan_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
        's_story_year'=> '',
        's_story_title'=> '',
        's_story_des'=> '',
        's_story_year2'=> '',
        's_story_title2'=> '',
        's_story_des2'=> '',
        's_story_year3'=> '',
        's_story_title3'=> '',
        's_story_des3'=> '',
        's_story_year4'=> '',
        's_story_title4'=> '',
        's_story_des4'=> '',
    ), $atts));
    $imgadd = wp_get_attachment_image_src($image, 'full');
	$image = $imgadd[0];
	ob_start(); ?>
        <!-- ==================================================  
						Start Success Story Area
		=================================================== -->
            <div class="col-md-12 col-sm-12">
                <div class="about_success_story">
                    <div class="success_story_list">
                        <ul>
                            <li data-aos="fade-right" data-aos-duration="3000">
                               <div class="s_story_img">
                                    <div class="s_story_img_bg">
                                        <i class="fa fa-<?php echo $s_story_year; ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="s_story_content">
                                    <h4><?php echo $s_story_title; ?></h4>
                                    <p><?php echo $s_story_des; ?></p>
                                </div>
                            </li>
                            <li data-aos="fade-right" data-aos-duration="3000">
                               <div class="s_story_img">
                                    <div class="s_story_img_bg">
                                        <i class="fa fa-<?php echo $s_story_year2; ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="s_story_content">
                                    <h4><?php echo $s_story_title2; ?></h4>
                                    <p><?php echo $s_story_des2; ?></p>
                                </div>
                            </li>
                            <li data-aos="fade-right" data-aos-duration="3000">
                               <div class="s_story_img">
                                    <div class="s_story_img_bg">
                                        <i class="fa fa-dot-<?php echo $s_story_year3; ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="s_story_content">
                                    <h4><?php echo $s_story_title3; ?></h4>
                                    <p><?php echo $s_story_des3; ?></p>
                                </div>
                            </li>
                            <li data-aos="fade-right" data-aos-duration="3000">
                               <div class="s_story_img">
                                    <div class="s_story_img_bg">
                                        <i class="fa fa-<?php echo $s_story_year4; ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="s_story_content">
                                    <h4><?php echo $s_story_title4; ?></h4>
                                    <p><?php echo $s_story_des4; ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
		<!-- ==================================================  
						End Success Story Area
		=================================================== -->
	<?php
	return ob_get_clean();
}
// Google map
// usages: [dexpress_googlemap]
add_shortcode('dexpress_googlemap', 'dexpress_google_map');
function dexpress_google_map($atts, $content=null){
    global $dexpress_opt;
	extract(shortcode_atts(array(
        'image'=> '',
        'from_title'=> '',
        'adress_title'=> '',
        'address_line'=> '',
        'address_line2'=> '',
        'phone_no'=> '',
        'phone_no2'=> '',
        'phone_no3'=> '',
        'mail'=> '',
        'mail_text'=> '',
    ),$atts));
	global $dexpress_opt;
    $imgadd = wp_get_attachment_image_src($image, 'full');
	$image = $imgadd[0]; 
	ob_start(); ?>
    <!-- ==================================================
					==Start contact map area==
		=================================================== -->
		<div class="map-area">
			<div class="map-container">
			    <div class="row">
                    <div class="col-lg-offset-0 col-lg-8 col-md-offset-0 col-md-7 col-sm-offset-1 col-sm-10">
                        <div class="main_contact_form_area">
                            <div class="contact_heading">
                                <h3><?php echo $from_title; ?></h3>
                            </div>
                            <div class="main_contact_form" style="background-image:url('<?php echo $image; ?>')">
                                <?php echo do_shortcode($dexpress_opt['contact_form']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-5 col-sm-offset-3 col-sm-6">
                        <div class="contact_info_area">
                            <div class="contact_heading">
                                <h3><?php echo $adress_title; ?></h3>
                            </div>
                            <div class="contact_info">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-location-arrow"></i>
                                            <p>
                                                <?php echo $address_line; ?>
                                                <span><?php echo $address_line2; ?></span>
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-phone"></i>
                                            <p>
                                                <?php echo $phone_no; ?> 
                                                <span><?php echo $phone_no2; ?></span>
                                                <span><?php echo $phone_no3; ?></span>
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-envelope"></i>
                                            <p>
                                                <?php echo $mail; ?> 
                                                <span><?php echo $mail_text; ?> </span>
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			
		</div>
		<!-- =======================================
					==Start contact map area==
		======================================= -->
	<?php
	return ob_get_clean();
}

//Shortcodes for Visual Composer
add_action( 'vc_before_init', 'dexpress_vc_shortcodes' );
function dexpress_vc_shortcodes() {
    vc_map( array(
		"name" => esc_html__( "dexpress Section Title", "dexpress" ),
		"base" => "dexpress_section_title",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Section Title", "dexpress" ),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Section Sub Title", "dexpress" ),
				"param_name" => "title_paragraph",
			),
		)
	) );
	vc_map( array(
    "name" => esc_html__( "dexpress Service Title", "dexpress" ),
    "base" => "dexpress_service_title",
    "class" => "",
    "category" => esc_html__( "dexpress Themes", "dexpress"),
    "params" => array(
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__( "Section Title", "dexpress" ),
        "param_name" => "title",
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__( "Section Title", "dexpress" ),
        "param_name" => "title2",
      ),
      array(
        "type" => "textarea",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__( "Section Sub Title", "dexpress" ),
        "param_name" => "title_paragraph",
      ),
    )
  ) );
    vc_map( array(
		"name" => esc_html__( "dexpress Service", "dexpress" ),
		"base" => "dexpress_service",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			),
		)
	) );
	vc_map( array(
        "name" => esc_html__( "dexpress Service Sister", "dexpress" ),
        "base" => "dexpress_service_sis",
        "class" => "",
        "category" => esc_html__( "dexpress Themes", "dexpress"),
        "params" => array(
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Post Per Page", "dexpress" ),
            "param_name" => "posts_per_page",
          ),
        )
    ) );
    vc_map( array(
		"name" => esc_html__( "dexpress Service Page", "dexpress" ),
		"base" => "dexpress_service_page",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			)
		)
	) );
    //dexpress Subscribe
	vc_map( array(
		"name" => esc_html__( "dexpress Subscribe", "dexpress" ),
		"base" => "dexpress_subscribe",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Subscribe title", "dexpress" ),
				"param_name" => "subscribe_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Subscribe detail", "dexpress" ),
				"param_name" => "subscribe_detail",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Subscribe btn link", "dexpress" ),
				"param_name" => "subscribebtn_link",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Subscribe btn text", "dexpress" ),
				"param_name" => "subscribebtn_text",
			),
		)
	) );
    
    vc_map( array(
		"name" => esc_html__( "dexpress Portfolio", "dexpress" ),
		"base" => "dexpress_portfolio",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Portfolio Post Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			),
		)
	) );
    
    vc_map( array(
		"name" => esc_html__( "Dexpress Portfolio Style Two", "dexpress" ),
		"base" => "dexpress_portfolio_2",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
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
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "Dexpress Portfolio Page", "dexpress" ),
		"base" => "dexpress_portfolio_page",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Portfolio Post Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Portfolio Category", "dexpress" ),
				"param_name" => "work_category",
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "dexpress Success Story", "dexpress" ),
		"base" => "dexpress_success_story",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Title", "dexpress" ),
				"param_name" => "story1_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Description", "dexpress" ),
				"param_name" => "story1_des",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 1", "dexpress" ),
				"param_name" => "movie_img1",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Day1", "dexpress" ),
				"param_name" => "day1",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Month1", "dexpress" ),
				"param_name" => "month1",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Year1", "dexpress" ),
				"param_name" => "year1",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Title", "dexpress" ),
				"param_name" => "story2_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Description", "dexpress" ),
				"param_name" => "story2_des",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 2", "dexpress" ),
				"param_name" => "movie_img2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Day2", "dexpress" ),
				"param_name" => "day2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Month2", "dexpress" ),
				"param_name" => "month2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Year2", "dexpress" ),
				"param_name" => "year2",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Title", "dexpress" ),
				"param_name" => "story3_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Description", "dexpress" ),
				"param_name" => "story3_des",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 3", "dexpress" ),
				"param_name" => "movie_img3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Day3", "dexpress" ),
				"param_name" => "day3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Month3", "dexpress" ),
				"param_name" => "month3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 1", "dexpress" ),
				"param_name" => "year3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Title", "dexpress" ),
				"param_name" => "story4_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Description", "dexpress" ),
				"param_name" => "story4_des",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 4", "dexpress" ),
				"param_name" => "movie_img4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Day4", "dexpress" ),
				"param_name" => "day4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Month4", "dexpress" ),
				"param_name" => "month4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Year4", "dexpress" ),
				"param_name" => "year4",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Title", "dexpress" ),
				"param_name" => "story5_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Success Story Description", "dexpress" ),
				"param_name" => "story5_des",
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Projonmo Movie Name 5", "dexpress" ),
				"param_name" => "movie_img5",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Day5", "dexpress" ),
				"param_name" => "day5",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates month5", "dexpress" ),
				"param_name" => "month5",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Release Dates Year5", "dexpress" ),
				"param_name" => "year5",
			),
			
			
		)
	) );
    
    vc_map( array(
		"name" => esc_html__( "dexpress Counter Area", "dexpress" ),
		"base" => "dexpress_counter",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Icon", "dexpress" ),
				"param_name" => "counter_icon",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter", "dexpress" ),
				"param_name" => "counter_numeric",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Title", "dexpress" ),
				"param_name" => "counter_title",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Icon-2", "dexpress" ),
				"param_name" => "counter_icon2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter-2", "dexpress" ),
				"param_name" => "counter_numeric2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Title-2", "dexpress" ),
				"param_name" => "counter_title2",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Icon-3", "dexpress" ),
				"param_name" => "counter_icon3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter-3", "dexpress" ),
				"param_name" => "counter_numeric3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Title-3", "dexpress" ),
				"param_name" => "counter_title3",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Icon-4", "dexpress" ),
				"param_name" => "counter_icon4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter-4", "dexpress" ),
				"param_name" => "counter_numeric4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress Counter Title-4", "dexpress" ),
				"param_name" => "counter_title4",
			),
		)
	) );
    vc_map( array(
		"name" => esc_html__( "dexpress Testimonila", "dexpress" ),
		"base" => "dexpresstestimonial",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Testimonial Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			),
		)
	) );
    //Blog Post
	vc_map( array(
		"name" => esc_html__( "dexpress Blog Post ", "dexpress" ),
		"base" => "dexpress_post",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Count of Blog Post", "dexpress" ),
				"param_name" => "posts_per_page",
                "value" => esc_html__( "3", "dexpress" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Length", "dexpress" ),
				"param_name" => "length",
				"value" => esc_html__( "20", "dexpress" ),
			)
		)
	) );
    //Team Member
	vc_map( array(
		"name" => esc_html__( "dexpress Team Member ", "dexpress" ),
		"base" => "dexpress_team",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Team Member", "dexpress" ),
				"param_name" => "posts_per_page",
                "value" => esc_html__( "-1", "dexpress" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Length", "dexpress" ),
				"param_name" => "length",
				"value" => esc_html__( "20", "dexpress" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Testmonial Category", "dexpress" ),
				"param_name" => "dexpress_teamcat",
			)
		)
	) );
    //Team Member
	vc_map( array(
		"name" => esc_html__( "Dexpress All Team Member", "dexpress" ),
		"base" => "dexpress_allteam",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Team ALL Member", "dexpress" ),
				"param_name" => "posts_per_page",
                "value" => esc_html__( "-1", "dexpress" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Length", "dexpress" ),
				"param_name" => "length",
				"value" => esc_html__( "20", "dexpress" ),
			),
		)
	) );
    
    //partner logos
	vc_map( array(
		"name" => esc_html__( "Partner Logos", "dexpress" ),
		"base" => "ourpartner",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Title", "dexpress" ),
				"param_name" => "title",
				"description" => esc_html__( "Enter Title.", "dexpress" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Subtitle", "dexpress" ),
				"param_name" => "contact_number",
				"description" => esc_html__( "Enter Subtitle Here.", "dexpress" )
			),		
		)
	) );
    // dexpress Tab
    vc_map( array(
		"name" => esc_html__( "dexpress Tab", "dexpress" ),
		"base" => "dexpress_tab",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Post Per Page", "dexpress" ),
				"param_name" => "posts_per_page",
			),
		)
	) );
    
    
    vc_map( array(
		"name" => esc_html__( "dexpress About Us", "dexpress" ),
		"base" => "dexpress_welcome_about_area",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
            array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About Welcome Image", "dexpress" ),
				"param_name" => "image",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About Welcome Title", "dexpress" ),
				"param_name" => "about_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About Welcome Description", "dexpress" ),
				"param_name" => "about_des",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Welcome Description Two", "dexpress" ),
				"param_name" => "about_des2",
			),
		)
	) );
    
    vc_map( array(
		"name" => esc_html__( "dexpress About New Plan", "dexpress" ),
		"base" => "dexpress_about_new_plan",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About history Area Title", "dexpress" ),
				"param_name" => "history_area_title",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Year", "dexpress" ),
				"param_name" => "s_story_year",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Title", "dexpress" ),
				"param_name" => "s_story_title",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Description", "dexpress" ),
				"param_name" => "s_story_des",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Year2", "dexpress" ),
				"param_name" => "s_story_year2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Title2", "dexpress" ),
				"param_name" => "s_story_title2",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Description2", "dexpress" ),
				"param_name" => "s_story_des2",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Year3", "dexpress" ),
				"param_name" => "s_story_year3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Title3", "dexpress" ),
				"param_name" => "s_story_title3",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Description3", "dexpress" ),
				"param_name" => "s_story_des3",
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Year4", "dexpress" ),
				"param_name" => "s_story_year4",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Title4", "dexpress" ),
				"param_name" => "s_story_title4",
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "dexpress About New Plan Description4", "dexpress" ),
				"param_name" => "s_story_des4",
			),
			
		)
	) );
     //Google Map
	vc_map( array(
		"name" => esc_html__( "dexpress Google Map ", "dexpress" ),
		"base" => "dexpress_googlemap",
		"class" => "",
		"category" => esc_html__( "dexpress Themes", "dexpress"),
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( " Form Bancground Image", "dexpress" ),
				"param_name" => "image",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( " Form Title", "dexpress" ),
				"param_name" => "from_title",
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( " Contact Form", "dexpress" ),
				"param_name" => "contact_from",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Address Title", "dexpress" ),
				"param_name" => "adress_title",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Address Line", "dexpress" ),
				"param_name" => "address_line",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Address Line-2", "dexpress" ),
				"param_name" => "address_line2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Contact Phone N0", "dexpress" ),
				"param_name" => "phone_no",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Phone No2", "dexpress" ),
				"param_name" => "phone_no2",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Phone No3", "dexpress" ),
				"param_name" => "phone_no3",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Contact Mail", "dexpress" ),
				"param_name" => "mail",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Contact Mail-2", "dexpress" ),
				"param_name" => "mail_text",
			)
		)
	) );
}
/* Blog sharing */
function dexpress_blog_sharing() {
	global $post, $dexpress_opt;	
	$share_url = get_permalink( $post->ID );
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$shearpostimg = $large_image_url[0];
	$posttitle = get_the_title( $post->ID );
	?>
		<ul class="post_share">
			<li>
                <a class="facebook social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.$share_url); ?>'); return false;" title="Facebook" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
			</li>
			<li>
                <a class="twitter social-icon" href="#" title="Twitter" onclick="javascript: window.open('<?php echo esc_url('https://twitter.com/home?status='.$posttitle.'&nbsp;'.$share_url); ?>'); return false;" target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
			</li>
			<li>
                <a class="pinterest social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://pinterest.com/pin/create/button/?url='.$share_url.'&amp;media='.$shearpostimg.'&amp;description='.$posttitle); ?>'); return false;" title="Pinterest" target="_blank">
                    <i class="fa fa-linkedin"></i>
                </a>
			</li>
			<li>
			    <a class="gplus social-icon" href="#" onclick="javascript: window.open('<?php echo esc_url('https://plus.google.com/share?url='.$share_url); ?>'); return false;" title="Google +" target="_blank">
			        <i class="fa fa-skype"></i>
			    </a>
            </li>
		</ul>
	<?php
}
