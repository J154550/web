<?

$hostname="localhost";
$username="hebbel_db";
$password="sisichal";
$dbname="hebbel";

 $link=mysqli_connect($hostname,$username,$password) or die ("html>script language='JavaScript'>alert('Leider war der Zugriff auf die Datenbank erfolglos!'),history.go(-1)/script>/html>");
 mysqli_select_db($link,$dbname);




$selection = "SELECT luftfeuchtigkeit FROM `kai`";
$selection2 = "SELECT zeit FROM `kai`";

 $result = mysqli_query($link,$selection);
 $result2 = mysqli_query($link,$selection2);
      

$ydata=array();
while($row = mysqli_fetch_array($result)){
$ydata=array_merge($ydata,array($row[0]));

};
$tdata=array();
while($row2 = mysqli_fetch_array($result2)){
$tdata=array_merge($tdata,array($row2[0]));

};

print($ydata[0]);
echo "----";
print($tdata[0]);


?>
