<?php
/**
 * Trait ExportTrait | src/NBG/ExportTrait.php
 *
 * PHP version 7
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @version  GIT: $Id$.
 * @link     https://github.com/ABGEO07/nbg-currency
 */

namespace ABGEO\NBG;

/**
 * Trait ExportTrait
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */
trait ExportTrait
{
    /**
     * Export Currency to file.
     *
     * @param mixed       $currencies Single Currency Code or array.
     * @param int         $exportMode Export Mode (1: To file; 2: To stream).
     * @param string|null $file       Filename.
     *
     * @return void
     *
     * @throws Exception\InvalidCurrencyException
     * @throws \SoapFault
     */
    public static function export(
        $currencies,
        int $exportMode = Currency::EXPORT_2_FILE,
        string $file = null
    ): void {
        // CSV Header.
        $dataToExport = [[
            'CurrencyCode',
            'Description',
            'Currency',
            'ChangeValue',
            'ChangeRate',
            'Date'
        ]];

        // Create CSV Body.
        if (is_array($currencies)) {
            // For many Currencies.

            foreach ($currencies as $currency) {
                $currencyObj = new Currency($currency);

                $singleRow = [
                    $currency,
                    $currencyObj->getDescription(),
                    $currencyObj->getCurrency(),
                    $currencyObj->getChange(),
                    $currencyObj->getRate(),
                    $currencyObj->getDate()->format('d/m/Y'),
                ];

                $dataToExport[] = $singleRow;
            }
        } else {
            // For single Currency.

            $currencyObj = new Currency($currencies);

            $dataToExport[] = [
                $currencies,
                $currencyObj->getDescription(),
                $currencyObj->getCurrency(),
                $currencyObj->getChange(),
                $currencyObj->getRate(),
                $currencyObj->getDate()->format('d/m/Y'),
            ];
        }

        // Prepare filename.
        $fileName = $file ?: 'currency-' . date('Y-m-d') . '.csv';
        $fileName = substr($fileName, -4) === '.csv'
            ? $fileName: $fileName . '.csv';

        // Export CSV.
        if (1 == $exportMode) {
            // Export to file.

            $fs = fopen($fileName, "w");

            foreach ($dataToExport as $line) {
                fputcsv($fs, $line);
            }

            fclose($fs);
        } else if (2 == $exportMode) {
            // Export to stream.

            $fs = fopen('php://output', 'w');

            ob_start();

            foreach ($dataToExport as $line) {
                fputcsv($fs, $line);
            }

            $string = ob_get_clean();

            fclose($fs);

            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '";');
            header('Content-Transfer-Encoding: binary');

            exit($string);
        }
    }
}
