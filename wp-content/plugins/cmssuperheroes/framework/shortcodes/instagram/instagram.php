<?php
function cshero_instagram($params, $content = null) {
    extract(shortcode_atts(array(
    		'title' => '',
            'username' => '',
            'client_id' => '',
            'columns' => 3,
            'numbers' => 9,
            'size' => 'thumbnail',
            'target' => '_self',
            'link' => '',
            'el_class' => ''
    ), $params));
	$class = 'instagram_wrap '.esc_attr($el_class).'';
    switch ($columns) {
        case 1:
            $span = "col-xs-12 col-sm-12 col-md-12 col-lg-12 nopaddingall";
            break;
        case 2:
            $span = "col-xs-6 col-sm-6 col-md-6 col-lg-6 nopaddingall";
            break;
        case 3:
            $span = "col-xs-4 col-sm-4 col-md-4 col-lg-4 nopaddingall";
            break;
        case 4:
            $span = "col-xs-3 col-sm-3 col-md-3 col-lg-3 nopaddingall";
            break;
        default:
            $span = "col-xs-4 col-sm-4 col-md-4 col-lg-4 nopaddingall";
    }
    ob_start();
    if(!empty($title)){
        echo '<h3>'.$title.'</h3>';
    }
    if(!empty($username)){
        $media_array = cshero_scrape_instagram($username, $client_id, $numbers);
        if ( is_wp_error($media_array) ) {

           echo apply_filters('the_title',$media_array->get_error_message());

        } else {

            // filter for images only?
            if ( $images_only = apply_filters( 'cs_images_only', FALSE ) )
                $media_array = array_filter( $media_array, 'images_only' );

            ?><div class="cs-instagram-pics widget_cs_instagram_widget <?php echo esc_attr($el_class);?>"><?php
            foreach ($media_array as $item) {
                echo '<div class="instagram-item '.$span.'"><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url($item[$size]['url']) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'" style="width:100%; max-width:100%;"/></a></div>';
            }
            ?></div><?php
        }
        if (!empty($link)) {
            ?><p class="clear"><a href="//instagram.com/<?php echo trim($username); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo esc_attr($link); ?></a></p><?php
        }
    }
    return ob_get_clean();
}
if(!function_exists('cshero_scrape_instagram')){
    function cshero_scrape_instagram($username, $api, $slice = 9) {

        if (false === ($instagram = get_transient('instagram-media-'.sanitize_title_with_dashes($username)))) {

            $id = getInstaID($username, $api);
            $remote = wp_remote_get("https://api.instagram.com/v1/users/".trim($id)."/media/recent/?client_id=".$api."&count=".$slice, true);
            if (is_wp_error($remote))
                return new WP_Error('site_down', __('Unable to communicate with Instagram.', THEMENAME));

            if ( 200 != wp_remote_retrieve_response_code( $remote ) )
                return new WP_Error('invalid_response', __('Instagram did not return a 200.', THEMENAME));
            $insta_array = json_decode($remote['body'], TRUE);

            if (!$insta_array)
                return new WP_Error('bad_json', __('Instagram has returned invalid data.', THEMENAME));

            $images = $insta_array['data'];

            $instagram = array();
            foreach ($images as $image) {

                if ($image['user']['username'] == $username) {

                    $image['link']                          = preg_replace( "/^http:/i", "", $image['link'] );
                    $image['images']['thumbnail']           = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
                    $image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );

                    $instagram[] = array(
                        'description'   => $image['caption']['text'],
                        'link'          => $image['link'],
                        'time'          => $image['created_time'],
                        'comments'      => $image['comments']['count'],
                        'likes'         => $image['likes']['count'],
                        'thumbnail'     => $image['images']['thumbnail'],
                        'large'         => $image['images']['standard_resolution'],
                        'type'          => $image['type']
                    );
                }
            }

            $instagram = base64_encode( serialize( $instagram ) );
            set_transient('instagram-media-'.sanitize_title_with_dashes($username), $instagram, apply_filters('cs_instagram_cache_time', 300));
        }

        $instagram = unserialize( base64_decode( $instagram ) );

        return array_slice($instagram, 0, $slice);
    }
}
function getInstaID($username, $client_id)
    {

        $username = strtolower($username); // sanitization
        $url = "https://api.instagram.com/v1/users/search?q=".$username."&client_id=".$client_id;
        $remote = wp_remote_get($url, true);
        if (is_wp_error($remote))
            return new WP_Error('site_down', __('Unable to communicate with Instagram.', THEMENAME));

        if ( 200 != wp_remote_retrieve_response_code( $remote ) )
            return new WP_Error('invalid_response', __('Instagram did not return a 200.', THEMENAME));
        $json = json_decode($remote['body']);

        foreach($json->data as $user)
        {
            if($user->username == $username)
            {
                return $user->id;
            }
        }

        return '00000000'; // return this if nothing is found
    }

if(!function_exists('images_only')){
    function images_only($media_item) {

        if ($media_item['type'] == 'image')
            return true;

        return false;
    }
}
add_shortcode('cshero-instagram', 'cshero_instagram');
