<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define("DOMPDF_ENABLE_HTML5PARSER", true);
define("DOMPDF_ENABLE_FONTSUBSETTING", true);
define("DOMPDF_UNICODE_ENABLED", true);
define("DOMPDF_DPI", 120);
define("DOMPDF_ENABLE_CSS_FLOAT", true);

require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;



class Pdfgenerator {

    public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
    {

        /*for image */
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);


        /*----------*/
        //$dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();



//    $dompdf->stream(); /*this line generate pdf */
//    if ($stream) {
//        $dompdf->stream('my.pdf',array('Attachment'=>0));
//    } else {
//        return $dompdf->output();
//    }
        /*----*/


        $dompdf->stream($filename,array('Attachment'=>false));
    }


}
