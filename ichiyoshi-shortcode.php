<?php
function ichiyoshi_history_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Our History 1','ichiyoshi'),
            'attr'  => 'history1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Our History 2','ichiyoshi'),
            'attr'  => 'history2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Our History 3','ichiyoshi'),
            'attr'  => 'history3',
            'type'  => 'text'
        ),
    );
    $settings = array(
        'label' => __('History', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_history',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_history_shortcode_ui');

// Contact Info Shortcode
function ichiyoshi_contact_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Contact Info Title','ichiyoshi'),
            'attr'  => 'contact_title',
            'type'  => 'text'
        ),
        array(
            'label' => __('Telephone','ichiyoshi'),
            'attr'  => 'telephone',
            'type'  => 'text'
        ),
        array(
            'label' => __('Descriptions 1','ichiyoshi'),
            'attr'  => 'ct_des',
            'type'  => 'text'
        ),
        array(
            'label' => __('Descriptions 2','ichiyoshi'),
            'attr'  => 'ct_des2',
            'type'  => 'text'
        ),
    );
    $settings = array(
        'label' => __('Contact Info', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_contact_info',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_contact_shortcode_ui');

// Contact btn Shortcode
function ichiyoshi_btn_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Button Url','ichiyoshi'),
            'attr'  => 'btn_url',
            'type'  => 'url'
        ),
        
        
    );
    $settings = array(
        'label' => __('Contact Info', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_btns',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_btn_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_section_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Section Title','ichiyoshi'),
            'attr'  => 'title',
            'type'  => 'text'
        ),
        array(
            'label' => __('Sub Title','ichiyoshi'),
            'attr'  => 'subtitle2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Sub Title','ichiyoshi'),
            'attr'  => 'subtitle3',
            'type'  => 'text'
        ),
        
        
    );
    $settings = array(
        'label' => __('Section Title', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_stitle',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_section_shortcode_ui');


// ichiyoshi Section Shortcode
function ichiyoshi_menucourse_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Menu Course Number','ichiyoshi'),
            'attr'  => 'posts_per_page',
            'type'  => 'number'
        ),
        array(
            'label' => __('Menu Course Order by DESC, ASC ','ichiyoshi'),
            'attr'  => 'order',
            'type'  => 'select',
            'options'     => array(
				array( 'value' => 'DESC', 'label' => esc_html__( 'DESC', 'DESC ORDER', 'ichiyoshi' ) ),
				array( 'value' => 'ASC', 'label' => esc_html__( 'ASC', 'ASC ORDER', 'ichiyoshi' ) ),
				
			),
        ),
       
        
        
    );
    $settings = array(
        'label' => __('Menu Course ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_menu',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_menucourse_shortcode_ui');


// ichiyoshi Section Shortcode
function ichiyoshi_arakaruto_menu_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Set Media Image Id','ichiyoshi'),
            'attr'  => 'id',
            'type'  => 'number',
            

        ),
        array(
            'label' => __('Image Alt Text ','ichiyoshi'),
            'attr'  => 'caption',
            'type'  => 'text'
        ),
        array(
            'label' => __('paragraph 1 ','ichiyoshi'),
            'attr'  => 'para1',
            'type'  => 'text'
        ),
        array(
            'label' => __('paragraph 2 ','ichiyoshi'),
            'attr'  => 'para2',
            'type'  => 'text'
        ),
        array(
            'label' => __('paragraph 3 ','ichiyoshi'),
            'attr'  => 'para3',
            'type'  => 'text'
        ),
        array(
            'label' => __('paragraph 4 ','ichiyoshi'),
            'attr'  => 'para4',
            'type'  => 'text'
        ),
        array(
            'label' => __('paragraph 5 ','ichiyoshi'),
            'attr'  => 'para5',
            'type'  => 'text'
        ),
       
        
        
    );
    $settings = array(
        'label' => __('Menu Course ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('arakaruto',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_arakaruto_menu_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_drink_item_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Set Media Image Id','ichiyoshi'),
            'attr'  => 'posts_per_page',
            'type'  => 'number',
           

        ),
        array(
            'label' => __('Drink Item Order by DESC, ASC','ichiyoshi'),
            'attr'  => 'order',
            'type'  => 'select',
            'options'     => array(
				array( 'value' => 'DESC', 'label' => esc_html__( 'DESC', 'DESC ORDER', 'ichiyoshi' ) ),
				array( 'value' => 'ASC', 'label' => esc_html__( 'ASC', 'ASC ORDER', 'ichiyoshi' ) ),
				
			),
        ),
        array(
            'label' => __('paragraph 1 ','ichiyoshi'),
            'attr'  => 'terms',
            'type'  => 'text'
        ),
        
    );
    $settings = array(
        'label' => __('ichiyoshi Drink Menu ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_drinkmenu',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_drink_item_shortcode_ui');



// ichiyoshi Section Shortcode
function ichiyoshi_drink_section_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Set Media Image Id','ichiyoshi'),
            'attr'  => 'id',
            'type'  => 'number',
            

        ),
        array(
            'label' => __('Image Alt Text ','ichiyoshi'),
            'attr'  => 'caption',
            'type'  => 'text'
        ),
        array(
            'label' => __('Set Section Title ','ichiyoshi'),
            'attr'  => 'title',
            'type'  => 'text'
        ),
        
    );
    $settings = array(
        'label' => __('ichiyoshi Drink Menu ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('drink_title',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_drink_section_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_drinkfree_title_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Set Section Title','ichiyoshi'),
            'attr'  => 'title',
            'type'  => 'text',
           

        ),
        array(
            'label' => __('Subtext Text ','ichiyoshi'),
            'attr'  => 'subtitle',
            'type'  => 'text'
        ),
        
    );
    $settings = array(
        'label' => __('Dring Free Title ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_drinkfree',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_drinkfree_title_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_store_info_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Set Store info Title','ichiyoshi'),
            'attr'  => 'title1',
            'type'  => 'text',
           

        ),
        array(
            'label' => __('Table Title ','ichiyoshi'),
            'attr'  => 'title2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Table Title ','ichiyoshi'),
            'attr'  => 'title3',
            'type'  => 'text'
        ),
        array(
            'label' => __('Table Title','ichiyoshi'),
            'attr'  => 'title4',
            'type'  => 'text'
        ),
        array(
            'label' => __('Table Title','ichiyoshi'),
            'attr'  => 'title5',
            'type'  => 'text'
        ),
        array(
            'label' => __('Table Title','ichiyoshi'),
            'attr'  => 'title6',
            'type'  => 'text'
        ),
        array(
            'label' => __('Description 1 ','ichiyoshi'),
            'attr'  => 'des1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Description 1 ','ichiyoshi'),
            'attr'  => 'des2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Description 1 ','ichiyoshi'),
            'attr'  => 'des3',
            'type'  => 'text'
        ),
        array(
            'label' => __('Description 1 ','ichiyoshi'),
            'attr'  => 'des4',
            'type'  => 'text'
        ),
        array(
            'label' => __('Description 1 ','ichiyoshi'),
            'attr'  => 'des5',
            'type'  => 'text'
        ),
        
    );
    $settings = array(
        'label' => __('Dring Free Title ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_storeinfo',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_store_info_shortcode_ui');

// Store Item Ui
// ichiyoshi Section Shortcode
function ichiyoshi_storeitem_shortcode_ui(){
    $fields = array(
         array(
            'label' => __('Section Heading','ichiyoshi'),
            'attr'  => 'sectionhead',
            'type'  => 'textarea'
        ),
        array(
            'label' => __('Store Item Number','ichiyoshi'),
            'attr'  => 'posts_per_page',
            'type'  => 'number'
        ),
        array(
            'label' => __('Store Item Order by DESC, ASC ','ichiyoshi'),
            'attr'  => 'order',
            'type'  => 'select',
            'options'     => array(
				array( 'value' => 'DESC', 'label' => esc_html__( 'DESC', 'DESC ORDER', 'ichiyoshi' ) ),
				array( 'value' => 'ASC', 'label' => esc_html__( 'ASC', 'ASC ORDER', 'ichiyoshi' ) ),
				
			),
        ),
    );
    $settings = array(
        'label' => __('Store Item ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_storeitem',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_storeitem_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_rentaladd_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Rental Add Title','ichiyoshi'),
            'attr'  => 'title1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Title Description ','ichiyoshi'),
            'attr'  => 'titledes',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Title Images ','ichiyoshi'),
            'attr'  => 'id',
            'type'  => 'number'
        ),
        array(
            'label' => __('image alt text','ichiyoshi'),
            'attr'  => 'caption',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Description','ichiyoshi'),
            'attr'  => 'des1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Description','ichiyoshi'),
            'attr'  => 'des2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Description','ichiyoshi'),
            'attr'  => 'des3',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Add Description ','ichiyoshi'),
            'attr'  => 'des4',
            'type'  => 'text'
        ),
    );
    $settings = array(
        'label' => __('Store Item ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_rentaladd',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_rentaladd_shortcode_ui');

// ichiyoshi Section Shortcode
function ichiyoshi_rentaltbl_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Rental Table Title','ichiyoshi'),
            'attr'  => 'title1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title ','ichiyoshi'),
            'attr'  => 'tbhead1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description ','ichiyoshi'),
            'attr'  => 'tbcontent1',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title 2 ','ichiyoshi'),
            'attr'  => 'tbhead2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description 2 ','ichiyoshi'),
            'attr'  => 'tbcontent2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title 3 ','ichiyoshi'),
            'attr'  => 'tbhead3',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description 3','ichiyoshi'),
            'attr'  => 'tbcontent3',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title 4','ichiyoshi'),
            'attr'  => 'tbhead4',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description 4','ichiyoshi'),
            'attr'  => 'tbcontent4',
            'type'  => 'textarea'
        ),
        array(
            'label' => __('Rental Table Title 5 ','ichiyoshi'),
            'attr'  => 'tbhead5',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description 5 ','ichiyoshi'),
            'attr'  => 'tbcontent5',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title 6 ','ichiyoshi'),
            'attr'  => 'tbhead6',
            'type'  => 'text'
        ),
        array(
            'label' => __('Rental Table Title Description 6 ','ichiyoshi'),
            'attr'  => 'tbcontent6',
            'type'  => 'text'
        ),
    );
    $settings = array(
        'label' => __('Store Item ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_rntbtl',  $settings);

}
add_action('register_shortcode_ui', 'ichiyoshi_rentaltbl_shortcode_ui');
// ichiyoshi Section Shortcode
function menuitemtop_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Title Amount Number','ichiyoshi'),
            'attr'  => 'id',
            'type'  => 'number'
        ),
        array(
            'label' => __('Menu Top One ','ichiyoshi'),
            'attr'  => 'amounttext',
            'type'  => 'text'
        ),
        array(
            'label' => __('Menu Top Description ','ichiyoshi'),
            'attr'  => 'description',
            'type'  => 'text'
        ),
        array(
            'label' => __('Menu Top Amout 3 ','ichiyoshi'),
            'attr'  => 'amounttext2',
            'type'  => 'text'
        ),
        array(
            'label' => __('Menu Top Description 2 ','ichiyoshi'),
            'attr'  => 'description2',
            'type'  => 'text'
        ),
        
    );
    $settings = array(
        'label' => __('Menu Top Item ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('menuitemtop',  $settings);

}

// ichiyoshi Section Shortcode
function menuitem_pagelink_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Your Link','ichiyoshi'),
            'attr'  => 'btnurl',
            'type'  => 'url'
        ),
        array(
            'label' => __('Button Text','ichiyoshi'),
            'attr'  => 'title',
            'type'  => 'text'
        ),
       
        
    );
    $settings = array(
        'label' => __('Page Link ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('menubtnlink',  $settings);

}
add_action('register_shortcode_ui', 'menuitem_pagelink_shortcode_ui');

// ichiyoshi Section Shortcode
function onlyonetextarea_shortcode_ui(){
    $fields = array(
        array(
            'label' => __('Your Link','ichiyoshi'),
            'attr'  => 'btnurl',
            'type'  => 'textarea'
        ),
    );
    $settings = array(
        'label' => __('Only One Text Area ', 'ichiyoshi'),
        'listItemImage'=>'dashicons-admin-site',
        'post_type' => array('post', 'page'),
        'attrs'     => $fields
    );
    shortcode_ui_register_for_shortcode('ichiyoshi_onlyonetextarea',  $settings);

}
add_action('register_shortcode_ui', 'onlyonetextarea_shortcode_ui');

