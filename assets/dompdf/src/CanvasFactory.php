<?php

namespace Dompdf;


class CanvasFactory
{
    
    private function __construct()
    {
    }

    
    static function get_instance(Dompdf $Vhvghaoacagz, $Vgyavbwa2gyd = null, $Vurj2rpl3rvw = null, $V4ulrrtmqxqc = null)
    {
        $Vkcjiwxivuno = strtolower($Vhvghaoacagz->getOptions()->getPdfBackend());

        if (isset($V4ulrrtmqxqc) && class_exists($V4ulrrtmqxqc, false)) {
            $V4ulrrtmqxqc .= "_Adapter";
        } else {
            if (($Vkcjiwxivuno === "auto" || $Vkcjiwxivuno === "pdflib") &&
                class_exists("PDFLib", false)
            ) {
                $V4ulrrtmqxqc = "Dompdf\\Adapter\\PDFLib";
            }

            else {
                if ($Vkcjiwxivuno === "gd") {
                    $V4ulrrtmqxqc = "Dompdf\\Adapter\\GD";
                } else {
                    $V4ulrrtmqxqc = "Dompdf\\Adapter\\CPDF";
                }
            }
        }

        return new $V4ulrrtmqxqc($Vgyavbwa2gyd, $Vurj2rpl3rvw, $Vhvghaoacagz);
    }
}
