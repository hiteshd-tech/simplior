<?php
// Add custom Theme Functions here

add_action('wp_enqueue_scripts', 'enqueue_parent_styles', 999);

function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_dequeue_style('flatsome-main');
    wp_register_script('custom.js', get_stylesheet_directory_uri(). '/js/custom.js', array('jquery'), true);
    wp_enqueue_script('custom.js');
    //wp_register_script('snowfall.js', get_stylesheet_directory_uri(). '/js/snowfall.js', array('jquery'), true);
    //wp_enqueue_script('snowfall.js');
    wp_localize_script('custom.js', 'custom_js', array( 'ajaxurl' => admin_url('admin-ajax.php')));
}


function cc_mime_types($mimes)
{
     $mimes['svg'] = 'image/svg+xml';
     return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function custom_grid_shortcode($atts)
{
    global $post;
    $atts = shortcode_atts(array(
        'posts_per_page' => '-1',
        'term'           => '',
        'post_ids' =>'',
    ), $atts);

    extract($atts);

    // Define output var
    $output = '';
    $aa = explode(",", $post_ids);

    // Define query
    $query_args = array(
        'post_type'      => 'featured_item', // Change this to the type of post you want to show
        'posts_per_page' => -1,
        'post__in' => $aa

    );

    // Query posts
    $custom_query = new WP_Query($query_args);

    // Add content if we found posts via our query
    if ($custom_query->have_posts()) {
        // Open div wrapper around loop
        $output .= '<div class="our_works">';

        // Loop through posts
        while ($custom_query->have_posts()) {
            // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
            $custom_query->the_post();
            $output .= '<div class="right-side col-ms12 col-sm-12">';
                // This is the output for your entry so what you want to do for each post.
                $output .= '<div class="col-md-6 col-sm-6 post-image-box">';
                $output .= '<div>' . get_the_post_thumbnail() . '</div>';
                $output .= '</div>';
                $output .= '<div class="col-md-6 col-sm-6 post-content-box">';
                $output .= '<h3>' . get_the_title() . '</h3>';
                $output .= '<div><p>' . get_the_excerpt() . '</p></div>';
                $output .= '<a class="more-link" href="'. get_permalink(get_the_ID()) . '">Read more</a>';
                $output .= '<div>' .get_post_meta(get_the_ID(), 'project review', true) . '</div>';
                $output .= '</div>';
            $output .= '</div>';
        }

        // Close div wrapper around loop
        $output .= '</div>';

        // Restore data
        wp_reset_postdata();
    }

    // Return your shortcode output
    return $output;
}
add_shortcode('portfolio', 'custom_grid_shortcode');

//Start function for allow svg file upload on media
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
//End function for allow svg file upload on media

function st_widgets_init()
{

    register_sidebar(array(
        'name'          => 'ServicesBottomBar',
        'id'            => 'menu_bottom_bar',
        'before_widget' => '<div class="menu-bottom-bar">',
        'after_widget'  => '</div>',
    ));
    
    register_sidebar(array(
        'name'          => 'TechnologiesBottomBar',
        'id'            => 'technologies_bottom_bar',
        'before_widget' => '<div class="menu-bottom-bar">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => 'MobileToggleContent',
        'id'            => 'mobile_toggle_content',
        'before_widget' => '<div class="mobile-toggle-bar">',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'st_widgets_init');

function admin_load_scripts()
{
    wp_enqueue_media();
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/admin/custom.js');
}
add_action('admin_enqueue_scripts', 'admin_load_scripts');


function menu_custom_fields($item_id, $item)
{

    wp_nonce_field('menu_widget_nonce', '_menu_widget_nonce_name');
    $menu_widget = get_post_meta($item_id, '_menu_widget', true);
    $menu_image_url = get_post_meta($item_id, '_menu_image_url', true);
    ?>

<p class="field-custom_menu_image description-wide">
    <label for="image_url"><?php _e("Menu Icon:", 'st'); ?></label>
    <input type="hidden" name="menu_image_url[<?php echo $item_id ;?>]" id="menu_image_url" class="regular-text"
        value="<?php echo $menu_image_url ?>">
    <input type="button" name="upload-btn" id="upload-btn-2" class="button-secondary upload-btn-2" value="Upload Image">
    <input type="button" name="remove-btn" id="remove-btn-2" class="button-secondary remove-btn-2" value="Remove Image">
    <?php if ($menu_image_url) { ?>
    <img src="<?php echo $menu_image_url ?>" id="image_url2" width="100" height="100" />
    <?php } ?>
</p>

<p class="field-custom_menu_meta description-wide">
    <span class="description"><?php _e("Widget", 'st'); ?></span>
    <input type="hidden" class="nav-menu-id" value="<?php echo $item_id ;?>" />

    <select name="menu_widget[<?php echo $item_id ;?>]" id="menu-widget-for-<?php echo $item_id ;?>">
        <option value="">Select Sidebar</option>
        <?php foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) { ?>
        <option value="<?php echo $sidebar['id'] ?>"
            <?php echo ( $sidebar['id'] == $menu_widget ) ? ' selected': ''; ?>>
            <?php echo ucwords($sidebar['name']); ?>
        </option>
        <?php } ?>
    </select>
</p>

    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'menu_custom_fields', 10, 2);

function menu_nav_update($menu_id, $menu_item_db_id)
{
    if (isset($_POST['menu_widget'][$menu_item_db_id])) {
        $sanitized_data = sanitize_text_field($_POST['menu_widget'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_widget', $sanitized_data);
    }

    if (isset($_POST['menu_image_url'][$menu_item_db_id])) {
        $menu_image_url = sanitize_text_field($_POST['menu_image_url'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_image_url', $menu_image_url);
    }
}
add_action('wp_update_nav_menu_item', 'menu_nav_update', 10, 2);

function simplior_next_post_link_portfolio()
{
    global $post;
    $next_post = get_next_post(true, '', 'featured_item_category');
    if (is_a($next_post, 'WP_Post')) { ?>
<a title="<?php echo get_the_title($next_post->ID); ?>" class="prev-link plain"
    href="<?php echo get_the_permalink($next_post->ID); ?>">
    <span class="post-title-next"><?php echo get_the_title($next_post->ID);?></span>
    <span class="next">Next<img src="<?php echo get_stylesheet_directory_uri().'/images/right-arrow.svg' ?>" /></span>
</a>
    <?php }
}

function simplior_previous_post_link_portfolio()
{
    global $post;
    $prev_post = get_previous_post(true, '', 'featured_item_category');
    if (is_a($prev_post, 'WP_Post')) { ?>
<a title="<?php echo get_the_title($prev_post->ID); ?>" class="next-link plain"
    href="<?php echo get_the_permalink($prev_post->ID); ?>">
    <span class="prev"><img src="<?php echo get_stylesheet_directory_uri().'/images/left-arrow.svg' ?>" />Prev</span>
    <span class="post-title-prev"><?php echo get_the_title($prev_post->ID);?></span>
</a>

    <?php }
}
add_action('wp_footer', 'footer_section_area');
function footer_section_area()
{
     dynamic_sidebar('mobile_toggle_content');
}
/*add_action('wp_footer', 'wpshout_action_example');
function wpshout_action_example() {
        ?>
<script>
WebFontConfig = {
    google: {
        families: ['Poppins%3Aregular%2C700%7CNunito+Sans%3Aregular%2Cregular%2C600%2Cregular&display=swap']
    }
};

(function(d) {
    var wf = d.createElement('script'),
        s = d.scripts[0];
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.async = true;
    s.parentNode.insertBefore(wf, s);
})(document);
</script>
<?php
}*/

function hook_css()
{
    ?>
<link rel='preconnect' href='https://www.google-analytics.com'>
<link rel='preconnect' href='https://www.google.com'>
<link rel='preconnect' href='https://www.gstatic.com'>
    <?php
    echo '<link rel="preload" as="font" href="https://simplior.com/wp-content/themes/simplior-technologies/font/nunitosans-bold-webfont.woff2" type="font/woff2" crossorigin="anonymous">';
    echo '<link rel="preload" as="font" href="https://simplior.com/wp-content/themes/simplior-technologies/font/nunitosans-extralight-webfont.woff2" type="font/woff2" crossorigin="anonymous">';
    echo '<link rel="preload" as="font" href="https://simplior.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.woff2" type="font/woff2" crossorigin="anonymous">';
    ?>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FC45BSVLTD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FC45BSVLTD');
</script>
    <?php 
}
add_action('wp_head', 'hook_css', 9);

add_filter('gform_field_value_career_post_name', 'set_college');
function set_college($value)
{
    global $post;
    if (!empty($post)) {
        return $post->post_title;
    }
}

add_filter('gform_pre_render_1', 'career_posts');
add_filter('gform_pre_validation_1', 'career_posts');
add_filter('gform_pre_submission_filter_1', 'career_posts');
add_filter('gform_admin_pre_render_1', 'career_posts');
function career_posts($form)
{
    
    global $post;
    foreach ($form['fields'] as &$field) {
        if ($field->type != 'select' || strpos($field->cssClass, 'career-posts') === false) {
            continue;
        }

        $posts = get_posts('numberposts=-1&post_status=publish&post_type=careers');
 
        $choices = array();
 
        foreach ($posts as $val) {
            if ($val->post_name == $post->post_name) {
                $choices[] = array( 'text' => $val->post_title, 'value' => $val->ID, 'isSelected' => true );
            } else {
                $choices[] = array( 'text' => $val->post_title, 'value' => $val->ID, 'isSelected' => false );
            }
        }
 
        $field->choices = $choices;
    }
 
    return $form;
}

add_action("wp_ajax_career_redirect", "career_redirect_callback");
add_action("wp_ajax_nopriv_career_redirect", "career_redirect_callback");

function career_redirect_callback()
{
    $post_id = $_POST['post_id'];
    $page_redirect = get_permalink($post_id);
    if (!empty($page_redirect)) {
        echo $page_redirect;
    }
    die();
}

add_action('add_meta_boxes', 'add_events_metaboxes');
function add_events_metaboxes()
{
    add_meta_box(
        'wpt_custom_meta_box',
        'Custom Meta fields',
        'wpt_custom_meta_box',
        'careers',
        'normal',
        'high'
    );
}

function wpt_custom_meta_box()
{
    global $post;

    // Nonce field to validate form request came from current site
    wp_nonce_field(basename(__FILE__), 'custom_meta_fields');

    // Get the location data if it's already been entered
    $experience = get_post_meta($post->ID, '_experience', true);
    $opening    = get_post_meta($post->ID, '_opening', true);

    // Output the field
    echo '<label>Experience: </label>';
    echo '<input type="text" name="cust_experience" value="' .$experience. '" class="widefat">';

    echo '<label>Openings: </label>';
    echo '<input type="text" name="cust_opening" value="' .$opening. '" class="widefat">';
}

function save_global_notice_meta_box_data($post_id)
{

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'careers' == $_POST['post_type']) {
        if (! current_user_can('edit_page', $post_id)) {
            return;
        }
    }

    // Sanitize user input.
    $experience = sanitize_text_field($_POST['cust_experience']);
    $opening    = sanitize_text_field($_POST['cust_opening']);

    // Update the meta field in the database.
    update_post_meta($post_id, '_experience', $experience);
    update_post_meta($post_id, '_opening', $opening);
}

add_action('save_post', 'save_global_notice_meta_box_data');

/* Add custom meta for post page */
add_action('add_meta_boxes', 'add_posts_metaboxes');
function add_posts_metaboxes()
{
    add_meta_box(
        'wp_post_meta_box',
        'Custom post fields',
        'wp_post_meta_box',
        'post',
        'normal',
        'high'
    );
}

function wp_post_meta_box()
{
    global $post;

    // Nonce field to validate form request came from current site
    wp_nonce_field(basename(__FILE__), 'custom_meta_fields');

    // Get the location data if it's already been entered
    $toc_content = get_post_meta($post->ID, '_toc_content', true);

    // Output the field
    echo '<p><strong>TOC content: </strong></p>';
    wp_editor($toc_content, 'toc_content', array());
}

function save_posts_meta_box_data($post_id,$attachment)
{
    if (isset($_POST['action']) && $_POST['action'] == 'ux_builder_save') {
        return;
    }
    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'post' == $_POST['post_type']) {
        if (! current_user_can('edit_page', $post_id)) {
            return;
        }
    }

    // Sanitize user input.
    $toc_content = $_POST['toc_content'];

    // Update the meta field in the database.
    if(isset($_POST['toc_content'])){
        update_post_meta($post_id, '_toc_content', $toc_content);
    }
}

add_action('save_post', 'save_posts_meta_box_data', 10 , 2);

function careers_custom_shortcode_callback($atts)
{
    $args = array(
        'post_type' => 'careers',
        'post_status' => 'publish',
    );


    $postslist = get_posts($args);

    $output ='<div class="careers-main">';

    foreach ($postslist as $post) :
        setup_postdata($post);

        $post_title = $post->post_title;
        $experience = get_post_meta($post->ID, '_experience', true);
        $opening = get_post_meta($post->ID, '_opening', true);
        $output.='<div class="careers-inner-part">';
            $output.='<div class="careers-inner-part-box">';
                $output.='<div class="title">'.$post->post_title.'</div>';
                $output.='<div class="experience">Experience: '.$experience.'</div>';
                $output.='<div class="opening">Opening: '.$opening.'</div>';
                $output.='<a href="'.get_permalink($post->ID).'">Apply Now</a>';
            $output.='</div>';
        $output.='</div>';
    endforeach;
    wp_reset_postdata();
    $output .='</div>';

    return $output;
}


/* Add custom meta for portfolio page */
add_action('add_meta_boxes', 'add_portfolio_metaboxes');
function add_portfolio_metaboxes()
{
    add_meta_box(
        'wp_portfolio_meta_box',
        'Custom Portfolio fields',
        'wp_portfolio_meta_box',
        'featured_item',
        'normal',
        'high'
    );
}
function wp_portfolio_meta_box($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <p><label for="meta-box-text">Site url</label></p>
            <input name="meta-box-text" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text", true); ?>" style="width:100%;">
        </div>
    <?php  
}

function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "featured_item";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["meta-box-text"]))
    {
        $meta_box_text_value = $_POST["meta-box-text"];
    }   
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);



add_shortcode('careers_custom_shortcode', 'careers_custom_shortcode_callback');

function post_custom_shortcode_callback($atts)
{
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
    );


    $postslist = get_posts($args);

    $output ='<div class="blog-wrapper">';
        $output .='<div class="row align-center">';
            $output .='<div class="large-12 col">';
                $output .='<div class="row large-columns-3 medium-columns- small-columns-1">';
    foreach ($postslist as $post) {
        setup_postdata($post);

        $post_title = $post->post_title;
        $experience = get_post_meta($post->ID, '_experience', true);
        $opening = get_post_meta($post->ID, '_opening', true);
        $output.='<div class="col post-item">';
            $output.='<div class="col-inner">';
                $output.='<a href="'.get_permalink($post->ID).'" class="plain">';
                    $output.='<div class="box box-text-bottom box-blog-post has-hover">';
                        $output.='<div class="box-image">';
                            $output.='<div class="image-cover">';
                                $output.= get_the_post_thumbnail($post->ID);
                            $output.='</div>';
                        $output.='</div>';
                        $output.='<div class="box-text text-left">';
                            $output.='<div class="box-text-inner blog-post-inner">';
                                $output.='<h5 class="post-title is-large ">'.$post->post_title.'</h5>';
                                $output.='<div class="is-divider"></div>';
                                $output.='<p class="from_the_blog_excerpt ">'.$post->post_excerpt.'</p>';
                            $output.='</div>';
                        $output.='</div>';
                        $output.='<div class="badge absolute top post-date badge-outline">';
                            $output.='<div class="badge-inner">';
                                $output.='<span class="post-date-day">'.date('d', strtotime($post->post_date)).'</span><br>';
                                $output.='<span class="post-date-month is-xsmall">'.date('F', strtotime($post->post_date)).'</span>';
                            $output.='</div>';
                        $output.='</div>';
                    $output.='</div>';
                $output.='</a>';
            $output.='</div>';
        $output.='</div>';
    }
                    wp_reset_postdata();
                $output .='</div>';
            $output .='</div>';
        $output .='</div>';
    $output .='</div>';

    return $output;
}
add_shortcode('post_custom_shortcode', 'post_custom_shortcode_callback');

function related_post_custom_shortcode_callback($atts)
{
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'exclude' => array(get_the_ID())
    );


    $postslist = get_posts($args);
    $output .='<div class="row align-center related-posts">';
        $output .='<div class="large-12 col">';
            $output .= '<h4>Related Article</h4>';
            $output .='<div class="row large-columns-3 medium-columns- small-columns-1">';
    foreach ($postslist as $post) {
        setup_postdata($post);

        $post_title = $post->post_title;
        $experience = get_post_meta($post->ID, '_experience', true);
        $opening = get_post_meta($post->ID, '_opening', true);
        $output.='<div class="col post-item">';
            $output.='<div class="col-inner">';
                $output.='<a href="'.get_permalink($post->ID).'" class="plain">';
                    $output.='<div class="box box-text-bottom box-blog-post has-hover">';
                        $output.='<div class="box-image">';
                            $output.='<div class="image-cover">';
                                $output.= get_the_post_thumbnail($post->ID);
                            $output.='</div>';
                        $output.='</div>';
                        $output.='<div class="box-text text-left">';
                            $output.='<div class="box-text-inner blog-post-inner">';
                                $output.='<h5 class="post-title is-large ">'.$post->post_title.'</h5>';
                                $output.='<div class="is-divider"></div>';
                                $output.='<p class="from_the_blog_excerpt ">'.$post->post_excerpt.'</p>';
                            $output.='</div>';
                        $output.='</div>';
                        $output.='<div class="badge absolute top post-date badge-outline">';
                            $output.='<div class="badge-inner">';
                                $output.='<span class="post-date-day">'.date('d', strtotime($post->post_date)).'</span><br>';
                                $output.='<span class="post-date-month is-xsmall">'.date('F', strtotime($post->post_date)).'</span>';
                            $output.='</div>';
                        $output.='</div>';
                    $output.='</div>';
                $output.='</a>';
            $output.='</div>';
        $output.='</div>';
    }
                wp_reset_postdata();
            $output .='</div>';
        $output .='</div>';
    $output .='</div>';

    return $output;
}
add_shortcode('related_post_custom_shortcode', 'related_post_custom_shortcode_callback');

function cf7_footer_script()
{
    ?>
  
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/thank-you/';
}, false );
</script>
  
<?php }
  
add_action('wp_footer', 'cf7_footer_script');

add_filter( 'big_image_size_threshold', '__return_false' );

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Simplior</a>';
	echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
	echo '<a href="/blog/" rel="nofollow">Blog</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
//             if (is_single()) {
//                 echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
//                 the_title();
//             }
    } elseif (is_page()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
//         echo the_title();
    } elseif (is_search()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
//         echo '"<em>';
//         //echo the_search_query();
//         echo '</em>"';
    }
}

// add_action('init', 'blog_front');

// function blog_front() {
//   add_rewrite_rule('^blog/([^/]+)/?','index.php?name=$matches[1]','top');
// }

// add_action('template_redirect', 'say_hello_to_google');

// function say_hello_to_google() {
//   if ( is_main_query() && is_single() && ( empty( get_post_type() ) || (get_post_type() === 'post') ) ) {
//     if ( strpos( trim( add_query_arg( array() ), '/' ), 'blog' ) !== 0 ) {
//       global $post;
//       $url = str_replace( $post->post_name, 'blog/' . $post->post_name, get_permalink( $post ) );
//       wp_safe_redirect( $url, 301 );
//       exit(); 
//     }
//   }
// }

// add_filter('the_permalink', 'post_permalink_w_blog');

// function post_permalink_w_blog( $link ) {
//   global $post;
//   if ( $post->post_type === 'post' ) {
//     $link = str_replace( $post->post_name, 'blog/' . $post->post_name, get_permalink( $post ) );
//   }
//   return $link; 
// }

// function archive_rewrite_rules(){
//   add_rewrite_rule(
//       'blog/([^/]*)/?$',
//       'index.php?post_type=post&post_name=$matches[1]',
//       'top'
//   );
// }
// add_action( 'init', 'archive_rewrite_rules' );

/*add_filter( 'gform_plupload_settings', 'init_plupload_settings', 10, 3 );
function init_plupload_settings( $settings, $form_id, $field ){
    echo "<pre>";print_r($settings);
	//$settings['filters']['max_file_size'] = '100kb';
	return $settings;
}*/

/* Showing the current year start */
function current_year() {
    $year = date('Y');
    return $year;
}

add_shortcode('dt_year', 'current_year');
/* Showing the current year end */

add_action( 'after_setup_theme', 'simplior_remove_theme_support' );
function simplior_remove_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}

// Display Blog category list shortcode
function category_list() {
    $categories = get_categories();

    $list = '';
        $list .= '<ul class="category_filter_list">';
        $list .= '<li class="category-filter active"><a class="cat-list_item" href="javascript:void(0);">All</a></li>';
    foreach ( $categories as $term ) {
        $list .= '<li class="category-filter"><a class="cat-list_item" href="javascript:void(0);" data-slug="'. $term->slug .'">' . esc_html( $term->name ) . '</a></li>';
    }
        $list .= '</ul>';
    return $list;
}
add_shortcode('blog_category_list', 'category_list');

//Filter Blog post by category
function filter_posts() {
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1
    );
  
    if (isset($_POST['category'])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    => $_POST['category'],
        ),
      );
    } ?>
  <div class="col-inner">
      <div class="row large-columns-3 medium-columns-1 small-columns-1">
  
  <?php
    $query = new WP_Query($args);
  
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
  
      if (has_post_thumbnail($post->ID)) {
          $featured_img  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
          $excerpt = get_the_excerpt(); 
          // $excerpt = substr( $excerpt, 0, 75 ); 
      }
        ?>
        <div class="col post-item">
          <div class="col-inner">
              <div class="box box-normal box-text-bottom box-blog-post has-hover">
                  <div class="box-image">
                      <div class="image-cover" style="padding-top:56%;">
                          <a href="<?php the_permalink(); ?>" class="plain" aria-label="<?php the_title(); ?>">
                              <img width="1890" height="600" src="<?php echo $featured_img[0]; ?>" class="attachment-original size-original wp-post-image" alt="<?php the_title(); ?>">
                          </a>
                      </div>
                  </div>
                  <div class="box-text text-left">
                      <div class="box-text-inner blog-post-inner">
                          <h5 class="post-title is-large ">
                              <a href="<?php the_permalink(); ?>" class="plain"><?php the_title(); ?></a>
                          </h5>
                          <div class="is-divider"></div>
                          <p class="from_the_blog_excerpt "><?php echo wp_trim_words($excerpt, 15, ''); ?></p>
                      </div>
                  </div>
                  <div class="badge absolute top post-date badge-outline">
                      <div class="badge-inner">
                          <span class="post-date-day"><?php echo get_the_date('d'); ?></span><br>
                          <span class="post-date-month is-xsmall"><?php echo get_the_date('M'); ?></span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p>No posts found</p>';
    endif;
  ?>
      </div>
  </div>
  <?php
    die();
  }
  add_action('wp_ajax_filter_posts', 'filter_posts');
  add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');
  