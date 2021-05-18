<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
    $whitespaceRemoved=preg_replace("/[ ]/","",$text);
	$non_numericRemoved=preg_replace("/[^0-9,.]+/","",$text);
	$newlinesRemoved=preg_replace("/[\n]/"," ",$text);
	$textExtracted=preg_replace("/($replaceText)/","[$replaceText]",$text);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>
            <dt>Whitespace Removed Text</dt>
            <dd><code><?= $whitespaceRemoved ?></code></dd>
            <dt>Non-numeric Characters Removed Text</dt>
            <dd><code><?= $non_numericRemoved ?></code></dd>
			<dt>&nbsp;</dt>
            <dt>New Lines Removed Text</dt>
            <dd><code><?= $newlinesRemoved ?></code></dd>
            <dt>&nbsp;</dt>
            <dt>Text extracted</dt>
            <dd><code><?= $textExtracted ?></code></dd>
            <dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
