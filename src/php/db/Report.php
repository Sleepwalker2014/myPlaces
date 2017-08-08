<?php

namespace App;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Table(name="reports")
 * @Entity(repositoryClass="ReportRepository")
 */
class Report {
    /**
     * @var integer $id
     *
     * @Column(name="report", type="bigint")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $longitude
     *
     * @Column(name="longitude", type="float", length=100, nullable=false)
     */
    private $longitude;

    /**
     * @var string $latitude
     *
     * @Column(name="latitude", type="float", length=100, nullable=false)
     */
    private $latitude;

    /**
     * @return int
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLongitude () {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getLatitude () {
        return $this->latitude;
    }
}