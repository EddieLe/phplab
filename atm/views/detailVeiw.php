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
            <?php for ($i = 0; $i < count($data['id']); $i++): ?>
            <tr>
                <th><?php echo $data['total'][$i] ?></th>
                <th><?php echo $data['take'][$i] ?></th>
                <th><?php echo $data['save'][$i] ?></th>
                <th><?php echo $data['result'][$i] ?></th>
            </tr>
            <?php endfor; ?>
        </table>
        <form method="post", action="atm">
            <input type="hidden" name="account" value=<?php echo $_POST[account] ?>>
            <input type="submit" value="轉帳頁"/>
        </form>
    </body>
</html>