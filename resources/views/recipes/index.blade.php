<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レシピ一覧</title>
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
  <style>
    body { background-color: #FFFBF7; }
    .recipe-card:hover .recipe-img-placeholder { transform: scale(1.05); }
    .tag-chip { background: #FFF0EB; color: #FF6633; }
  </style>
</head>
<body class="font-sans text-cookpad-text-main min-h-screen">

  {{-- Header --}}
  <header class="bg-white border-b border-cookpad-border sticky top-0 z-50 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('recipes.index') }}" class="flex items-center gap-2">
        <span class="text-2xl">🍳</span>
        <span class="font-display text-xl font-bold text-cookpad-orange">マイレシピ</span>
      </a>
      <nav class="flex items-center gap-3">
        <a href="{{ route('materials.manage') }}"
           class="text-sm text-cookpad-text-sub hover:text-cookpad-orange transition-colors px-3 py-1.5 rounded-full hover:bg-cookpad-orange-light">
          🥕 材料管理
        </a>
        <a href="{{ route('recipes.create') }}"
           class="bg-cookpad-orange text-white text-sm font-bold px-5 py-2 rounded-full hover:bg-cookpad-orange-hover transition-colors shadow-sm">
          ＋ レシピを投稿
        </a>
      </nav>
    </div>
  </header>

  {{-- Hero / Page Title --}}
  <section class="bg-gradient-to-b from-cookpad-warm to-cookpad-cream py-10 border-b border-cookpad-border">
    <div class="max-w-5xl mx-auto px-4">
      <h1 class="font-display text-3xl font-bold text-cookpad-text-main mb-1">料理一覧</h1>
      <p class="text-cookpad-text-sub text-sm">みんなのおいしいレシピが集まっています</p>
    </div>
  </section>

  {{-- Recipe Grid --}}
  <main class="max-w-5xl mx-auto px-4 py-8">
    @if ($all_recipes->isEmpty())
      <div class="text-center py-20">
        <p class="text-cookpad-text-sub text-lg">まだレシピが登録されていません</p>
        <a href="{{ route('recipes.create') }}" class="mt-4 inline-block bg-cookpad-orange text-white font-bold px-6 py-2.5 rounded-full hover:bg-cookpad-orange-hover transition-colors">
          最初のレシピを投稿する
        </a>
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($all_recipes as $recipe)
          <article class="recipe-card bg-white rounded-2xl border border-cookpad-border overflow-hidden hover:shadow-md transition-shadow group">
            {{-- Image Area --}}
            <div class="overflow-hidden h-44 bg-cookpad-warm flex items-center justify-center">
              <div class="recipe-img-placeholder transition-transform duration-300 text-7xl select-none">
                🍽️
              </div>
            </div>
            {{-- Content --}}
            <div class="p-4">
              <h2 class="font-bold text-base text-cookpad-text-main mb-1 line-clamp-2 leading-snug">
                {{ $recipe->name }}
              </h2>
              <p class="text-sm text-cookpad-text-sub line-clamp-2 mb-3 leading-relaxed">
                {{ $recipe->description }}
              </p>
              {{-- Materials --}}
              <div class="flex flex-wrap gap-1.5 mb-3">
                @foreach ($recipe->materials->take(5) as $material)
                  <span class="tag-chip text-xs px-2.5 py-0.5 rounded-full font-medium">
                    {{ $material->name }}
                  </span>
                @endforeach
                @if($recipe->materials->count() > 5)
                  <span class="text-xs text-cookpad-text-sub px-2 py-0.5">
                    +{{ $recipe->materials->count() - 5 }}
                  </span>
                @endif
              </div>
              {{-- Edit Link --}}
              <div class="pt-3 border-t border-cookpad-border">
                <a href="{{ route('recipes.edit', $recipe->id) }}"
                   class="text-sm text-cookpad-orange font-medium hover:underline">
                  ✏️ 編集する
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    @endif
  </main>

  {{-- Footer --}}
  <footer class="mt-16 border-t border-cookpad-border py-6 text-center text-xs text-cookpad-text-sub">
    &copy; マイレシピ
  </footer>

</body>
</html>
