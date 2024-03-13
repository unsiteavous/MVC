<?php
require_once "./src/init.php";

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getAllFilms());
