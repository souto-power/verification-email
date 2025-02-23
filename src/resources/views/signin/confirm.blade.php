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
        <h1>メール認証</h1>
        <div class="mainContent">
            <div class="bold">メールに送られた数字を入力してください。</div>
        </div>
        <form action="/signin/verify-email" method="post">
            @csrf

            <label for="email" hidden>メールアドレス:</label>
            <input type="email" name="email" id="email" value="{{ $email }}" hidden>

            <label for="number">数字:</label>
            <input type="text" name="code" id="code" required>
            <button type="submit">送信</button>
        </form>
        <div><a href="http://localhost:8025/" target="_blank">Mailer</a></div>
@endif
</body>

</html>
