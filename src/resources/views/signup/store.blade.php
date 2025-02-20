<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>本登録完了画面</title>
</head>

<body>
@if (!$isSuccess)
    <h1>本登録失敗</h1>
    <div class="mainContent">
        <div class="bold">仮登録からやり直してください。</div>
    </div>
@else
    <h1>本登録完了</h1>
    <div class="mainContent">
        <div class="bold">本登録が完了しました。</div>
    </div>
@endif
</body>

</html>
