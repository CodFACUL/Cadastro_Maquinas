<?php

require './vendor/autoload.php';
require_once ('./vendor/dompdf/dompdf/src/Dompdf.php');
require_once ('./vendor/dompdf/dompdf/src/Options.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class PDF{

public function pdf($conteudo){
$options = new Options();
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
ob_end_clean();

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4','portrait');

$dompdf->render();

header('Content-type: application/pdf');
echo $dompdf->output();
}



}