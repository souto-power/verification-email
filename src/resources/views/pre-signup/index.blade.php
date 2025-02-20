<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>仮登録画面</title>
</head>

<body>
<h1>仮登録</h1>
<div class="mainContent">
    <form action="/pre-signup" method="post">
        @csrf {{-- CSRF 対策 --}}

        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit">送信</button>
    </form>
</div>
</body>

</html>
