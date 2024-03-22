<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Check Sites</title>
<meta name="generator" content="Geany 1.36" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<?php
	$sites = array(
		"https://www.facebook.com/",
		"https://www.google.com/"
	);

	$message = 'Risultato:'."\n";

	foreach ($sites as $site) {
		$res = get_http_response_code($site);
		if ($res !== '200') {
			$message .= $site.": ".$res."\r\n";
		} else {
			$message .= $site.": OK"."\r\n";
		}
	}
	echo "<pre>";
	echo "RES = ".$message;
	echo "</pre>";

	function get_http_response_code($theURL) {
		$headers = get_headers($theURL);
		return substr($headers[0], 9, 3);
	}
	?>
</body>

</html>



