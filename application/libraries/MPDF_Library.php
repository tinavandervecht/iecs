<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MPDF_Library {
    function load($html)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}