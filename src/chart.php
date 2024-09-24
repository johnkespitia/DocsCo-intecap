<?php
include '../vendor/autoload.php';
use Khill\Lavacharts\Lavacharts;
$lava = new Lavacharts();

$stockData = $lava->DataTable();
$stockData->addDateColumn("day");
$stockData->addNumberColumn("Projected");
$stockData->addNumberColumn("Official");

for ($i=1; $i <=  30; $i++) { 
    $stockData->addRow([
        '2015-10-' . $i,
        rand(800,1000),
        rand(800,1000)
    ]);
}

$chart = $lava->LineChart("chart", $stockData);
?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    window.google.charts.load('46', {packages: ['corechart']});
</script>
<?php
echo '<div id="stocks-chart"></div>';
echo $lava->render('LineChart', "chart", 'stocks-chart');