<?php

/**
 * Test Date Calculator Service
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SalaryCalculator\Service\DateCalculatorService;

class DateCalculatorServiceTest extends TestCase
{
    /** @var DateCalculatorService $service */
    private $service;

    /**
     * Basic setup.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->service = new DateCalculatorService();
    }

    /**
     * Verify monthly data with return data
     * Check salary date is end of month
     * Check salary date is weekend
     * Check bonus date is weekend
     *
     * @dataProvider salaryDatesDataProvider
     * @param int $year
     * @param array $expectedOutput
     * @return void
     */
    public function testVerifyMonthlyDatesAreReturnedAsExpected(int $year, array $expectedOutput): void
    {
        $this->assertTrue(in_array($expectedOutput, $this->service->getMonthlyDatesByYear($year)));
    }

    /**
     * Verify data for only remaining months are returned in case of current year.
     *
     * @return void
     */

    public function testVerifyDataForOnlyRemainingMonthsAreReturnedInCaseOfCurrentYear(): void
    {
        //Calculate remaining months including current month
        $remainingMonths = 13 - (int) date('m');
        $this->assertCount($remainingMonths, $this->service->getMonthlyDatesByYear((int) date('Y')));
    }

    /**
     * DataProvider for testVerifyMonthlyDatesAreReturnedAsExpected.
     *
     * @return array
     */
    public function salaryDatesDataProvider(): array
    {
        return [
            'base_dates' => [
                2019, ['month' => 'January-2019', 'paymentDate' => '31-01-2019', 'bonusDate' => '15-01-2019'],
            ],
            'bonus_date_is_weekend' => [
                2019, ['month' => 'June-2019', 'paymentDate' => '28-06-2019', 'bonusDate' => '19-06-2019'],
            ],
            'payment_date_is_weekend' => [
                2019, ['month' => 'November-2019', 'paymentDate' => '29-11-2019', 'bonusDate' => '15-11-2019'],
            ],
            'payment_date_is_not_weekend' => [
                2019, ['month' => 'December-2019', 'paymentDate' => '31-12-2019', 'bonusDate' => '18-12-2019'],
            ],
        ];
    }
}
