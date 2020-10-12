<?php

/**
 * Route for search By Id of repository
*/
$router->get('/Api/searchById/{id}', 'MainController@searchById');

/**
 * Route for search By Country of repository
*/
$router->get('/Api/searchByCountry/{country}', 'MainController@searchByCountry');

/**
 * Route for search By City of repository
*/
$router->get('/Api/searchByCity/{city}', 'MainController@searchByCity');


/**
 * Pass key 'skills' with post to Api url
 * key 'skills' in post must be like as : 'PHP,JAVASCRIPT,HTML,GOLANG' Seperated by with Comma ','.
*/
$router->post('/Api/searchByBestPosition', 'MainController@searchByBestPosition');
