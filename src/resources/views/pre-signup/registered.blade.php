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
<h1>仮登録完了</h1>
<div class="mainContent">
    @if (session('message'))
        <div class="bold">{{ session('message') }}</div>
    @endif
    <div class="bold">ご登録いただいたメールアドレス宛に、登録用のURLを記載したメールを送信しました。</div>
    <div class="bold">メールに記載されたURLをクリックして、本登録を完了してください。</div>
</div>
</body>

</html>
