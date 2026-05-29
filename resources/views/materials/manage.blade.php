<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>材料管理</title>
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
    <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <a href="{{ route('recipes.index') }}" class="text-cookpad-text-sub hover:text-cookpad-orange transition-colors text-sm">
          ← 料理一覧
        </a>
        <span class="text-cookpad-border">|</span>
        <span class="font-display text-base font-bold text-cookpad-orange">🥕 材料管理</span>
      </div>
    </div>
  </header>

  <main class="max-w-4xl mx-auto px-4 py-8 space-y-6">

    {{-- Flash Message --}}
    @if (session('alert_message'))
      <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 flex items-center gap-2 text-sm">
        <span>{{ session('alert_message') }}</span>
      </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

      {{-- Left: Add Material Form --}}
      <div class="md:col-span-2">
        <div class="bg-white rounded-2xl border border-cookpad-border shadow-sm overflow-hidden sticky top-20">
          <div class="bg-cookpad-warm px-5 py-4 border-b border-cookpad-border">
            <h2 class="font-display text-base font-bold">➕ 材料を追加</h2>
          </div>
          <form action="{{ route('materials.store') }}" method="POST" class="p-5 space-y-4">
            @csrf
            <div>
              <label class="block text-xs font-bold text-cookpad-text-sub mb-1">材料名</label>
              <input type="text" name="name" required
                placeholder="例：にんじん"
                class="w-full border border-cookpad-border rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all placeholder-gray-300">
              @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label class="block text-xs font-bold text-cookpad-text-sub mb-1">ジャンル</label>
              <select name="genre_id" required
                class="w-full border border-cookpad-border rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-cookpad-orange focus:ring-2 focus:ring-cookpad-orange/20 transition-all bg-white">
                <option value="">ジャンルを選択</option>
                @foreach ($genres as $genre)
                  <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit"
              class="w-full bg-cookpad-orange text-white font-bold py-2.5 rounded-xl hover:bg-cookpad-orange-hover transition-colors text-sm">
              追加する
            </button>
          </form>
        </div>
      </div>

      {{-- Right: Material List with Bulk Delete --}}
      <div class="md:col-span-3">
        <div class="bg-white rounded-2xl border border-cookpad-border shadow-sm overflow-hidden">
          <div class="bg-cookpad-warm px-5 py-4 border-b border-cookpad-border flex items-center justify-between">
            <h2 class="font-display text-base font-bold">材料リスト</h2>
          </div>

          <form action="{{ route('materials.destroy_bulk') }}" method="POST"
                onsubmit="return confirm('選択した材料をすべて削除しますか？');">
            @csrf
            @method('DELETE')

            {{-- Bulk Delete Button --}}
            <div class="px-5 py-3 border-b border-cookpad-border bg-red-50 flex items-center justify-between">
              <p class="text-xs text-red-500">チェックした材料を一括で削除できます</p>
              <button type="submit"
                class="bg-white border border-red-300 text-red-600 text-xs font-bold px-4 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                一括削除
              </button>
            </div>

            {{-- Materials by Genre --}}
            <div class="divide-y divide-cookpad-border">
              @foreach ($genres as $genre)
                <div class="px-5 py-4">
                  <p class="text-xs font-bold text-cookpad-orange mb-3">【{{ $genre->name }}】</p>
                  <ul class="space-y-2">
                    @foreach ($genre->materials as $material)
                      <li class="flex items-center justify-between py-1.5 px-3 rounded-lg hover:bg-cookpad-warm transition-colors group">
                        <label class="flex items-center gap-2.5 cursor-pointer flex-1">
                          <input type="checkbox" name="material_ids[]" value="{{ $material->id }}"
                            class="accent-cookpad-orange w-4 h-4 rounded">
                          <span class="text-sm text-cookpad-text-main">{{ $material->name }}</span>
                        </label>
                        <a href="{{ route('materials.edit', $material->id) }}"
                          class="text-xs text-cookpad-text-sub hover:text-cookpad-orange transition-colors opacity-0 group-hover:opacity-100 ml-2">
                          ✏️ 編集
                        </a>
                      </li>
                    @endforeach
                    @if($genre->materials->isEmpty())
                      <li class="text-xs text-cookpad-text-sub italic py-1">材料がありません</li>
                    @endif
                  </ul>
                </div>
              @endforeach
            </div>
          </form>
        </div>
      </div>

    </div>
  </main>
</body>
</html>
