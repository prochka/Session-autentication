<?php
require("form.php");

if ($auth->maybe()) {
    echo "Hello, " . $auth->give_login() ;
    echo "<br/><br/><a href=\"?exit=1\">Exit</a>";
}
else {
?>
<form method="post">
    <input type="text" name="l" placeholder="Enter your login" style="color: rgb(51,255,51)"/><br/>
    <br/>
    <input type="password" name="p" placeholder="Enter your password" style="color: rgb(51,255,51)"/><br/>
    <br/>
    <input type="submit" value="Enter" />
</form>
<?php

} ?>

