<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>編集画面</title>
</head>
<body>
  <h1>レシピの編集</h1>
  <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">料理名:</label>
    <input type="text" id="name" name="name" value="{{ $recipe->name }}" required><br><br>

    <label for="description">説明:</label><br>
    <textarea id="description" name="description">{{ $recipe->description }}</textarea><br><br>

    <label for="materials">材料:</label><br>
    @foreach ($genres as $genre)
      <div>
        <strong>【{{$genre->name}}】</strong>
      </div>
      @foreach($genre->materials as $material)
        <label>
          <input type="checkbox" name="materials[]" value="{{ $material->id }}"
          @if($recipe->materials->contains($material->id)) checked @endif
          >
          {{ $material->name }}
        </label>
      @endforeach
      <br>
    @endforeach
    <label for="new_material">新しい材料を追加:</label><br>
    <input type="text" id="new_material" name="new_material">
    @error('new_material')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <br><br>
    <button type="submit">更新</button>
  </form>
  <hr>

  <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
    @csrf
    @method('DELETE') <button type="submit">削除する</button>
  </form>
  <br>
  <a href="{{ route('recipes.index') }}">一覧へ戻る</a>
</body>
</html>
</body>
</html>