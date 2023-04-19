<?php
declare(strict_types=1);

namespace App\Services\Payments;

class ParserCsvService
{
    /**
     * @param string $filename
     * @param string $delimiter
     * @return \Generator
     */
    public static function parseCsv(string $filename = '', string $delimiter = ','): \Generator
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header) {
                    $header = $row;
                } else {
                    yield array_combine($header, $row);
                }
            }
            fclose($handle);
        }
    }
}
