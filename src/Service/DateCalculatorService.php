<?php

/**
 * Service to calculate salary and bonus dates.
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace SalaryCalculator\Service;

use DateTime;

class DateCalculatorService implements DateCalculatorInterface
{
    /**
     * BONUS_DAY
     *
     * @var string
     */
    const BONUS_DAY = '+14 day';
    /**
     * DATE_FORMAT
     *
     * @var string
     */
    const DATE_FORMAT = 'd-m-Y';
    /**
     * WEEKEND_DAYS
     *
     * @var array
     */
    const WEEKEND_DAYS = [0, 6];

    /**
     * Get data with payment date, bonus date and month column.
     *
     * @param  int $year
     * @return array
     */
    public function getMonthlyDatesByYear(int $year): array
    {
        $data = [];
        $month = $year == date('Y') ? (int) date('m') : 1;
        for ($month; $month <= 12; $month++) {
            $data[] = $this->getDates($month, $year);
        }
        return $data;
    }

    /**
     * Get monthly dates for salary and bonus.
     *
     * @param  int $month
     * @param  int $year
     * @return array
     */
    private function getDates(int $month, int $year): array
    {
        $bonusDay = date_create($year . '-' . $month . '-1');
        $bonusDay->modify(self::BONUS_DAY);
        $paymentDate = date_create($bonusDay->format('Y-m-t'));

        if ($this->isWeekend($paymentDate)) {
            $paymentDate->modify('last Friday of this month');
        }

        if ($this->isWeekend($bonusDay)) {
            $bonusDay->modify('next Wednesday');
        }

        return [
            'month' => $paymentDate->format('F-Y'),
            'paymentDate' => $paymentDate->format(self::DATE_FORMAT),
            'bonusDate' => $bonusDay->format(self::DATE_FORMAT),
        ];
    }

    /**
     * Checks if it is a Weekend.
     *
     * @param DateTime $date
     *
     * @return bool
     */
    private function isWeekend(DateTime $date): bool
    {
        return in_array($date->format('w'), self::WEEKEND_DAYS);
    }
}
