<?php
    declare(strict_types=1);
    require_once dirname(__FILE__) . '/functions.php';

    //try {
    if (!isset($_GET['name']) || trim($_GET['name']) === '') {
            return;
        }
        $pdo = connect();
        $statement =  $pdo->prepare('SELECT * FROM user WHERE name LIKE :name');
        $statement->bindValue(':name', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
        $statement->execute();
    //} catch (PDOException $e) {
        //echo 'ユーザーの検索に失敗しました。';
        return;
    //}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><?=escape($_GET['name'])?>」さんの検索結果</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
        </tr>
        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?=escape($row['id'])?></td>
            </tr>

            <td>
                <?= escape($row['name']); ?>
            </td>

        <?php endwhile; ?>
    </table>
</body>
</html>