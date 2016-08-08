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
        <p></p>
        <table width="300" border="1">
            <tr>
                <th>操作</th>
                <th>金額</th>
                <th>餘額</th>
            </tr>
            <?php for ($i = 0; $i < 0; $i++): ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>