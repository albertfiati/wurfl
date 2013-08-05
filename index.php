<?php
//Include the configuration file
include_once './wurfl-php-1.4.1/examples/demo/inc/wurfl_config_standard.php';

$wurflInfo = $wurflManager->getWURFLInfo();

if (isset($_GET['ua']) && trim($_GET['ua'])) {
	$ua = $_GET['ua'];
	$requestingDevice = $wurflManager->getDeviceForUserAgent($_GET['ua']);
} else {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	// This line detects the visiting device by looking at its HTTP Request ($_SERVER)
	$requestingDevice = $wurflManager->getDeviceForHttpRequest($_SERVER);
	print($ua);
}

$resultJSON = json_encode(
						    array(
							  "brand"=>$requestingDevice->getCapability("brand_name"),
							  "model"=>$requestingDevice->getCapability("model_name"),
							  "width"=>$requestingDevice->getCapability("resolution_width"),
							  "height"=>$requestingDevice->getCapability("resolution_height"),
							  "wireless_device"=>$requestingDevice->getCapability("is_wireless_device"),
							  "device_os"=>$requestingDevice->getCapability("device_os"),
							  "mobile_browser"=>$requestingDevice->getCapability("mobile_browser")
							)
						);
					
//print($resultJSON);

?>