<?php

/*
 * Author: Louie Zhu
 * Date: 2/28/2016
 * File: search_movie.php
 * Description: This script searches movies by keywords in their titles. 
 * It processes requests sent from either the search form or an AJAX request.
 */

require_once 'classes/movie_manager.class.php';
require_once 'classes/search_movie.class.php';
$movie_manager = MovieManager::getMovieManager();

//search movies
if (isset($_GET['query-terms'])) { //request sent from the search form
    //retrieve query terms
    $query_terms = trim($_GET['query-terms']);

    //if search term is empty, list all movies
    if ($query_terms == "") {
        header("Location: list_movie.php");
        exit();
    }

    //search the database for matching movies
    $movies = $movie_manager->search_movie($query_terms);
    
    //something went wrong; redirect the user to display the error message
    if ($movies === false) {
        //handle error
        $message = "An error has occurred.";
        header("Location: show_error.php?eMsg=$message");
        exit();
    }
    //display matched movies
    $search = new SearchMovie();
    $search->display($query_terms, $movies);
}

//auto suggest movies
if (filter_has_var(INPUT_GET, "q")) {//process ajax request
    $query_terms = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    $movies = $movie_manager->search_movie($query_terms);
    
    //retrieve all movie titles and store them in an array
    $titles = array();
    if ($movies) {
        foreach ($movies as $movie) {
            $titles[] = $movie->getTitle();
        }
    }
    
    echo json_encode($titles);
} 