<?php
/**
* Plugin Name: Premium Membership Plugin
* Plugin URI: https://www.saabdik.com/
* Description: This is the plugin for Premium Membership.
* Version: 1.0
* Author: Niloy Sarkar
* Author URI: http://saabdik.com/
**/

function premium_membership_create_db() {
 global $wpdb;
 $charset_collate = $wpdb->get_charset_collate();
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

 //* Create the teams table
 $table_name = $wpdb->prefix . 'premium_membership';
 $sql = "CREATE TABLE $table_name (
 id INTEGER NOT NULL AUTO_INCREMENT,
 name TEXT NOT NULL,
 email TEXT NOT NULL,
 phone INTEGER NOT NULL,
 plan ENUM('free','selver','gold', 'platinum') DEFAULT 'free' NOT NULL,
 periods INTEGER NOT NULL,
 date_created TIMESTAMP NOT NULL,
 ip TEXT NOT NULL,
 PRIMARY KEY (id)
 ) $charset_collate;";
 dbDelta( $sql );
}

register_activation_hook( __FILE__, 'premium_membership_create_db' );

//add resp api custom end-points

add_action( 'rest_api_init', function () {
      register_rest_route( 'premium_membership/v1', '/get_details/', array(
            'methods' => 'GET',
            'callback' => 'find_membership',
      ) );
      register_rest_route( 'premium_membership/v1', '/update_membership/', array(
            'methods' => 'GET',
            'callback' => 'update_membership',
        ) );


    } 
);

function get_premium_author_posts( $data ) {
  $posts = get_posts( array(
    'author' => $data['id'],
  ) );
 
  if ( empty( $posts ) ) {
    return null;
  }
 
  return $posts[0]->post_title;
}

/**
 * Retrieves detail membership plan for an user from the database matching $query.
 * $query is an array which can contain the following keys:
 *
*/
function find_membership( $request_data=array() ){
 
     global $wpdb;
     $parameters = $request_data->get_params();
     $email = $parameters['email'];

      $wpdb->premium_membership = $wpdb->prefix . "premium_membership"; 
     
    $sql = "SELECT * from $wpdb->premium_membership WHERE email='$email'";
    /* Perform query */
    $results = $wpdb->get_results($sql);

    return $results;
 }

/**
 * Inserts a log into the database
 *
 *@param $data array An array of key => value pairs to be inserted
 *@return int The log ID of the created activity log. Or WP_Error or false on failure.
*/
function update_membership( $request_data=array() ){
    global $wpdb;        
 
    //Set default values
    /*$data = wp_parse_args($data, array(
                 'user_id'=> get_current_user_id(),
                 'date'=> current_time('timestamp'),
    )); */   

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
        if ( ! current_user_can( $this->required_capability ) ) {
            return new WP_Error( 'rest_forbidden', 'You do not have permissions to view this data.', array( 'status' => 401 ) );
        }
        
        // TODO: Run real code here.
        $parameters = $request_data->get_params();
        $post_type = $parameters['post_type'];

        $data = wp_parse_args($data, array(
                     'date'=> current_time('timestamp'),
        ));
     
        //Check date validity
        /*if( !is_float($data['date']) || $data['date'] <= 0 )
            return 0;*/

        
        $wpdb->insert( 'wp_premium_membership', array( 'name' =>
        'Niloy', 'email' => 'mail2niloy@gmail.com', 'phone' =>
        '9836304396', 'plan' => 'free',
        'periods' => '30', 'date_created' =>
        '', 'ip' => '127.0.0.1' ));    
        
        return $wpdb->insert_id; 
    }
    else {
        return new WP_Error( 'invalid-method', 'You must specify a valid username and password.', array( 'status' => 400 /* Bad Request */ ) );
    }
    

    
}

/**
 * Updates an activity log with supplied data
 *
 *@param $log_id int ID of the activity log to be updated
 *@param $data array An array of column=>value pairs to be updated
 *@return bool Whether the log was successfully updated.
*/
function wptuts_update_log( $log_id, $data=array() ){
    global $wpdb;        
 
    //Log ID must be positive integer
    $log_id = absint($log_id);     
    if( empty($log_id) )
         return false;
 
    //Convert activity date from local timestamp to GMT mysql format
    if( isset($data['activity_date']) )
         $data['activity_date'] = date_i18n( 'Y-m-d H:i:s', $data['date'], true );
 
 
    //Initialise column format array
    $column_formats = wptuts_get_log_table_columns();
 
    //Force fields to lower case
    $data = array_change_key_case ( $data );
 
    //White list columns
    $data = array_intersect_key($data, $column_formats);
 
    //Reorder $column_formats to match the order of columns given in $data
    $data_keys = array_keys($data);
    $column_formats = array_merge(array_flip($data_keys), $column_formats);
 
    if ( false === $wpdb->update($wpdb->wptuts_activity_log, $data, array('log_id'=>$log_id), $column_formats) ) {
         return false;
    }
 
    return true;
}



 /**
 * Deletes an activity log from the database
 *
 *@param $log_id int ID of the activity log to be deleted
 *@return bool Whether the log was successfully deleted.
*/
function wptuts_delete_log( $log_id ){
    global $wpdb;        
 
    //Log ID must be positive integer
    $log_id = absint($log_id);     
    if( empty($log_id) )
         return false;
 
    do_action('wptuts_delete_log',$log_id);
    $sql = $wpdb->prepare("DELETE from {$wpdb->wptuts_activity_log} WHERE log_id = %d", $log_id);
 
    if( !$wpdb->query( $sql ) )
         return false;
 
    do_action('wptuts_deleted_log',$log_id);
 
    return true;
}


?>