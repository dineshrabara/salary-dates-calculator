<?php

require_once __DIR__ . '/../vendor/autoload.php';

use SalaryCalculator\Controller\SalaryController;
use SalaryCalculator\Service\CSVExporter;
use SalaryCalculator\Service\DateCalculatorService as Service;

$year = 2020;

if (!empty($argv[1])) {
    $year = (int) $argv[1];
}

$salaryController = new SalaryController(new Service(), new CSVExporter());

echo $salaryController->exportDates($year);
