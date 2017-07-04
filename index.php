<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 27.06.17
 * Time: 15:18
 */
require __DIR__.'/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__.'/html');
$twig = new Twig_Environment($loader);


if (isset($_POST['action'])) {
    echo $twig->render("markerDialog.html.twig",[]);
    exit(0);
}

echo $twig->render("main.html.twig",[]);