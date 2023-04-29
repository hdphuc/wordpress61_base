<?php
// Add this code to your functions.php file
function latest_posts($request)
{
    // Get the latest 10 posts
    $posts = get_posts(array(
        'numberposts' => 10
    ));

    // Return the posts as JSON
    return rest_ensure_response($posts);
}

function webhook($request)
{
     // Get the JSON data from the request body
  $data = json_decode( $request->get_body(), true );

  // Do something with the data, e.g. validate, sanitize, process, etc.

  // Return a JSON response with the data
  return rest_ensure_response( $data );
}

// Register the custom endpoint
function register_latest_posts_route()
{
    register_rest_route('api/v1', '/latest-posts', array(
        'methods' => 'GET',
        'callback' => 'latest_posts',
    ));

    // add webhook for post
    register_rest_route('api/v1', '/webhook', array(
        'methods' => 'POST',
        'callback' => 'webhook',
    ));
}


// Hook into the rest_api_init action
add_action('rest_api_init', 'register_latest_posts_route');
