<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>ようこそ、{{ Auth::user()->name }}さん</h1>
    <h2>レシピ一覧へ</h2>
    <a href="{{ route('recipes.index') }}">レシピ一覧</a>
    <h2>新規レシピ登録へ</h2>
    <a href="{{ route('recipes.create') }}">新規レシピ登録</a>
</body>
</html>