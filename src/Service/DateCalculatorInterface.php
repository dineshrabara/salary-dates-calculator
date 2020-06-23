<?php

/**
 * Interface to calculate the dates.
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace SalaryCalculator\Service;

interface DateCalculatorInterface
{
    /**
     * Get data with payment date, bonus date and month column.
     *
     * @param  int $year
     * @return array
     */
    public function getMonthlyDatesByYear(int $year): array;
}
