<!doctype html>
<html>
    <head></head>
    <body>
        <form method=post>
            <textarea name=lead cols=40 rows=10></textarea>
            <br>
            <input type=submit>
        </form>
    </body>
<?php
echo("<hr>Odebrano: ");
echo($_POST["lead"]);
?>
</html>