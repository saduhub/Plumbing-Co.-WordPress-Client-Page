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

function universitySearchResults() {
  return 'Route Created.';
}