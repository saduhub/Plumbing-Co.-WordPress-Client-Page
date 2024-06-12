<?php

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
  register_rest_route('university/v1', 'search', array(
    // Will be replaced to GET and will work on any server.
    'methods' => WP_REST_SERVER::READABLE,
    // Return of the funtion is the JSON that will be returned if call successful.
    'callback' => 'universitySearchResults'
  ));
}

// The code below is not valid JS (No support for associative arrays), but WP will convert PHP into JS so that the JSON can be worked with automatically.
function universitySearchResults() {
  $professors = new WP_Query(array(
    'post_type' => 'professor'
  ));

  $professorResults = array();
  // Create new array that contains only data that is wanted.
  while($professors->have_posts()) {
    $professors->the_post();
    array_push($professorResults, array(
      'title' => get_the_title(),
      'permalink' => get_the_permalink()
    ));
  }

  return $professorResults;

}