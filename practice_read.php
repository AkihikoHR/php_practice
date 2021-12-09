<?php

$array = [];

$file = fopen("data/sample.csv", "r");

flock($file, LOCK_EX);

if ($file) {
  while ($data = fgetcsv($file)) {
    //var_dump($data);
    $array .= "<tr><td>{$data}</td></tr>";
  }
}

flock($file, LOCK_UN);
fclose($file);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アンケート（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>アンケート（一覧画面）</legend>
    <a href="practice_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>アンケート結果</th>
        </tr>
      </thead>
      <tbody>
        <?= $array ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>