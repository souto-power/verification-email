<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>仮登録完了画面</title>
</head>

<body>
@if (!$isSuccess)
    <h1>仮登録失敗</h1>
    <div class="mainContent">
        <div class="bold">{{ $errorMessage }}</div>
        <div class="bold">仮登録をやり直してください。</div>
    </div>
@else
    <h1>仮登録完了</h1>
    <div class="mainContent">
        <div class="bold">仮登録が完了しました。</div>
        <div class="bold">ご登録いただいたメールアドレス宛に、登録用のURLを記載したメールを送信しました。</div>
        <div class="bold">メールに記載されたURLをクリックして、本登録を完了してください。</div>
    </div>
    <div><a href="http://localhost:8025/">Mailer</a></div>
@endif
</body>

</html>
