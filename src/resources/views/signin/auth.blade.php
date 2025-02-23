<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Signin</title>
</head>

<body>
    @if (!$isSuccess)
        <h1>サインイン失敗</h1>
        <div class="mainContent">
            <div class="bold">{{ $errorMessage }}</div>
            <div class="bold">やり直してください。</div>
        </div>
    @else
        <h1>サインイン完了</h1>
@endif
</body>

</html>
