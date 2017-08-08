<?php

namespace App;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Table(name="reportData")
 * @Entity(repositoryClass="ReportDataRepository")
 */
class ReportData {
    /**
     * @var integer $id
     *
     * @Column(name="reportDate", type="bigint")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $text
     *
     * @Column(name="text", type="string", length=255, nullable=false)
     */
    private $text;

    /**
     * @var DateTime $date
     *
     * @Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @return int
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText () {
        return $this->text;
    }

    /**
     * @return String
     */
    public function getDate () {
        return $this->date->format('d.m.Y');
    }
}