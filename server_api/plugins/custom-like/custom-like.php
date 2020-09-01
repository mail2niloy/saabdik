<?php
/**
* Plugin Name: Custom Like Plugin
* Plugin URI: https://www.saabdik.com/
* Description: This is the plugin for Post Likes.
* Version: 1.0
* Author: Niloy Sarkar
* Author URI: http://saabdik.com/
**/

function custom_like_create_db() {
 global $wpdb;
 $charset_collate = $wpdb->get_charset_collate();
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

 //* Create the teams table
 $table_name = $wpdb->prefix . 'custom_like';
 $sql = "CREATE TABLE $table_name (
 id INTEGER NOT NULL AUTO_INCREMENT,
 post_id INTEGER NOT NULL,
 user_email VARCHAR(50) NOT NULL,
 is_liked ENUM('1','0') DEFAULT '1' NOT NULL,
 date_modified TIMESTAMP NOT NULL,
 PRIMARY KEY (id)
 ) $charset_collate;";
 dbDelta( $sql );
}

register_activation_hook( __FILE__, 'custom_like_create_db' );

//add resp api custom end-points

add_action( 'rest_api_init', function () {
      register_rest_route( 'custom_like/v1', '/get_post_likes/', array(
            'methods' => 'GET',
            'callback' => 'get_post_likes',
      ) );
      register_rest_route( 'custom_like/v1', '/update_post_like/', array(
            'methods' => 'POST',
            'callback' => 'update_post_like',
        ) );
      register_rest_route( 'custom_like/v1', '/insert_post_like/', array(
            'methods' => 'POST',
            'callback' => 'insert_post_like',
        ) );


    } 
);

function get_post_likes( $request_data ) {
    global $wpdb;
    $parameters = $request_data->get_params();
    $post_id = $parameters['post_id'];
    $wpdb->custom_like = $wpdb->prefix . "custom_like"; 
    //echo $wpdb->prefix;     
    $sql = "SELECT * from $wpdb->custom_like WHERE post_id='$post_id'";
    //echo $sql;
    /* Perform query */
    $results = $wpdb->get_results($sql);

    return $results;
}

/**
 * Retrieves detail membership plan for an user from the database matching $query.
 * $query is an array which can contain the following keys:
 *
*/
function update_post_like( $request_data=array() ){
 
    global $wpdb;
    global $wpdb; 
    $creds = array();
    $headers = getallheaders();
    return $headers;
        // Get username and password from the submitted headers.
    if ( array_key_exists( 'username', $headers ) && array_key_exists( 'password', $headers ) ) {
        $creds['user_login'] = $headers["username"];
        $creds['user_password'] =  $headers["password"];
        $creds['remember'] = false;
        $user = wp_signon( $creds, false );  // Verify the user.
        
        // TODO: Consider sending custom message because the default error
        // message reveals if the username or password are correct.
        if ( is_wp_error($user) ) {
            echo $user->get_error_message();
            return $user;
        }
        
        wp_set_current_user( $user->ID, $user->user_login );
        
        // A subscriber has 'read' access so a very basic user account can be used.
        if ( ! current_user_can( $this->required_capability ) ){
            return new WP_Error( 'rest_forbidden', 'You do not have permissions to view this data.', array( 'status' => 401 ) );
        }
        
        // TODO: Run real code here.
        $parameters = $request_data->get_params();
        $id = $parameters['id'];
        $user_email = $parameters['user_email'];
        $post_id = $parameters['post_id'];
        $is_liked = $parameters['is_liked'];
        $date_modified = current_time('timestamp');   
        if ( false === $wpdb->update('wp_custom_like', array('is_liked' =>
        $is_liked, 'date_modified' =>$date_modified ), array('user_email'=>$user_email, 'post_id'=>$post_id) )) {
         return false;
        }
 
        return true;
    }
    else {
    return new WP_Error( 'invalid-method', 'You must specify a valid username and password.', array( 'status' => 400 /* Bad Request */ ) );
    }
 }

/**
 * Inserts a log into the database
 *
 *@param $data array An array of key => value pairs to be inserted
 *@return int The log ID of the created activity log. Or WP_Error or false on failure.
*/
function insert_post_like( $request_data=array() ){
    global $wpdb; 

        
        // TODO: Run real code here.
        $parameters = $request_data->get_params();
        $user_email = $parameters['user_email'];
        $post_id = $parameters['post_id'];
        $is_liked = 1;
        $date_modified = current_time('timestamp');  

        $sql = "INSERT INTO {$wpdb->prefix}custom_like (user_email,post_id) VALUES (%s,%d) ON DUPLICATE KEY UPDATE is_liked = !is_liked";
        // var_dump($sql); // debug
        $sql = $wpdb->prepare($sql,$user_email,$post_id);
        // var_dump($sql); // debug
        return $wpdb->query($sql);      

        
        /*$wpdb->insert( 'wp_custom_like', array( 'user_email' =>
        $user_email, 'post_id' => $post_id, 'is_liked' =>
        $is_liked, 'date_modified' =>$date_modified )); */   
        
        //return $wpdb->insert_id; 
        
}
?>