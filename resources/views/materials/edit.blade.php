<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>材料の編集</title>
</head>
<body>
  <a href="{{ route('materials.manage') }}">材料管理に戻る</a>
  <p>材料の編集</p>

  <form action="{{ route('materials.update', $material->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>材料名：</label>
    <input type="text" name="name" value="{{ $material->name }}" required>

    <label>ジャンル：</label>
    <select name="genre_id" required>
      @foreach ($genres as $genre)
      <option value="{{ $genre->id }}" {{ $material->genre_id == $genre->id ? 'selected' : '' }}>
        {{ $genre->name }}
      </option>
      @endforeach
    </select>

    <button type="submit">変更を保存する</button>
  </form>
  
  @error('name')
    <div style="color: red; font-size: 14px;">{{ $message }}</div>
  @enderror
</body>
</html>