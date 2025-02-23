<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>本登録画面</title>
</head>

<body>
@if (!$isSuccess)
    <h1>本登録失敗</h1>
    <div class="mainContent">
        <div class="bold">本登録が失敗しました。</div>
        <div class="bold">本登録をやり直してください。</div>
    </div>
@else
    <h1>本登録</h1>
    <div class="mainContent">
        <form action="/signup" method="post">
            @csrf {{-- CSRF 対策 --}}

            <label for="email" hidden>メールアドレス:</label>
            <input type="email" name="email" id="email" value="{{ $email }}" hidden>

            <label for="name">user name:</label>
            <input type="text" name="name" id="name" required>

            <button type="submit">送信</button>
        </form>
    </div>
@endif
</body>

</html>
