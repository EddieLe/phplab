<!DOCTYPE html>
<html>
    <head>
        <title>Detail</title>
    </head>
    <body>
        <table width="300" border="1">
            <tr>
                <th>金額</th>
                <th>提款</th>
                <th>存款</th>
                <th>餘額</th>
            </tr>
            <?php for ($i = 0; $i < count($data); $i++): ?>
            <tr>
                <th><?php echo $data[$i]['total'] ?></th>
                <th><?php echo $data[$i]['take'] ?></th>
                <th><?php echo $data[$i]['save'] ?></th>
                <th><?php echo $data[$i]['result'] ?></th>
            </tr>
            <?php endfor; ?>
        </table>
        <form method="post", action="atm">
            <input type="hidden" name="account" value=<?php echo $_POST[account] ?>>
            <input type="submit" value="轉帳頁"/>
        </form>
    </body>
</html>