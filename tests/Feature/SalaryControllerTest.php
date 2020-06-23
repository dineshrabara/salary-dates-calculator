<?php

/**
 * SalaryControllerTest
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use SalaryCalculator\Controller\SalaryController;
use SalaryCalculator\Service\CSVExporter;
use SalaryCalculator\Service\DateCalculatorService;

class SalaryControllerTest extends TestCase
{
    /** @var SalaryController $salaryController */
    private $salaryController;

    /**
     * Basic setup.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->salaryController = new SalaryController(new DateCalculatorService(), new CSVExporter());
    }

    /**
     * Teardown files.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        $year = date('Y');
        unlink("public/CSV/$year.csv");
    }

    /**
     * Test to verify if CSV file is created.
     *
     * @return void
     */
    public function testVerifyCSVFileIsCreated()
    {
        $this->assertFileExists($this->salaryController->exportDates((int) date('Y')));
    }
}
