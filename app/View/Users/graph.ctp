<script>
    /********* Javascript Generated with phpChart **********/
    var _chart1_plot_properties;
    $(document).ready(function(){
        _chart1_plot_properties = {
            "legend":{
                "show":true
            },"seriesDefaults":{
                "renderer":$.jqplot.DonutRenderer,"rendererOptions":{
                    "showDataLabels":true,"dataLabels":"value"
                }
            }
        }



        $.jqplot.config.enablePlugins = true;
        $.jqplot.config.defaultHeight = 300;
        $.jqplot.config.defaultWidth  = 400;
        _chart1= $.jqplot("chart1", [[["a",20],["b",2],["c",2],["d",2]]], _chart1_plot_properties);


    });
</script>

<?php
//require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>phpChart - Donut Chart</title>
    <style type="text/css">
        .jqplot-cursor-legend {
            width: 160px;
            font-family: "Courier New";
            font-size: 0.85em;
        }

        td.jqplot-cursor-legend-swatch {
            width: 1.3em;
        }

        div.jqplot-cursor-legend-swatch {
            /*      width: 15px;*/
        }
    </style>

</head>
<body>
<div><span> </span><span id="info1b"></span></div>

<?php


$s1 = array(array('a',20), array('b',2), array('c',2), array('d',2));

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Chart 1 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$pc = new C_PhpChartX(array($s1),'chart1');

$pc->set_series_default(array(
    'renderer'=>'plugin::DonutRenderer',
    'rendererOptions'=>array('showDataLabels'=>true,'dataLabels'=>'value')));
$pc->set_legend(array('show'=>true));

$pc->draw(300,300);
?>

</body>
</html>
