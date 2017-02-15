<!DOCTYPE HTML>
<html>

<head>  
 <title>Basic HTML5 Column Chart </title>
  <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Fizy Kış Konserleri Başvuru Sayısı"    
      },
      animationEnabled: true,
      axisY: {
        title: "Başvuru Sayısı"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "grey",
        legendText: "Biletler çift kişiliktir.",
        dataPoints: [      
        <?php
        ini_set('display_errors', 1);
        require("funcs/dbFunctions.php");
        getConcertRating()
        ?>
     
        {y: 0,  label: "Diger"}        
        ]
      }   
      ]
    });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
  <body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
    </div>
  </body>
</html>