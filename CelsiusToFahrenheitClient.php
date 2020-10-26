<?php
require_once('lib/nusoap.php');
$wsdl = "https://www.w3schools.com/xml/tempconvert.asmx?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur!</h2>' . $err;
   exit();
}

$old=$_POST['num'];
$result=$client->call('CelsiusToFahrenheit', array('Celsius'=>$_POST['num']));

?>
<h2> Fahrenheit to Celsius conversion (°F to °C) </h2>
<form  method="post">
    <input type="text" id="num" name="num" value="" >
    <input type="submit" value="convert">
    
</form>
<?php
      if(($result['CelsiusToFahrenheitResult']) != 'Error'){
      echo $old. ' Celcius = ' .($result['CelsiusToFahrenheitResult']) . ' Fahrenheit.' ;
      }else{
          echo 'enter a valid number';
      }
      
      ?>