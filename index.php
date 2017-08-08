<?php

use App\ReportData;

/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 27.06.17
 * Time: 15:18
 */

require 'vendor/autoload.php';

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Router\Router;

$config = Setup::createAnnotationMetadataConfiguration(["src/php/db"], false);
$entityManager = createDoctrineEntityManager('marcelroa', 'Deutschrock1', 'marcelroa', $config);

$loader = new Twig_Loader_Filesystem(__DIR__.'/html');
$twig = new Twig_Environment($loader);

$router = new Router($twig, $entityManager);
$router->route();

/**
 * @param String        $user
 * @param String        $password
 * @param String        $database
 * @param Configuration $config
 *
 * @return EntityManager
 */
function createDoctrineEntityManager ($user, $password, $database, Configuration $config) {
    $dbParams = [
        'driver' => 'pdo_mysql',
        'user' => $user,
        'password' => $password,
        'dbname' => ''.$database.'',
    ];

    return EntityManager::create($dbParams, $config);
}
