<?

$hostname="localhost";
$username="hebbel_db";
$password="sisichal";
$dbname="hebbel";

 $link=mysqli_connect($hostname,$username,$password) or die ("html>script language='JavaScript'>alert('Leider war der Zugriff auf die Datenbank erfolglos!'),history.go(-1)/script>/html>");
 mysqli_select_db($link,$dbname);



include ("jpgraph/src/jpgraph.php");
include ("jpgraph/src/jpgraph_line.php");

require_once ("jpgraph/src/jpgraph_line.php");
require_once ("jpgraph/src/jpgraph_utils.inc.php");
require_once ("jpgraph/src/jpg-config.inc.php");


            // Width and height of the graph
$width = 1000; $height = 200;

         // Create a graph instance
$graph = new Graph($width,$height);






$selection = "SELECT v FROM `wind`";

 $result = mysqli_query($link,$selection);
      

$ydata=array();
while($row = mysqli_fetch_array($result)){
$ydata=array_merge($ydata,array($row[0]));

};


//creating X-Axis with values
$selection2 = "SELECT time FROM `wind` ";

$result = mysqli_query($link,$selection2);
	

        

$ydata2=array();
while($row = mysqli_fetch_array($result)){
$graph->xaxis->SetTickLabels($ydata2=array_merge($ydata2,array($row[0])));
};

$xmin=0.1;
$xmax=10;

$graph = new Graph(550,350);
$graph->SetScale('intlin',0,0,$xmin,$xmax);
$graph->title->Set('Windgeschwindigkeit');
$graph->xaxis->SetPos('stunden');
$graph->xaxis->SetTickPositions($datax);
$graph->xaxis->SetLabelFormatString('H:i',true);
$graph->xaxis->SetLabelAngle(90);
$graph->xgrid->Show();


$lineplot=new LinePlot($ydata);


//set colour to the graph
$lineplot->SetColor("#810447");

        // Add the plot to the graph
$graph->Add($lineplot);

        // Display the graph
$graph->Stroke();

?>