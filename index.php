<?php
require './src/init.php';

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getThisFilmById(1));
