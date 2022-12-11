<!DOCTYPE html>

<?php
include 'class/autoload.php';

$lp = productos::listar();

include 'views/home.html';


