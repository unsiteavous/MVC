<?php
require __DIR__ . "/../src/autoload.php";

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getAllFilms()); 