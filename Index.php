<?php
 
if( isset($_POST['message']) ) {
 
	$endpoint = "https://YOUR-MOBILE-SERVICE-NAME.azure-mobile.net/tables/Messages";
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $endpoint);
	 
	// Set so curl_exec returns the result instead of outputting it.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'X-ZUMO-APPLICATION: YOUR KEY HERE',
	    'Accept: application/json',
	    'Content-Type: application/json',
	    ));	
	 
	$json = "{ \"Text\": \"".$_POST['message']."\" }";
	echo $json;
	 
	curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
	// Get the response and close the channel.
	$response = curl_exec($ch);
	curl_close($ch);
	 
	echo $response;
}
 
?>
 
<form method="post" action="messages.php">
<textarea name="message"></textarea>
<input type="submit" value="Invia"/>
</form>
