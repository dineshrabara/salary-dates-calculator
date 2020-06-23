<?php

/**
 * Interface for exporting data to a file.
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace SalaryCalculator\Service;

interface ExportingOutputInterface
{
    /**
     * Sets the file path to the required path.
     *
     * @param  string $filePath
     * @return ExportingOutputInterface
     */
    public function setPath(string $filePath): self;

    /**
     * Saves data to the csv file.
     *
     * @param int $year
     * @param array $data
     * @return string
     */
    public function save(int $year, array $data): string;
}
