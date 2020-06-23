<?php

/**
 * Class CSVExporterTest.
 *
 * @covers \SalaryCalculator\Service\CSVExporter
 */

declare (strict_types = 1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SalaryCalculator\Service\CSVExporter;

class CSVExporterTest extends TestCase
{
    /**
     * @var CSVExporter $cSVExporter
     */
    protected $cSVExporter;

    /**
     * Basic setup.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->cSVExporter = new CSVExporter();
    }

    /**
     * Teardown files.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->cSVExporter);
        unlink("public/CSV/" . date('Y') . ".csv");
    }

    /**
     * Test to verify if CSV file is created.
     *
     * @return void
     */

    public function testVerifyCSVFileIsCreated(): void
    {
        $this->assertFileExists($this->cSVExporter->save((int) date('Y'), $this->dummyData()));
    }

    /**
     * Dummy Data
     *
     * @return array
     */
    private function dummyData(): array
    {
        return [
            ['month' => 'January-2020', 'paymentDate' => '31-01-2020', 'bonusDate' => '15-01-2020'],
            ['month' => 'February-2020', 'paymentDate' => '28-02-2020', 'bonusDate' => '19-02-2020'],
        ];
    }
}
