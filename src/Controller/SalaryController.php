<?php

/**
 * Controller for salary
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace SalaryCalculator\Controller;

use SalaryCalculator\Service\DateCalculatorInterface;
use SalaryCalculator\Service\ExportingOutputInterface;

class SalaryController
{
    /** @var DateCalculatorInterface $dateCalculator */
    private $dateCalculator;

    /** @var ExportingOutputInterface $csvExporter*/
    private $csvExporter;

    /**
     * @param  DateCalculatorInterface $dateCalculator
     * @param  ExportingOutputInterface $csvExporter
     * @return void
     */
    public function __construct(DateCalculatorInterface $dateCalculator, ExportingOutputInterface $csvExporter)
    {
        $this->dateCalculator = $dateCalculator;
        $this->csvExporter = $csvExporter;
    }

    /**
     * Export Yearly Dates
     *
     * @param int $year
     * @return string
     */
    public function exportDates(int $year): string
    {
        return $this->csvExporter->save($year, $this->dateCalculator->getMonthlyDatesByYear($year));
    }

}
