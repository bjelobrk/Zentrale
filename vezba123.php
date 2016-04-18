<?php
$result = PIPHP_CreateCaptcha(26, 8, 'captcha.ttf', '',
'!*a&K', '.fs£!+');
echo <<<_END
<img src="$result[2]" /><br />
Please enter the word shown<br />
<form method="post" action="checkcaptcha.php">
<input type="hidden" name="token" value="$result[1]" />
<input type="text" name="captcha" />
<input type="submit" />
</form>
_END;
?>