<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レシピを編集 - {{ $recipe->name }}</title>
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
              danger: '#E53935',
              'danger-light': '#FFF0F0',
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
    <div class="max-w-3xl mx-auto px-4 py-3 flex items-center gap-3">
      <a href="{{ route('recipes.index') }}" class="text-cookpad-text-sub hover:text-cookpad-orange transition-colors">
        ← 一覧へ戻る
      </a>
      <span class="text-cookpad-border">|</span>
      <span class="font-display text-base font-bold text-cookpad-orange">✏️ レシピを編集</span>
    </div>
  </header>

  <main class="max-w-3xl mx-auto px-4 py-8">

    {{-- Recipe Edit Form --}}
    <div class="bg-white rounded-2xl border border-cookpad-border shadow-sm overflow-hidden mb-6">
      <div class="bg-cookpad-warm px-6 py-4 border-b border-cookpad-border">
        <h1 class="font-display text-xl font-bold">レシピの編集</h1>
        <p class="text-sm text-cookpad-text-sub mt-0.5">{{ $recipe->name }}</p>
      </div>

      <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- 料理名 --}}
        <div>
          <label for="name" class="block text-sm font-bold text-cookpad-text-main mb-1.5">
            料理名 <span class="text-cookpad-orange">*</span>
          </label>
          <input type="text" id="name" name="name" value="{{ $recipe->name }}" required
            class="w-full border border-cookpad-border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all">
        </div>

        {{-- 説明 --}}
        <div>
          <label for="description" class="block text-sm font-bold text-cookpad-text-main mb-1.5">
            料理の説明
          </label>
          <textarea id="description" name="description" rows="4"
            class="w-full border border-cookpad-border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all resize-none">{{ $recipe->description }}</textarea>
        </div>

        {{-- 材料チェックボックス --}}
        <div>
          <p class="text-sm font-bold text-cookpad-text-main mb-3">材料を選ぶ</p>
          <div class="space-y-4">
            @foreach ($genres as $genre)
              <div class="bg-cookpad-warm rounded-xl p-4">
                <p class="text-xs font-bold text-cookpad-orange uppercase tracking-wide mb-2">
                  【{{ $genre->name }}】
                </p>
                <div class="flex flex-wrap gap-2">
                  @foreach($genre->materials as $material)
                    <label class="flex items-center gap-1.5 cursor-pointer group">
                      <input type="checkbox" name="materials[]" value="{{ $material->id }}"
                        @if($recipe->materials->contains($material->id)) checked @endif
                        class="accent-cookpad-orange w-4 h-4 rounded cursor-pointer">
                      <span class="text-sm text-cookpad-text-main group-hover:text-cookpad-orange transition-colors">
                        {{ $material->name }}
                      </span>
                    </label>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- 新しい材料を追加 --}}
        <div class="bg-cookpad-orange-light rounded-xl p-4">
          <label for="new_material" class="block text-sm font-bold text-cookpad-text-main mb-1.5">
            ➕ 新しい材料を追加
          </label>
          <input type="text" id="new_material" name="new_material"
            placeholder="例：にんにく、生姜..."
            class="w-full border border-cookpad-border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 bg-white transition-all">
          @error('new_material')
            <p class="text-cookpad-danger text-xs mt-1.5">⚠️ {{ $message }}</p>
          @enderror
        </div>

        {{-- Submit --}}
        <div class="pt-2">
          <button type="submit"
            class="w-full bg-cookpad-orange text-white font-bold py-3 rounded-xl hover:bg-cookpad-orange-hover transition-colors text-sm shadow-sm">
            レシピを更新する
          </button>
        </div>
      </form>
    </div>

    {{-- Delete Section --}}
    <div class="bg-white rounded-2xl border border-red-100 shadow-sm overflow-hidden">
      <div class="px-6 py-4 border-b border-red-100 bg-red-50">
      </div>
      <div class="p-6 flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-cookpad-text-main">このレシピを削除する</p>
          <p class="text-xs text-cookpad-text-sub mt-0.5">一度削除すると元に戻せません</p>
        </div>
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST"
              onsubmit="return confirm('本当にこのレシピを削除しますか？');">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="bg-white border border-red-300 text-red-600 text-sm font-bold px-5 py-2 rounded-xl hover:bg-red-50 transition-colors">
            削除する
          </button>
        </form>
      </div>
    </div>

  </main>
</body>
</html>
