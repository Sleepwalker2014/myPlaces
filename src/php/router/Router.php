<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.08.17
 * Time: 13:35
 */

namespace Router;

use Controller\initController;
use Doctrine\ORM\EntityManager;
use Twig_Environment;

class Router {
    /**
     * @var Twig_Environment
     */
    private $twig;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Router constructor.
     *
     * @param Twig_Environment $twig
     * @param EntityManager    $entityManager
     */
    public function __construct (Twig_Environment $twig, EntityManager $entityManager) {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    public function route () {
        if (!isset($_POST['action'])) {
            new initController($this->twig, $this->entityManager);
        }
    }
}