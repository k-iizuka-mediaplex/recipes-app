<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新規レシピの追加</title>
</head>
<body>
  <h1>新規レシピの追加</h1>
  <form action="{{ route('recipes.store') }}" method="POST">
    @csrf
    <label for="name">料理名:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required><br><br>

    <label for="description">説明:</label><br>
    <textarea id="description" name="description">{{ old('name') }}</textarea><br><br>

    <label for="materials">材料:</label><br>
    @foreach($genres as $genre)
      <div>
        <strong>【{{$genre->name}}】</strong>
      </div>
      @foreach ($genre->materials as $material)
        <label bel for="material_{{ $material->id }}">
          <input type="checkbox" id="material_{{ $material->id }}" name="materials[]" value="{{ $material->id }}"
          {{ is_array(old('materials')) && in_array($material->id, old('materials')) ? 'checked' : '' }}>
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

    <button type="submit">レシピを保存</button>
  </form>
  <hr>
    <a href="{{ route('recipes.index') }}">レシピ一覧へ戻る</a>
</body>
</html>