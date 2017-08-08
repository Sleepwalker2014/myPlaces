<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.08.17
 * Time: 14:23
 */

namespace Controller;

use App\Report;
use App\ReportData;
use Doctrine\ORM\EntityManager;
use Twig_Environment;

class initController {

    /**
     * initController constructor.
     *
     * @param Twig_Environment $twig
     * @param EntityManager    $entityManager
     */
    public function __construct (Twig_Environment $twig, EntityManager $entityManager) {
        /** @var Report[] $reportObjects */
        $reportObjects = $entityManager->getRepository(Report::class)
                                       ->findAll();
        $reports = [];
        foreach ($reportObjects as $report) {
            $reports[$report->getId()] = ['latitude' => $report->getLatitude(),
                                          'longitude' => $report->getLongitude()];
        }

        $reportData = $entityManager->getRepository(ReportData::class)
                                    ->findAll();


        echo $twig->render("main2.html.twig",
                           ['reports' => $reportData, 'jsonReports' => json_encode($reports)]);
    }
}