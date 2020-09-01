<?php
/**
* Plugin Name: Saabdik Rest Api Plugin
* Plugin URI: https://www.saabdik.com/
* Description: This is the plugin for custom api call.
* Version: 1.0
* Author: Niloy Sarkar
* Author URI: http://saabdik.com/
**/

  
 
   function register_routes() {
    $my_namespace = 'saabdik_rest_api/v';
    $my_version   = '1';
    $namespace = $my_namespace . $my_version;

    register_rest_route(  $namespace, '/author_posts', array(
        'methods' => 'GET',
        'callback' => 'get_author_posts',
      ) );

    register_rest_route(  $namespace, '/filtered_posts', array(
        'methods' => 'GET',
        'callback' => 'get_filtered_posts',
      ) );

    register_rest_route(  $namespace, '/authors', array(
      'methods' => 'GET',
      'callback' => 'get_all_authors',
    ) );

    register_rest_route(  $namespace, '/posts', array(
      'methods' => 'GET',
      'callback' => 'get_app_front_posts',
    ) );

    register_rest_route(  $namespace, '/categories', array(
      'methods' => 'GET',
      'callback' => 'get_app_categories',
    ) );

    register_rest_route( 'myplugin/v1', '/author/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'my_awesome_func',
  ) );

  }
 
  // Register our REST Server

  add_action( 'rest_api_init', 'register_routes');
  
 function my_awesome_func( $data ) {
  $posts = get_posts( array(
    'author' => $data['id'],
  ) );
 
  if ( empty( $posts ) ) {
    return null;
  }
 
  return $posts[0]->post_title;
}


function get_app_categories( WP_REST_Request $request ) {
    
    /*$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
    ) );*/

    $terms = apply_filters( 'taxonomy-images-get-terms', '' );
    $categories = array();
    if ( ! empty( $terms ) ) {
        
        foreach ( (array) $terms as $term ) {
        $img_id=$term->image_id;
        $category = array();
        $category['id']  = $term->term_id;
        $category['cat_image'] = wp_get_attachment_image_url( $term->image_id, 'vignette_coul' ); // Image
        $category['cat_esc_url']  = esc_url( get_term_link( $term, $term->taxonomy ) ) ;
        /*$category['cat_image']  = wp_get_attachment_image( $img_id, $size='thumbnail', $icon=false,array( "class" => "img-responsive" )); */
         $category['name']  = $term->name;
          $categories[] =   $category;
          
        }
       
    }

    return $categories;
}
  $search_title_like="";
  function get_filtered_posts(WP_REST_Request $request)
  {
    
    global $search_title_like;
    $posts_per_page ="10";
    $paged=1;
    $category="";
    $tag="";
    $orderby="DESC";
    $order="date";

    if( isset( $_REQUEST[ 'category']))
    {
        $category=$_REQUEST[ 'category'];
    }
    if( isset( $_REQUEST[ 'tag']))
    {
        $tag=$_REQUEST[ 'tag'];
    }
    if( isset( $_REQUEST[ 'posts_per_page']))
    {
        $posts_per_page=$_REQUEST[ 'posts_per_page'];
    }
    if( isset( $_REQUEST[ 'orderby']))
    {
        $orderby=$_REQUEST[ 'orderby'];
    }
    if( isset( $_REQUEST[ 'order']))
    {
        $order=$_REQUEST[ 'order'];
    }
    if( isset( $_REQUEST[ 'paged']))
    {
        $paged=$_REQUEST[ 'paged'];
    }
    if( isset( $_REQUEST[ 'search_title_like']))
    {
        $search_title_like=$_REQUEST[ 'search_title_like'];
    }

    $args = array(
        'posts_per_page'   => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'tag' => $tag,
        'paged' =>$paged,
        'category' =>$category,
        'suppress_filters' => false, // important!
    );
    if(isset( $_REQUEST[ 'search_title_like']))
    {
        add_filter( 'posts_where', 'my_filter_post_where' );
        $posts = get_posts( $args );
        remove_filter( 'posts_where', 'my_filter_post_where' );
    }
    else{
        $posts = get_posts($args);
    }
    
    $fields = array('post_title', 'ID', 'post_author' );
    $customPost = array();
    foreach($posts as $post) {

        $newPost = array();

        $author_id = $post->post_author;
        $newPost['audio_playlist'] =get_post_meta(  $post->ID, 'audio_playlist', true );
        $newPost['video_playlist'] =get_post_meta(  $post->ID, 'video_playlist', true );
        $newPost['author_display_name'] = get_the_author_meta( 'display_name', $author_id );
        $newPost['thumbnail_image_src'] = get_the_post_thumbnail_url( $post->ID,'thumbnail' );
        $newPost['post_categories'] = wp_get_post_categories( $post->ID );
        $newPost['post_categories_details'] = get_the_category( $post->ID );
        $newPost['tags'] = get_the_tags( $post->ID);


      foreach($fields as $field) {
        $newPost[$field] = $post->$field;
      }

      $customPost[] = $newPost;
      
    }
        
    return $customPost;
  }
  function my_filter_post_where( $where) {
    global $wpdb;
    global $search_title_like;

    $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_title_like ) ) . '%\'';

    return $where;
  }
  function get_app_front_posts()
  {
    $args = array(
        'posts_per_page'   => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag' => 'V2'
    );

    $posts['latest'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag' => 'popular'
    );

    $posts['popular'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['chotogolpo'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 28,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['onugolpo'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 12,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['bises-rochona'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 6,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['kobita'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 21,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['dharabahik-rachona'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 15,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['bhraman'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 7,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['khalar-dunia'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 4,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['rahoshyo-golpo'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 44,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['bhuter-golpo'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 8,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['itihaser-patai'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 67,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['life-style'] = get_posts($args);
    $args = array(
        'posts_per_page'   => 10,
        'category'         => 10,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['heseler-katha'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 71,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['puran-katha'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 70,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['photography'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 73,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['jibon-kahini'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 72,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['desh-bidesh'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 74,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['fitness'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 78,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['book-review'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 77,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['hashir-golpo'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 76,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['moner-katha'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 79,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['beginners-guide'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 80,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['inspiration'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 69,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['aalap'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 81,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['fashion'] = get_posts($args);

    $args = array(
        'posts_per_page'   => 10,
        'category'         => 29,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['bises-sonkhya'] = get_posts($args);

$args = array(
        'posts_per_page'   => 10,
        'tag'         => 'puja-2019',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['puja-sonkhya'] = get_posts($args);

$args = array(
        'posts_per_page'   => 10,
        'category'         => 65,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['news'] = get_posts($args);

$args = array(
        'posts_per_page'   => 10,
        'category'         => 66,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $posts['announcement'] = get_posts($args);
    $fields = array('post_title', 'ID', 'post_author' );
    //var_dump($posts);
    //return $posts;
    foreach($posts as $key=>$post_type) {
        $customPost = array();
        //echo $key;
        foreach($post_type as $post) {

          $newPost = array();

            $author_id = $post->post_author;
            $newPost['audio_playlist'] =get_post_meta(  $post->ID, 'audio_playlist', true );
            $newPost['video_playlist'] =get_post_meta(  $post->ID, 'video_playlist', true );
            $newPost['author_display_name'] = get_the_author_meta( 'display_name', $author_id );
            $newPost['thumbnail_image_src'] = get_the_post_thumbnail_url( $post->ID,'thumbnail' );
            $newPost['post_categories'] = wp_get_post_categories( $post->ID );
            $newPost['post_categories_details'] = get_the_category( $post->ID );
            $newPost['tags'] = get_the_tags( $post->ID);

          foreach($fields as $field) {
            $newPost[$field] = $post->$field;
          }

          $customPost[] = $newPost;
          
        }
        
        $return[$key] = $customPost;
    }
    return $return;
  }

  

  function get_author_posts() {
    $posts_per_page ="10";
    $paged=1;
    $category="";
    $tag="";
    $orderby="DESC";
    $order="date";

    if( isset( $_REQUEST[ 'tag']))
    {
        $tag=$_REQUEST[ 'tag'];
    }
    if( isset( $_REQUEST[ 'posts_per_page']))
    {
        $posts_per_page=$_REQUEST[ 'posts_per_page'];
    }
    if( isset( $_REQUEST[ 'orderby']))
    {
        $orderby=$_REQUEST[ 'orderby'];
    }
    if( isset( $_REQUEST[ 'order']))
    {
        $order=$_REQUEST[ 'order'];
    }
    if( isset( $_REQUEST[ 'paged']))
    {
        $paged=$_REQUEST[ 'paged'];
    }
    $posts = get_posts( array(
        'author' => $_REQUEST['author_id'],
        'posts_per_page'   => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'tag' => $tag,
        'paged' =>$paged,
    ) );
   
    if ( empty( $posts ) ) {
      return null;
    }

    $fields = array('post_title', 'ID', 'post_author' );
    $customPost = array();
    foreach($posts as $post) {

        $newPost = array();
        $author_id = $post->post_author;
        $newPost['audio_playlist'] =get_post_meta(  $post->ID, 'audio_playlist', true );
        $newPost['video_playlist'] =get_post_meta(  $post->ID, 'video_playlist', true );
        $newPost['author_display_name'] = get_the_author_meta( 'display_name', $author_id );
        $newPost['thumbnail_image_src'] = get_the_post_thumbnail_url( $post->ID,'thumbnail' );
        $newPost['post_categories'] = wp_get_post_categories( $post->ID );
        $newPost['post_categories_details'] = get_the_category( $post->ID );
        $newPost['tags'] = get_the_tags( $post->ID);


      foreach($fields as $field) {
        $newPost[$field] = $post->$field;
      }

      $customPost[] = $newPost;
      
    }
        
    return $customPost;
  }

  /*function get_all_authors1(  ) {
    $authors = wp_list_authors( array(
      'orderby'       => 'name',
      'order'         => 'ASC',
      'number'        => '',
      'optioncount'   => false,
      'exclude_admin' => true,
      'show_fullname' => false,
      'hide_empty'    => true,
      'feed'          => '',
      'feed_image'    => '',
      'feed_type'     => '',
      'echo'          => true,
      'style'         => 'list',
      'html'          => false,
      'exclude'       => '',
      'include'       => '',
    ) );
   
    if ( empty( $authors ) ) {
      return null;
    }
   
    return json_decode( $authors );
  }*/

  function get_all_authors() {
    global $wpdb;
    $authors = array();
    foreach ( $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author  ORDER BY count DESC") as $row ) :
        $author = get_userdata( $row->post_author );
        $data_array['id'] = $author->id;
        $data_array['name'] = $author->display_name;
        $data_array['photo'] = $author->basic_user_avatar;
        $data_array['phone'] = $author->billing_phone;
        $data_array['description'] = $author->description;
        $data_array['post_count'] = $row->count;
        $data_array['posts_url'] = get_author_posts_url( $author->ID, $author->user_nicename );
        $authors[]=$data_array;
    endforeach;

    return $authors;
}



?>