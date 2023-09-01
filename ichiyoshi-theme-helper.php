<?php
/**
 * Plugin Name: ichiyoshi Helper Plugin
 * Plugin URI: #
 * Description: ichiyoshi - Helper Plugin
 * Version: 1.0.0
 * Author: 
 * Author URI: 
 * Text Domain: ichiyoshi
 * License: GPL/GNU.

*/

//define
require_once dirname(__FILE__)."/ichiyoshi-shortcode.php";


function ichiyoshi_custom_tittle($tittle){
    $tittle = 'Hello Title'. $tittle;
    return $tittle;
}

/**----------------------------------------------------------------*/
/*    // ichiyoshi all shortcodes
/*-----------------------------------------------------------------*/  
// Section Title
// [ichiyoshi_stitle title='' subtitle2='' subtitle3='']
add_shortcode('ichiyoshi_stitle', 'ichiyoshi_section_title_shortcode');
function ichiyoshi_section_title_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title' => '',
		'subtitle2' => '',
    'subtitle3' => '',
	), $atts ) );
	
	ob_start(); ?>
        
          <article class="course">
              <?php if(!empty($title)){ ?>
                <h2><?php echo $title;?></h2>
              <?php } ?>
              <?php if(!empty($subtitle2)){ ?>
                <p><?php echo $subtitle2;?></p>
              <?php } ?>
              <?php if(!empty($subtitle3)){ ?>
                <p><?php echo $subtitle3;?></p>
              <?php } ?>
          </article>
        
        
        
	<?php
	return ob_get_clean();
}
// Section Title [ichiyoshi_history history1="" history3="" history3=""]

// [ichiyoshi_section_title title='Hello Worl' title_paragraph='Onel Text']
add_shortcode('ichiyoshi_history', 'ichiyoshi_history_shortcode');
function ichiyoshi_history_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'history1' => '',
		'history2' => '',
    'history3' => '',
	), $atts ) );
	
	ob_start(); ?>
  <article class="history">
      <div class="inner">
        <?php if(!empty($history1)){ ?>
          <p class="mb_30"><?php echo $history1; ?></p>
        <?php } ?>
        <?php if(!empty($history2)){ ?>
          <p><?php echo $history2; ?></p>
        <?php } ?>
        <?php if(!empty($history3)){ ?>
          <p><?php echo $history3; ?></p>
        <?php } ?>
      </div>
  </article>
        
	<?php
	return ob_get_clean();
}

// [ichiyoshi_contact_info contact_title='' telephone='' ct_des='' ct_des2='']
add_shortcode('ichiyoshi_contact_info', 'ichiyoshi_contact_info_shortcode');
function ichiyoshi_contact_info_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'contact_title' => '',
		'telephone' => '',
    'ct_des' => '',
    'ct_des2' => '',
	), $atts ) );
	
	ob_start(); ?>
  <div class="bg_info">
          <div class="bg_info_text">
            <?php if(!empty($contact_title)){ ?>
              <h3 class="contact-title"><?php echo $contact_title; ?></h3>
            <?php } ?>
              
                <div class="tel_nummber">
                  <img src="<?php echo get_template_directory_uri(). '/images/tel_icon.svg' ?>" alt="">
                  <?php if(!empty($telephone)){ ?>
                    <a href="tel:03-6272-5980"><?php echo $telephone; ?></a>
                  <?php } ?>
                </div>
                <?php if(!empty($ct_des)){ ?>
                  <p><?php echo $ct_des; ?></p>
                <?php } ?>
                <?php if(!empty($ct_des2)){ ?>
                  <p><?php echo $ct_des2; ?></p>
                <?php } ?>
              
              
          </div>
		</div>
  
        
	<?php
	return ob_get_clean();
}

// [ichiyoshi_btns btn_url='']
add_shortcode('ichiyoshi_btns', 'ichiyoshi_btns_shortcode');
function ichiyoshi_btns_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'btn_url' => '',
		
	), $atts ) );
	
	ob_start(); ?>
  <div class="br_warp">
      <ul>
          <li>
            
            <a href="<?php echo home_url("/") ?>">
              <img src="<?php echo get_template_directory_uri(). '/images/br_shop.webp' ?>" alt="一嘉セレクトSHOP">
            </a>
          </li>
          <?php if(!empty($btn_url)){ ?>
            <li>
              <a href="<?php echo $btn_url; ?>">
                <img src="<?php echo get_template_directory_uri(). '/images/br_news.webp' ?>" alt="会員専用ページ">
              </a>
            </li>
          <?php } ?>
      </ul>
  </div> 
	<?php
	return ob_get_clean();
}

// Drink Section [menuitemtop id=12 amounttext='' description='' amounttext2='' description2='']
function ichiyoshi_menu_item_top($arguments){
  $default =array(
    'id'  => '',
    'amounttext' => '',
    'description' => '',
    'amounttext2' => '',
    'description2' => '',
    
  );
  $attributes = shortcode_atts($default, $arguments);
  $image_src = wp_get_attachment_image_src($attributes['id']);
  $shortcode_output = <<<EOD
    <div class="menu_article top_item">
      <h3 class="gold">
        <img src="{$image_src[0]}" alt="title Img">
        {$attributes['amounttext']}
        </h3>
      <p>{$attributes['description']}</p>
    </div>
    <div class="menu_article top_item">
      <h3 class="gold">
        <img src="{$image_src[0]}" alt="title Img">
        {$attributes['amounttext2']}
      </h3>
      <p>{$attributes['description2']}</p>
    </div>
  EOD;
  return $shortcode_output;
}
add_shortcode('menuitemtop', 'ichiyoshi_menu_item_top');


//usages: use DESC, ASC [ichiyoshi_menu posts_per_page=1 order='DESC']
add_shortcode('ichiyoshi_menu', 'ichiyoshi_menu_shortcode');
function ichiyoshi_menu_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> '',
    'order' => '',
	),$atts));
	
	ob_start(); ?>
        <?php 
    $ichiyoshimenu = new WP_Query( array( 
        'post_type' => 'menucourse', 
        'posts_per_page'=> $posts_per_page,
        'order' => $order,
    )); ?>
    
    <?php
      while ( $ichiyoshimenu->have_posts() ) : $ichiyoshimenu->the_post(); 
      $subtile = get_post_meta( get_the_ID(), '_ichiyoshi_titlehead',true );
      ?>
          <div class="menu_article">
                <?php the_title( '<h3 class="gold"><a href="'.esc_url(get_permalink() ) . '">', '</a></h3>') ?>
                  
                <span><?php echo $subtile; ?></span>
                <?php the_excerpt();?>
          </div>
                    
      <?php endwhile; 
      wp_reset_query(); ?> 
              
          
	<?php
	return ob_get_clean();
}
// Use: [arakaruto id=119 caption="alttext" para1="お漬物盛り合わせ　　1,000円〜" para2="乾きもの盛り合わせ　1,000円〜" para3="酒肴（おつまみ）盛り合わせ　1,500円〜" para4="とらふぐの唐揚げ　1,500円〜(1人前)" para5="その他メニューは事前のご予約にてご対応させて頂きます。"]
function arakaruto_menu($arguments){
  $default =array(
    'id'  => '',
    'caption' => '',
    'para1'    => '',
    'para2'    => '',
    'para3'    => '',
    'para4'    => '',
    'para5'    => ''
  );
  $attributes = shortcode_atts($default, $arguments);
  $image_src = wp_get_attachment_image_src($attributes['id'],$attributes['caption']);
  $shortcode_output = <<<EOD
  <div class="arakaruto">
    <div class="inner">
      <div class="ttl">
        <img src="{$image_src[0]}" alt="{$attributes['caption']}">
      </div>
      <article class="arakaruto_menu">
        <p>{$attributes['para1']}</p>
        <p>{$attributes['para2']}</p>
        <p>{$attributes['para3']}</p>
        <p>{$attributes['para4']}</p>
        <p>{$attributes['para5']}</p>
      </article>
    </div>
  </div>

  
  EOD;
  return $shortcode_output;
}
add_shortcode('arakaruto', 'arakaruto_menu');

// Menu Page button
// Drink Section [menubtnlink url=12 title='お飲み物の詳細はこちら']
function menupagebtn_drink_section($arguments){
  $default =array(
    'btnurl'  => '',
    'title' => '',
    
  );
  $attributes = shortcode_atts($default, $arguments);
  $shortcode_output = <<<EOD
  <a href="{$attributes['btnurl']}" class="btn_01">{$attributes['title']}</a>
  EOD;
  return $shortcode_output;
}
add_shortcode('menubtnlink', 'menupagebtn_drink_section');


// Drink Section [drink_title id=12 caption='' title='']
function ichiyoshi_drink_section($arguments){
  $default =array(
    'id'  => '',
    'caption' => '',
    'title' => '',
    
  );
  $attributes = shortcode_atts($default, $arguments);
  $image_src = wp_get_attachment_image_src($attributes['id'],$attributes['caption']);
  $shortcode_output = <<<EOD
  <section class="drink_course">
    <h3>
      <img src="{$image_src[0]}" alt="{$attributes['caption']}">
    </h3>
    <p>{$attributes['title']}</p>
  </section>
  EOD;
  return $shortcode_output;
}
add_shortcode('drink_title', 'ichiyoshi_drink_section');

//usages: use DESC, ASC [ichiyoshi_drinkmenu posts_per_page=1 order='DESC']

function ichiyoshi_drinkmenu_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> '',
    'order' => '',
    'terms' => ''
	),$atts));
	
	ob_start(); ?>
        <?php 
    $ichiyoshidrink = new WP_Query( array( 
        'post_type' => 'ichiyoshi_drink', 
        'posts_per_page'=> $posts_per_page,
        'order' => $order,
        'tax_query'   => array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'drinkcat',
              'field'     => 'slug',
              'terms'   => $terms
            ),
        )
    )); ?>
    
    <?php
      while ( $ichiyoshidrink->have_posts() ) : $ichiyoshidrink->the_post(); ?>
        <div class="drink-course-item">
          <?php the_title( '<h3 class="drink-item"><a href="'.esc_url(get_permalink() ) . '">', '</a></h3>') ?>
          <?php the_excerpt();?>
        </div>
                    
      <?php endwhile; 
      wp_reset_query(); ?> 
              
          
	<?php
	return ob_get_clean();
}
add_shortcode('ichiyoshi_drinkmenu', 'ichiyoshi_drinkmenu_shortcode');
// [ichiyoshi_drinkfree title='当店は、お酒のお持ち込み自由です。' subtitle='会社に届いた銘酒、ご自宅に眠る美酒、とっておきの限定酒等、ご自由にお持ち込みください。']

function ichiyoshi_drinkfree_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title' => '',
		'subtitle' => '',
    
	), $atts ) );
	
	ob_start(); ?>
        <div class="drinkfree">
        <?php if(!empty($title)){ ?>
                <h4><?php echo $title;?></h4>
              <?php } ?>
              <?php if(!empty($subtitle)){ ?>
                <p><?php echo $subtitle;?></p>
              <?php } ?>
        </div>
	<?php
	return ob_get_clean();
}
add_shortcode('ichiyoshi_drinkfree', 'ichiyoshi_drinkfree_shortcode');
// Start Store Info [ichiyoshi_storeinfo title1='' title2='' title3='' title4='' title5='' title6='' des1='' des2='' des3='' des4='' des5='' des6='']
function ichiyoshi_store_info($arguments){
  $default =array(
    'title1'  => '',
    'title2'  => '',
    'title3'  => '',
    'title4'  => '',
    'title5'  => '',
    'title6'  => '',
    'des1'    => '',
    'des2'    => '',
    'des3'    => '',
    'des4'    => '',
    'des5'    => '',
    
  );
  $attributes = shortcode_atts($default, $arguments);
  $shortcode_output = <<<EOD
  <div class="store_info">
      <h2>{$attributes['title1']}</h2>
      <table class="info-table">
        <tbody><tr>
          <th>{$attributes['title2']}</th>
          <td>{$attributes['des1']}</td>
        </tr>
        <tr>
          <th>{$attributes['title3']}</th>
          <td>{$attributes['des2']}</td>
        </tr>
        <tr>
          <th>{$attributes['title4']}</th>
          <td>{$attributes['des3']}</td>
        </tr>
        <tr>
          <th>{$attributes['title5']}</th>
          <td>{$attributes['des4']}</td>
        </tr>
        <tr>
          <th>{$attributes['title6']}</th>
          <td>{$attributes['des5']}</td>
        </tr>
      </tbody></table>

    </div>

  
  EOD;
  return $shortcode_output;
}
add_shortcode('ichiyoshi_storeinfo', 'ichiyoshi_store_info');
//End Store Info

//usages: use DESC, ASC [ichiyoshi_storeitem posts_per_page=-1 order='DESC']
function ichiyoshi_store_item_shortcode($atts, $content=null){
	extract(shortcode_atts(array(
		'posts_per_page'=> '',
    'order' => '',
    
	),$atts));
	
	ob_start(); ?>
        <?php 
    $ichiyoshidrink = new WP_Query( array( 
        'post_type' => 'ichiyoshi_store', 
        'posts_per_page'=> $posts_per_page,
        'order' => $order,
        
    )); ?>
    <div class="covid_area">
      <div class="inner">
      <h3>当店は安心・安全な店として 基本的な感染対策に加え徹底した感染対策を導入しております。</h3>
        <ul class="cov-ul">
            <?php
              while ( $ichiyoshidrink->have_posts() ) : $ichiyoshidrink->the_post(); ?>
                <li>
                    <div class="ttl">
                      <img src="<?php echo get_template_directory_uri().'/images/hana_icon.svg' ?>" alt="Store">　
                      <?php the_title( '<h3 class="drink-item"><a href="'.esc_url(get_permalink() ) . '">', '</a></h3>') ?>
                    </div>
                    <?php the_excerpt();?>
                  </li>
                
                            
              <?php endwhile; 
              wp_reset_query(); ?> 
          </ul>
       </div>       
    </div>      
	<?php
	return ob_get_clean();
}
add_shortcode('ichiyoshi_storeitem', 'ichiyoshi_store_item_shortcode');
// Start Rental Add
// Start Store Info [ichiyoshi_rentaladd id='' caption='' title1='' tititleDes='' des1='' des2='' des3='' des4='']
function ichiyoshi_rental_add($arguments){
  $default =array(
    'title1'  => '',
    'titledes'  => '',
    'id'  => '',
    'caption' => '',
    'des1'    => '',
    'des2'    => '',
    'des3'    => '',
    'des4'    => '',
  );
  $attributes = shortcode_atts($default, $arguments);
  $image_src = wp_get_attachment_image_src($attributes['id'],$attributes['caption']);
  $shortcode_output = <<<EOD
    <div class="rental_warp">
      <div class="rental_add">
        <h2>{$attributes['title1']}</h2>
        <p>{$attributes['titledes']}</p>
        <ul>
          <li>{$attributes['des1']}</li>
          <li>{$attributes['des2']}</li>
          <li>{$attributes['des3']}</li>
          <li>{$attributes['des4']}</li>
        </ul>
      </div>
      
      <div class="rental_img">
      <img src="{$image_src[0]}" alt="{$attributes['caption']}">
      </div>
    </div>
  

  
  EOD;
  return $shortcode_output;
}
add_shortcode('ichiyoshi_rentaladd', 'ichiyoshi_rental_add');
// Rental Tabel Start
// Start Store Info 
//[ichiyoshi_rntbtl title1='詳しくはお問い合わせください。' tbhead1='会場費' 
// tbhead2='映像撮影・編集' tbhead3='映像制作（ライブ配信対応）' 
//tbhead4='フリードリンク' tbhead5='ゴミ捨て' 
//tbhead6='片付け＆ゴミ捨てパック' tbcontent1='1時間 / 10,000円〜 テーブル・椅子・調理器具・店内有線・Wi-FI使用料込' 
//tbcontent2='別料金' 
//tbcontent3='別料金' 
//tbcontent4='●14,000円 瓶ビール20本又は缶ビール350ml 24缶、焼酎芋2本、麦1本、炭酸水10本、 烏龍茶2Lペットボトル1本、緑茶2Lペットボトル1本 
//●40,000円 瓶ビール20本又は缶ビール350ml 140缶、焼酎芋2本、麦2本、 烏龍茶2Lペットボトル2本、緑茶2Lペットボトル2本 ※冷蔵庫、製氷器、グラス使用料込 ※持ち込みOK' 
//tbcontent5='2,000円（生ごみ・缶・瓶含む） 食器類をすべて洗浄後、ごみをおまとめいただいた場合の料金です。' 
//tbcontent6='そのままお帰りいただいてOKです。<br>10名様まで/5,000円<br>11名〜15名/8,000円<br>16名以上/10,000円']
//
//
function ichiyoshi_rental_table($arguments){
  $default =array(
    'title1'      => '',
    'tbhead1'     => '',
    'tbhead2'     => '',
    'tbhead3'     => '',
    'tbhead4'     => '',
    'tbhead5'     => '',
    'tbhead6'     => '',
    'tbcontent1'  => '',
    'tbcontent2'  => '',
    'tbcontent3'  => '',
    'tbcontent4'  => '',
    'tbcontent5'  => '',
    'tbcontent6'   => '',
  );
  $attributes = shortcode_atts($default, $arguments);
  $shortcode_output = <<<EOD
    <p class="tex-center">{$attributes['title1']}</p>
    <table class="rental_table">
      <tr>
        <th>{$attributes['tbhead1']}</th>
        <td>{$attributes['tbcontent1']}</td>
      </tr>
      <tr>
        <th>{$attributes['tbhead2']}</th>
        <td>{$attributes['tbcontent2']}</td>
      </tr>
      <tr>
        <th>{$attributes['tbhead3']}</th>
        <td>{$attributes['tbcontent3']}</td>
      </tr>
      <tr>
        <th>{$attributes['tbhead4']}</th>
        <td>
        {$attributes['tbcontent4']}
        </td>
      </tr>
      <tr>
        <th>{$attributes['tbhead5']}</th>
        <td>{$attributes['tbcontent5']}</td>
      </tr>
      <tr>
        <th>{$attributes['tbhead6']}</th>
        <td>{$attributes['tbcontent6']}</td>
      </tr>
    </table>
  EOD;
  return $shortcode_output;
}
add_shortcode('ichiyoshi_rntbtl', 'ichiyoshi_rental_table');
// Rental Tabel End
// Donation Count Area
// Donation Count Area
//[donation_count number=250 mln='mln' heading='PEOPLE LIVE WITH A DISABILITY']

// Only Onextarea [ichiyoshi_onlyonetextarea'']
function ichiyoshi_onlyone_textarea($arguments){
  $default =array(
    'title1'  => '',
   
  );
  $attributes = shortcode_atts($default, $arguments);
  $shortcode_output = <<<EOD
        <h3 class="storehead">{$attributes['title1']}</h3>
  EOD;
  return $shortcode_output;
}
add_shortcode('ichiyoshi_onlyonetextarea', 'ichiyoshi_onlyone_textarea');


 
