<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpdf_library {
    function load($html)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}