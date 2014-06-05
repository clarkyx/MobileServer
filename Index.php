<?php
	if(isset($_POST['message'])){
		$endpoint = "http://clarktodolist.azure-mobile.net/tables/Messages";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'X-ZUMO-APPLICATION: MIajyClrhzybAIQfCAheCzhgmhxAYC49',
			'Accept: application/json',
			'Content-Type: application/json',
			)
		);

	$json = "{ \ "Text\": \ "".$_POST['message']."\"}";
	echo $json;

	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	$response = curl_exec($ch);

	echo $response;
	}

?>

<form method="post" action="messages.php">
<textarea name="message"></textarea>
<input type="submit" value= "Invia"/>
</form>
