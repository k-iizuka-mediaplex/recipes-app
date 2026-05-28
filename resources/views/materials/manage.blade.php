<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>材料管理</title>
</head>
<body>
  <a href="{{ route('recipes.index') }}">料理一覧に戻る</a>
  <h1>材料管理ページ</h1>

  @if (session('alert_message'))
    <div>
      {{ session('alert_message') }}
    </div>
  @endif


  <p>材料の追加</p>
  <form action="{{ route('materials.store') }}" method="POST">
    @csrf
    <input type="text" name="name" required>

    <select name="genre_id" required>
      <option value="">ジャンルを選択</option>
      @foreach ($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
      @endforeach
    </select>

    <button type="submit">追加する</button>
  </form>

  @error('name')
      <div style="color: red; font-size: 14px;">{{ $message }}</div>
  @enderror
  <hr>

  <p>材料リスト</p>
  <form action="{{ route('materials.destroy_bulk') }}" method="POST" onsubmit="return confirm('選択した材料をすべて削除します');">
    @csrf
    @method('DELETE')
    <button type="submit">一括削除</button><br>
    @foreach ($genres as $genre)
    <strong>【{{ $genre->name }}】</strong>
    <ul>
      @foreach ($genre->materials as $material)
      <li>
        <input type="checkbox" name="material_ids[]" value="{{$material->id}}">
        <span>{{ $material->name }}</span>
        <a href="{{ route('materials.edit', $material->id) }}">変更</a>
      </li>
      @endforeach
    </ul>
    @endforeach
  </form>
</body>
</html>