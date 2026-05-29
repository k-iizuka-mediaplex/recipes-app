<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>材料を編集 - {{ $material->name }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Zen+Kaku+Gothic+New:wght@700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Noto Sans JP', 'sans-serif'],
            display: ['Zen Kaku Gothic New', 'sans-serif'],
          },
          colors: {
            cookpad: {
              orange: '#FF6633',
              'orange-light': '#FFF0EB',
              'orange-hover': '#E55528',
              cream: '#FFFBF7',
              warm: '#FFF5EE',
              'text-main': '#1A1A1A',
              'text-sub': '#6B6B6B',
              border: '#F0E8E0',
            }
          }
        }
      }
    }
  </script>
  <style>body { background-color: #FFFBF7; }</style>
</head>
<body class="font-sans text-cookpad-text-main min-h-screen">

  {{-- Header --}}
  <header class="bg-white border-b border-cookpad-border sticky top-0 z-50 shadow-sm">
    <div class="max-w-xl mx-auto px-4 py-3 flex items-center gap-3">
      <a href="{{ route('materials.manage') }}" class="text-cookpad-text-sub hover:text-cookpad-orange transition-colors text-sm">
        ← 材料管理へ戻る
      </a>
      <span class="text-cookpad-border">|</span>
      <span class="font-display text-base font-bold text-cookpad-orange">✏️ 材料を編集</span>
    </div>
  </header>

  <main class="max-w-xl mx-auto px-4 py-10">

    {{-- Current material badge --}}
    <div class="flex items-center gap-2 mb-6">
      <span class="bg-cookpad-orange-light text-cookpad-orange text-sm font-bold px-4 py-1.5 rounded-full">
        {{ $material->name }}
      </span>
      <span class="text-cookpad-text-sub text-sm">を編集中</span>
    </div>

    <div class="bg-white rounded-2xl border border-cookpad-border shadow-sm overflow-hidden">
      <div class="bg-cookpad-warm px-6 py-4 border-b border-cookpad-border">
        <h1 class="font-display text-xl font-bold">材料の編集</h1>
        <p class="text-xs text-cookpad-text-sub mt-0.5">名前とジャンルを変更できます</p>
      </div>

      <form action="{{ route('materials.update', $material->id) }}" method="POST" class="p-6 space-y-5">
        @csrf
        @method('PUT')

        {{-- 材料名 --}}
        <div>
          <label class="block text-sm font-bold text-cookpad-text-main mb-1.5">
            材料名 <span class="text-cookpad-orange">*</span>
          </label>
          <input type="text" name="name" value="{{ $material->name }}" required
            class="w-full border border-cookpad-border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all">
          @error('name')
            <p class="text-red-500 text-xs mt-1.5">⚠️ {{ $message }}</p>
          @enderror
        </div>

        {{-- ジャンル --}}
        <div>
          <label class="block text-sm font-bold text-cookpad-text-main mb-1.5">
            ジャンル <span class="text-cookpad-orange">*</span>
          </label>
          <select name="genre_id" required
            class="w-full border border-cookpad-border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all bg-white">
            @foreach ($genres as $genre)
              <option value="{{ $genre->id }}" {{ $material->genre_id == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Submit --}}
        <div class="pt-2">
          <button type="submit"
            class="w-full bg-cookpad-orange text-white font-bold py-3 rounded-xl hover:bg-cookpad-orange-hover active:scale-[0.99] transition-all text-sm shadow-sm">
            変更を保存する
          </button>
        </div>
      </form>
    </div>

    {{-- Back link --}}
    <div class="text-center mt-6">
      <a href="{{ route('materials.manage') }}"
         class="text-sm text-cookpad-text-sub hover:text-cookpad-orange transition-colors">
        変更せずに戻る →
      </a>
    </div>

  </main>
</body>
</html>
