<!DOCTYPE html>
<html>
    <head>
        <title>ATM</title>
    </head>
    <body>
        <?php echo "帳號 :" . "$_POST[account]" . "<br>"?>
        <?php echo "剩餘額度 : $". $data['total']?>
        <form method="post", action="take">
            <input type="text" name="take" value=""/>
            <input type="hidden" name="account" value=<?php echo $_POST[account] ?>>
            <input type="submit" value="取款"/>
        </form>
        <form method="post", action="save">
            <input type="text" name="save" value=""/>
            <input type="hidden" name="account" value=<?php echo $_POST[account] ?>>
            <input type="submit" value="存款"/>
        </form>
        <form method="post", action="detail">
            <input type="hidden" name="account" value=<?php echo $_POST[account] ?>>
            <input type="submit" value="明細"/>
        </form>
    </body>
</html>