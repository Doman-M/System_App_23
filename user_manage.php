<?php 
    declare(strict_types=1);
    require_once dirname(__FILE__) . '/functions.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出欠管理システム</title>
</head>
<body>
    <h1>出欠管理システム</h1>
    <h2>ユーザー一覧ページ</h2>

    <?php

    try {
        $pdo = connect();
        $statement = $pdo->prepare('SELECT * FROM user');
        $statement->execute();
    } catch (PDOException $e) {
        echo 'データベースを取得できませんでした。';
    }
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
        </tr>

        <?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
         
        <tr>
            <td>
                <?= escape($row['id']);?>
            </td>

            <td>
                <?= escape($row['name']); ?>
            </td>
        </td>
               
        <?php endwhile; ?>
    </table>






    <p><a href="index.html">トップページに戻る</a></p>

</body>
</html>