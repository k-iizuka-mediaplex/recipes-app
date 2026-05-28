<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>料理一覧</title>
</head>
<body>
  <a href="{{ route('recipes.create') }}">新規レシピ登録</a>
  <a href="{{route('materials.manage')}}">材料の追加・削除</a>
  <hr>
  <h1>料理一覧</h1>
  @foreach ($all_recipes as $recipe)
    <h2>{{ $recipe->name }}</h2>
    <p>{{ $recipe->description }}</p>
    <p>材料:
      @foreach ($recipe->materials as $material)
        {{ $material->name }}
      @endforeach
      <a href="{{ route('recipes.edit', $recipe->id) }}">編集</a>
    </p>
    <hr>
  @endforeach
</body>
</html>