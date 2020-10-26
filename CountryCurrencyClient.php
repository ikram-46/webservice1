<form  method="post">
    <h2>***Country Currency *** </h2>
    <strong>CountryISOCode :</strong>
    <input type="text"  name="getCurrency" >
    <input type="submit" value="Get Currency">  
</form>
<?php
require_once('lib\nusoap.php');
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";

$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}

$result=$client->call('CountryCurrency', array('sCountryISOCode'=>$_POST['getCurrency']));
foreach((array)($result['CountryCurrencyResult']) as $valeur){
    echo ' <strong>'.$valeur.'</strong><br>';
}

?>
