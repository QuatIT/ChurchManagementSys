<?php
namespace Dompdf;


class Autoloader
{
    const PREFIX = 'Dompdf';

    
    public static function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    
    public static function autoload($V4ulrrtmqxqc)
    {
        if ($V4ulrrtmqxqc === 'Cpdf') {
            require_once __DIR__ . "/../lib/Cpdf.php";
            return;
        }

        $Vgzra1k4crpx = strlen(self::PREFIX);
        if (0 === strncmp(self::PREFIX, $V4ulrrtmqxqc, $Vgzra1k4crpx)) {
            $Vtkhurg4sowd = str_replace('\\', DIRECTORY_SEPARATOR, substr($V4ulrrtmqxqc, $Vgzra1k4crpx));
            $Vtkhurg4sowd = realpath(__DIR__ . (empty($Vtkhurg4sowd) ? '' : DIRECTORY_SEPARATOR) . $Vtkhurg4sowd . '.php');
            if (file_exists($Vtkhurg4sowd)) {
                require_once $Vtkhurg4sowd;
            }
        }
    }
}
