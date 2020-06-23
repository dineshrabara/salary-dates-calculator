<?php

/**
 * Export data to csv file.
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace SalaryCalculator\Service;

use SplFileObject;

class CSVExporter implements ExportingOutputInterface
{
    /**
     * File path to save the file.
     *
     * @var string
     */
    private $filePath = 'public/CSV/';

    /**
     * Sets the file path to the required path.
     *
     * @param  string $filePath
     * @return ExportingOutputInterface
     */
    public function setPath(string $filePath): ExportingOutputInterface
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Saves data to the csv file.
     *
     * @param int $year
     * @param array $data
     * @return string
     */
    public function save(int $year, array $data): string
    {
        $csvFile = new SplFileObject($this->filePath . "$year.csv", 'w');

        // Save headers
        $csvFile->fputcsv(array_keys($data[0]));

        //Save data
        foreach ($data as $fields) {
            $csvFile->fputcsv($fields);
        }

        return $csvFile->getPathname();
    }
}
