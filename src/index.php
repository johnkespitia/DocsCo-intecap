<?php
include '../vendor/autoload.php';

use Dompdf\Dompdf;
$dpf = new Dompdf();
$dpf->loadHtml(<<<EOF
<h1 style="color:red">Hola a todos</h1>
<h2>Este es mi primer PDF </h2>
<p>Siganme para más "consejos"</p>
EOF);
$dpf->setPaper("letter");
$dpf->render();
$dpf->stream();