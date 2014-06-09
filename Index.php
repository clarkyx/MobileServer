<?php
 
if( isset($_POST['message']) ) {
 
	$ch = curl_init();
	$site = "https://clarktodolist.azure-mobile.net/tables/TodoItem";
	curl_setopt($ch, CURLOPT_URL, $site);
	 
	// Set so curl_exec returns the result instead of outputting it.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'X-ZUMO-APPLICATION: UKNEhlakOguCMfQkwzBXNCDldAIYNv41',
	    'Accept: application/json',
	    'Content-Type: application/json'
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
 
<form method="post" action="Index.php">
<textarea name="message"></textarea>
<input type="submit" value="TryOut"/>
</form>
