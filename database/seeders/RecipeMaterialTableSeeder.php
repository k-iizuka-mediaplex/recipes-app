<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * material_id 早見表（MaterialsTableSeederの挿入順）
 *
 * ── genre 1: 米・雑穀 ──────────────────────────────
 *  1:白米  2:玄米  3:もち米  4:オートミール  5:コーンフレーク  6:グラノーラ
 *  7:雑穀米  8:押し麦  9:キヌア  10:アマランサス  11:発芽玄米  12:赤米
 * 13:黒米  14:タピオカ
 *
 * ── genre 2: 麺類 ─────────────────────────────────
 * 15:うどん  16:そば  17:そうめん  18:ひやむぎ  19:スパゲッティ  20:ペンネ
 * 21:フェットチーネ  22:中華麺  23:フォー  24:ビーフン  25:春雨  26:ラーメン麺
 * 27:マカロニ  28:リングイネ
 *
 * ── genre 3: パン ──────────────────────────────────
 * 29:食パン  30:バゲット  31:クロワッサン  32:イングリッシュマフィン  33:ベーグル
 * 34:ライ麦パン  35:ナン  36:ピタパン  37:フォカッチャ  38:パン粉
 *
 * ── genre 4: 肉・肉加工品 ──────────────────────────
 * 39:豚肉（薄切り）  40:豚バラ肉  41:豚ロース  42:豚こま切れ肉  43:豚ひき肉
 * 44:豚肩ロース  45:豚レバー  46:鶏むね肉  47:鶏もも肉  48:鶏手羽元
 * 49:鶏手羽先  50:鶏ささみ  51:鶏ひき肉  52:鶏軟骨  53:牛切り落とし肉
 * 54:牛バラ肉  55:牛ロース  56:牛ひき肉  57:合いびき肉  58:ラム肉
 * 59:ベーコン  60:ハム  61:ソーセージ  62:ウィンナー  63:サラミ
 * 64:焼き豚  65:ペパロニ  66:コンビーフ  67:スパム  68:プロシュート
 *
 * ── genre 5: 魚介・水産加工品 ────────────────────────
 * 69:サーモン  70:マグロ  71:タラ  72:アジ  73:サバ  74:イワシ  75:サンマ
 * 76:ブリ  77:カツオ  78:タイ  79:ヒラメ  80:カレイ  81:エビ  82:カニ
 * 83:イカ  84:タコ  85:ホタテ  86:アサリ  87:シジミ  88:ムール貝  89:カキ
 * 90:ちくわ  91:かまぼこ  92:はんぺん  93:さつま揚げ  94:明太子  95:たらこ
 * 96:かに風味かまぼこ  97:スモークサーモン  98:ししゃも
 *
 * ── genre 6: 野菜 ──────────────────────────────────
 * 99:玉ねぎ  100:にんじん  101:なす  102:キャベツ  103:ピーマン  104:じゃがいも
 * 105:トマト  106:ミニトマト  107:きゅうり  108:大根  109:ほうれん草  110:小松菜
 * 111:白菜  112:ブロッコリー  113:カリフラワー  114:ズッキーニ  115:かぼちゃ
 * 116:さつまいも  117:ごぼう  118:れんこん  119:長ねぎ  120:小ねぎ  121:にら
 * 122:もやし  123:豆苗  124:セロリ  125:アスパラガス  126:スナップエンドウ
 * 127:さやいんげん  128:とうもろこし  129:パプリカ（赤）  130:パプリカ（黄）
 * 131:オクラ  132:にんにく  133:生姜  134:長芋  135:かぶ  136:チンゲン菜
 * 137:水菜  138:ルッコラ  139:レタス  140:サニーレタス  141:きゅうり（2）
 * 142:ラディッシュ  143:みょうが  144:大葉  145:バジル  146:パセリ  147:ミント
 * 148:パクチー  149:ローズマリー  150:タイム  151:ディル  152:とうがらし
 * 153:アボカド  154:えだまめ  155:スプラウト  156:ケール  157:ビーツ  158:フェンネル
 *
 * ── genre 7: 果物 ──────────────────────────────────
 * 159:りんご  160:バナナ  161:オレンジ  162:レモン  163:ライム  164:いちご
 * 165:ぶどう  166:桃  167:マンゴー  168:パイナップル  169:キウイ  170:メロン
 * 171:すいか  172:なし  173:ブルーベリー  174:クランベリー
 *
 * ── genre 8: 卵・チーズ・乳製品 ────────────────────
 * 175:卵  176:うずらの卵  177:牛乳  178:豆乳  179:生クリーム  180:サワークリーム
 * 181:バター  182:ヨーグルト  183:クリームチーズ  184:モッツァレラ  185:パルメザン
 * 186:ゴルゴンゾーラ  187:カマンベール  188:チェダー  189:スライスチーズ
 * 190:ピザ用チーズ  191:コンデンスミルク  192:スキムミルク
 *
 * ── genre 9: 豆腐・納豆・大豆 ───────────────────────
 * 193:木綿豆腐  194:絹ごし豆腐  195:厚揚げ  196:油揚げ  197:高野豆腐
 * 198:納豆  199:豆乳（無調整）  200:味噌  201:おから  202:ゆば
 * 203:大豆（水煮）  204:テンペ
 *
 * ── genre 10: きのこ・海藻 ───────────────────────────
 * 205:しいたけ  206:しめじ  207:えのき  208:まいたけ  209:エリンギ  210:なめこ
 * 211:マッシュルーム  212:ポルチーニ  213:トリュフ  214:わかめ  215:昆布
 * 216:海苔  217:めかぶ  218:もずく  219:ひじき  220:あおさ  221:とろろ昆布
 * 222:寒天
 *
 * ── genre 11: 粉類・製菓 ─────────────────────────────
 * 223:薄力粉  224:強力粉  225:中力粉  226:片栗粉  227:コーンスターチ
 * 228:ベーキングパウダー  229:重曹  230:上白糖  231:グラニュー糖  232:三温糖
 * 233:てんさい糖  234:はちみつ  235:メープルシロップ  236:ドライイースト
 * 237:ゼラチン  238:ココアパウダー  239:アーモンドプードル  240:バニラエッセンス
 *
 * ── genre 12: 乾物 ────────────────────────────────
 * 241:干ししいたけ  242:切り干し大根  243:高野豆腐（乾燥）  244:干し桜エビ
 * 245:かつお節  246:煮干し  247:干しひじき  248:乾燥わかめ  249:干し湯葉
 * 250:乾燥レンズ豆  251:乾燥ひよこ豆  252:乾燥大豆  253:乾燥黒豆  254:干しエビ
 * 255:乾燥パスタ（ショート）  256:くるみ
 *
 * ── genre 13: 缶詰・瓶詰 ─────────────────────────────
 * 257:ツナ缶  258:さば缶  259:さんま缶  260:コーン缶  261:トマト缶（ホール）
 * 262:トマト缶（カット）  263:ひよこ豆缶  264:大豆缶  265:キドニービーンズ缶
 * 266:アンチョビ缶  267:オリーブ  268:ケイパー  269:ミックスベジタブル
 * 270:クラムチャウダー缶
 *
 * ── genre 14: 調味料 ─────────────────────────────────
 * 271:醤油  272:みりん  273:料理酒  274:酢  275:塩  276:黒胡椒  277:白胡椒
 * 278:カレー粉  279:カレールー  280:シチュールー  281:めんつゆ  282:だし（顆粒）
 * 283:コンソメ（顆粒）  284:鶏がらスープの素  285:豆板醤  286:甜面醤
 * 287:オイスターソース  288:ナンプラー  289:スイートチリソース  290:トムヤムペースト
 * 291:ケチャップ  292:マヨネーズ  293:ウスターソース  294:中濃ソース  295:ポン酢
 * 296:ごまだれ  297:白みそ  298:赤みそ  299:すりごま（白）  300:すりごま（黒）
 * 301:ごま油  302:マスタード（粒）  303:マスタード（粉）  304:バルサミコ酢
 * 305:ポン酢しょうゆ  306:タバスコ  307:ラー油  308:XO醤  309:コチュジャン
 * 310:テリヤキソース
 *
 * ── genre 15: 油脂 ────────────────────────────────
 * 311:サラダ油  312:オリーブオイル  313:ごま油  314:バター（食塩なし）
 * 315:マーガリン  316:ラード  317:ショートニング  318:焙煎ごま油  319:アボカドオイル
 * 320:ココナッツオイル
 *
 * ── genre 16: 水・酒・飲料 ───────────────────────────
 * 321:水  322:日本酒  323:白ワイン  324:赤ワイン  325:本みりん  326:ビール
 * 327:豆乳（飲料）  328:コーヒー  329:緑茶  330:昆布だし  331:かつおだし
 * 332:野菜ブロス
 */
class RecipeMaterialTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ── recipe 1: カレーライス ──────────────────────
            ['recipe_id' => 1, 'material_id' => 39],  // 豚肉（薄切り）
            ['recipe_id' => 1, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 1, 'material_id' => 100], // にんじん
            ['recipe_id' => 1, 'material_id' => 104], // じゃがいも
            ['recipe_id' => 1, 'material_id' => 279], // カレールー
            ['recipe_id' => 1, 'material_id' => 321], // 水
            ['recipe_id' => 1, 'material_id' => 181], // バター
            ['recipe_id' => 1, 'material_id' => 1],   // 白米

            // ── recipe 2: 肉じゃが ─────────────────────────
            ['recipe_id' => 2, 'material_id' => 53],  // 牛切り落とし肉
            ['recipe_id' => 2, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 2, 'material_id' => 100], // にんじん
            ['recipe_id' => 2, 'material_id' => 104], // じゃがいも
            ['recipe_id' => 2, 'material_id' => 271], // 醤油
            ['recipe_id' => 2, 'material_id' => 272], // みりん
            ['recipe_id' => 2, 'material_id' => 273], // 料理酒
            ['recipe_id' => 2, 'material_id' => 230], // 上白糖

            // ── recipe 3: 豚の生姜焼き ────────────────────
            ['recipe_id' => 3, 'material_id' => 41],  // 豚ロース
            ['recipe_id' => 3, 'material_id' => 133], // 生姜
            ['recipe_id' => 3, 'material_id' => 271], // 醤油
            ['recipe_id' => 3, 'material_id' => 272], // みりん
            ['recipe_id' => 3, 'material_id' => 273], // 料理酒
            ['recipe_id' => 3, 'material_id' => 102], // キャベツ

            // ── recipe 4: 唐揚げ ───────────────────────────
            ['recipe_id' => 4, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 4, 'material_id' => 132], // にんにく
            ['recipe_id' => 4, 'material_id' => 133], // 生姜
            ['recipe_id' => 4, 'material_id' => 271], // 醤油
            ['recipe_id' => 4, 'material_id' => 273], // 料理酒
            ['recipe_id' => 4, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 4, 'material_id' => 311], // サラダ油

            // ── recipe 5: 肉みそうどん ────────────────────
            ['recipe_id' => 5, 'material_id' => 43],  // 豚ひき肉
            ['recipe_id' => 5, 'material_id' => 15],  // うどん
            ['recipe_id' => 5, 'material_id' => 298], // 赤みそ
            ['recipe_id' => 5, 'material_id' => 272], // みりん
            ['recipe_id' => 5, 'material_id' => 230], // 上白糖
            ['recipe_id' => 5, 'material_id' => 132], // にんにく
            ['recipe_id' => 5, 'material_id' => 119], // 長ねぎ

            // ── recipe 6: だし巻き卵 ─────────────────────
            ['recipe_id' => 6, 'material_id' => 175], // 卵
            ['recipe_id' => 6, 'material_id' => 330], // 昆布だし
            ['recipe_id' => 6, 'material_id' => 271], // 醤油
            ['recipe_id' => 6, 'material_id' => 272], // みりん
            ['recipe_id' => 6, 'material_id' => 311], // サラダ油

            // ── recipe 7: サバの味噌煮 ────────────────────
            ['recipe_id' => 7, 'material_id' => 73],  // サバ
            ['recipe_id' => 7, 'material_id' => 133], // 生姜
            ['recipe_id' => 7, 'material_id' => 297], // 白みそ
            ['recipe_id' => 7, 'material_id' => 298], // 赤みそ
            ['recipe_id' => 7, 'material_id' => 272], // みりん
            ['recipe_id' => 7, 'material_id' => 322], // 日本酒
            ['recipe_id' => 7, 'material_id' => 230], // 上白糖

            // ── recipe 8: ぶり大根 ─────────────────────────
            ['recipe_id' => 8, 'material_id' => 76],  // ブリ
            ['recipe_id' => 8, 'material_id' => 108], // 大根
            ['recipe_id' => 8, 'material_id' => 133], // 生姜
            ['recipe_id' => 8, 'material_id' => 271], // 醤油
            ['recipe_id' => 8, 'material_id' => 272], // みりん
            ['recipe_id' => 8, 'material_id' => 322], // 日本酒
            ['recipe_id' => 8, 'material_id' => 230], // 上白糖

            // ── recipe 9: 茶碗蒸し ─────────────────────────
            ['recipe_id' => 9, 'material_id' => 175], // 卵
            ['recipe_id' => 9, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 9, 'material_id' => 81],  // エビ
            ['recipe_id' => 9, 'material_id' => 331], // かつおだし
            ['recipe_id' => 9, 'material_id' => 271], // 醤油
            ['recipe_id' => 9, 'material_id' => 272], // みりん

            // ── recipe 10: きのこの炊き込みご飯 ─────────
            ['recipe_id' => 10, 'material_id' => 1],   // 白米
            ['recipe_id' => 10, 'material_id' => 205], // しいたけ
            ['recipe_id' => 10, 'material_id' => 206], // しめじ
            ['recipe_id' => 10, 'material_id' => 208], // まいたけ
            ['recipe_id' => 10, 'material_id' => 271], // 醤油
            ['recipe_id' => 10, 'material_id' => 272], // みりん
            ['recipe_id' => 10, 'material_id' => 273], // 料理酒
            ['recipe_id' => 10, 'material_id' => 282], // だし（顆粒）

            // ── recipe 11: 回鍋肉 ──────────────────────────
            ['recipe_id' => 11, 'material_id' => 40],  // 豚バラ肉
            ['recipe_id' => 11, 'material_id' => 102], // キャベツ
            ['recipe_id' => 11, 'material_id' => 103], // ピーマン
            ['recipe_id' => 11, 'material_id' => 285], // 豆板醤
            ['recipe_id' => 11, 'material_id' => 286], // 甜面醤
            ['recipe_id' => 11, 'material_id' => 132], // にんにく
            ['recipe_id' => 11, 'material_id' => 133], // 生姜
            ['recipe_id' => 11, 'material_id' => 311], // サラダ油

            // ── recipe 12: 青椒肉絲 ────────────────────────
            ['recipe_id' => 12, 'material_id' => 55],  // 牛ロース
            ['recipe_id' => 12, 'material_id' => 103], // ピーマン
            ['recipe_id' => 12, 'material_id' => 129], // パプリカ（赤）
            ['recipe_id' => 12, 'material_id' => 271], // 醤油
            ['recipe_id' => 12, 'material_id' => 287], // オイスターソース
            ['recipe_id' => 12, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 12, 'material_id' => 311], // サラダ油

            // ── recipe 13: マーボー豆腐 ───────────────────
            ['recipe_id' => 13, 'material_id' => 43],  // 豚ひき肉
            ['recipe_id' => 13, 'material_id' => 194], // 絹ごし豆腐
            ['recipe_id' => 13, 'material_id' => 285], // 豆板醤
            ['recipe_id' => 13, 'material_id' => 286], // 甜面醤
            ['recipe_id' => 13, 'material_id' => 284], // 鶏がらスープの素
            ['recipe_id' => 13, 'material_id' => 132], // にんにく
            ['recipe_id' => 13, 'material_id' => 133], // 生姜
            ['recipe_id' => 13, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 13, 'material_id' => 301], // ごま油

            // ── recipe 14: エビチリ ────────────────────────
            ['recipe_id' => 14, 'material_id' => 81],  // エビ
            ['recipe_id' => 14, 'material_id' => 285], // 豆板醤
            ['recipe_id' => 14, 'material_id' => 291], // ケチャップ
            ['recipe_id' => 14, 'material_id' => 132], // にんにく
            ['recipe_id' => 14, 'material_id' => 133], // 生姜
            ['recipe_id' => 14, 'material_id' => 119], // 長ねぎ
            ['recipe_id' => 14, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 14, 'material_id' => 311], // サラダ油

            // ── recipe 15: 酢豚 ────────────────────────────
            ['recipe_id' => 15, 'material_id' => 44],  // 豚肩ロース
            ['recipe_id' => 15, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 15, 'material_id' => 100], // にんじん
            ['recipe_id' => 15, 'material_id' => 103], // ピーマン
            ['recipe_id' => 15, 'material_id' => 274], // 酢
            ['recipe_id' => 15, 'material_id' => 291], // ケチャップ
            ['recipe_id' => 15, 'material_id' => 230], // 上白糖
            ['recipe_id' => 15, 'material_id' => 226], // 片栗粉

            // ── recipe 16: 餃子 ────────────────────────────
            ['recipe_id' => 16, 'material_id' => 43],  // 豚ひき肉
            ['recipe_id' => 16, 'material_id' => 102], // キャベツ
            ['recipe_id' => 16, 'material_id' => 121], // にら
            ['recipe_id' => 16, 'material_id' => 132], // にんにく
            ['recipe_id' => 16, 'material_id' => 133], // 生姜
            ['recipe_id' => 16, 'material_id' => 271], // 醤油
            ['recipe_id' => 16, 'material_id' => 301], // ごま油
            ['recipe_id' => 16, 'material_id' => 311], // サラダ油

            // ── recipe 17: 中華丼 ──────────────────────────
            ['recipe_id' => 17, 'material_id' => 81],  // エビ
            ['recipe_id' => 17, 'material_id' => 83],  // イカ
            ['recipe_id' => 17, 'material_id' => 111], // 白菜
            ['recipe_id' => 17, 'material_id' => 284], // 鶏がらスープの素
            ['recipe_id' => 17, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 17, 'material_id' => 287], // オイスターソース
            ['recipe_id' => 17, 'material_id' => 1],   // 白米

            // ── recipe 18: 棒棒鶏 ──────────────────────────
            ['recipe_id' => 18, 'material_id' => 46],  // 鶏むね肉
            ['recipe_id' => 18, 'material_id' => 107], // きゅうり
            ['recipe_id' => 18, 'material_id' => 296], // ごまだれ
            ['recipe_id' => 18, 'material_id' => 299], // すりごま（白）
            ['recipe_id' => 18, 'material_id' => 271], // 醤油
            ['recipe_id' => 18, 'material_id' => 301], // ごま油

            // ── recipe 19: 春巻き ──────────────────────────
            ['recipe_id' => 19, 'material_id' => 39],  // 豚肉（薄切り）
            ['recipe_id' => 19, 'material_id' => 111], // 白菜
            ['recipe_id' => 19, 'material_id' => 25],  // 春雨
            ['recipe_id' => 19, 'material_id' => 205], // しいたけ
            ['recipe_id' => 19, 'material_id' => 287], // オイスターソース
            ['recipe_id' => 19, 'material_id' => 226], // 片栗粉
            ['recipe_id' => 19, 'material_id' => 311], // サラダ油

            // ── recipe 20: チャーハン ──────────────────────
            ['recipe_id' => 20, 'material_id' => 59],  // ベーコン
            ['recipe_id' => 20, 'material_id' => 175], // 卵
            ['recipe_id' => 20, 'material_id' => 119], // 長ねぎ
            ['recipe_id' => 20, 'material_id' => 271], // 醤油
            ['recipe_id' => 20, 'material_id' => 301], // ごま油
            ['recipe_id' => 20, 'material_id' => 1],   // 白米
            ['recipe_id' => 20, 'material_id' => 275], // 塩
            ['recipe_id' => 20, 'material_id' => 276], // 黒胡椒

            // ── recipe 21: ハンバーグ ─────────────────────
            ['recipe_id' => 21, 'material_id' => 57],  // 合いびき肉
            ['recipe_id' => 21, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 21, 'material_id' => 175], // 卵
            ['recipe_id' => 21, 'material_id' => 38],  // パン粉
            ['recipe_id' => 21, 'material_id' => 177], // 牛乳
            ['recipe_id' => 21, 'material_id' => 275], // 塩
            ['recipe_id' => 21, 'material_id' => 276], // 黒胡椒
            ['recipe_id' => 21, 'material_id' => 181], // バター

            // ── recipe 22: ミートソーススパゲッティ ───────
            ['recipe_id' => 22, 'material_id' => 56],  // 牛ひき肉
            ['recipe_id' => 22, 'material_id' => 19],  // スパゲッティ
            ['recipe_id' => 22, 'material_id' => 262], // トマト缶（カット）
            ['recipe_id' => 22, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 22, 'material_id' => 132], // にんにく
            ['recipe_id' => 22, 'material_id' => 324], // 赤ワイン
            ['recipe_id' => 22, 'material_id' => 185], // パルメザンチーズ
            ['recipe_id' => 22, 'material_id' => 312], // オリーブオイル

            // ── recipe 23: カルボナーラ ───────────────────
            ['recipe_id' => 23, 'material_id' => 19],  // スパゲッティ
            ['recipe_id' => 23, 'material_id' => 59],  // ベーコン
            ['recipe_id' => 23, 'material_id' => 175], // 卵
            ['recipe_id' => 23, 'material_id' => 185], // パルメザンチーズ
            ['recipe_id' => 23, 'material_id' => 276], // 黒胡椒
            ['recipe_id' => 23, 'material_id' => 312], // オリーブオイル

            // ── recipe 24: ペペロンチーノ ─────────────────
            ['recipe_id' => 24, 'material_id' => 19],  // スパゲッティ
            ['recipe_id' => 24, 'material_id' => 132], // にんにく
            ['recipe_id' => 24, 'material_id' => 152], // とうがらし
            ['recipe_id' => 24, 'material_id' => 312], // オリーブオイル
            ['recipe_id' => 24, 'material_id' => 275], // 塩
            ['recipe_id' => 24, 'material_id' => 146], // パセリ

            // ── recipe 25: チキングリル レモンハーブ ───────
            ['recipe_id' => 25, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 25, 'material_id' => 162], // レモン
            ['recipe_id' => 25, 'material_id' => 149], // ローズマリー
            ['recipe_id' => 25, 'material_id' => 132], // にんにく
            ['recipe_id' => 25, 'material_id' => 312], // オリーブオイル
            ['recipe_id' => 25, 'material_id' => 275], // 塩
            ['recipe_id' => 25, 'material_id' => 276], // 黒胡椒

            // ── recipe 26: マルゲリータピザ ──────────────
            ['recipe_id' => 26, 'material_id' => 224], // 強力粉
            ['recipe_id' => 26, 'material_id' => 236], // ドライイースト
            ['recipe_id' => 26, 'material_id' => 105], // トマト
            ['recipe_id' => 26, 'material_id' => 184], // モッツァレラチーズ
            ['recipe_id' => 26, 'material_id' => 145], // バジル
            ['recipe_id' => 26, 'material_id' => 312], // オリーブオイル
            ['recipe_id' => 26, 'material_id' => 275], // 塩

            // ── recipe 27: ビーフシチュー ─────────────────
            ['recipe_id' => 27, 'material_id' => 54],  // 牛バラ肉
            ['recipe_id' => 27, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 27, 'material_id' => 100], // にんじん
            ['recipe_id' => 27, 'material_id' => 104], // じゃがいも
            ['recipe_id' => 27, 'material_id' => 324], // 赤ワイン
            ['recipe_id' => 27, 'material_id' => 280], // シチュールー
            ['recipe_id' => 27, 'material_id' => 181], // バター

            // ── recipe 28: グラタン ────────────────────────
            ['recipe_id' => 28, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 28, 'material_id' => 27],  // マカロニ
            ['recipe_id' => 28, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 28, 'material_id' => 177], // 牛乳
            ['recipe_id' => 28, 'material_id' => 181], // バター
            ['recipe_id' => 28, 'material_id' => 223], // 薄力粉
            ['recipe_id' => 28, 'material_id' => 190], // ピザ用チーズ

            // ── recipe 29: ラザニア ────────────────────────
            ['recipe_id' => 29, 'material_id' => 57],  // 合いびき肉
            ['recipe_id' => 29, 'material_id' => 261], // トマト缶（ホール）
            ['recipe_id' => 29, 'material_id' => 177], // 牛乳
            ['recipe_id' => 29, 'material_id' => 181], // バター
            ['recipe_id' => 29, 'material_id' => 223], // 薄力粉
            ['recipe_id' => 29, 'material_id' => 185], // パルメザンチーズ
            ['recipe_id' => 29, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 29, 'material_id' => 132], // にんにく

            // ── recipe 30: ミネストローネ ─────────────────
            ['recipe_id' => 30, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 30, 'material_id' => 100], // にんじん
            ['recipe_id' => 30, 'material_id' => 124], // セロリ
            ['recipe_id' => 30, 'material_id' => 263], // ひよこ豆缶
            ['recipe_id' => 30, 'material_id' => 262], // トマト缶（カット）
            ['recipe_id' => 30, 'material_id' => 283], // コンソメ（顆粒）
            ['recipe_id' => 30, 'material_id' => 312], // オリーブオイル
            ['recipe_id' => 30, 'material_id' => 185], // パルメザンチーズ

            // ── recipe 31: グリーンカレー ─────────────────
            ['recipe_id' => 31, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 31, 'material_id' => 101], // なす
            ['recipe_id' => 31, 'material_id' => 103], // ピーマン
            ['recipe_id' => 31, 'material_id' => 145], // バジル
            ['recipe_id' => 31, 'material_id' => 288], // ナンプラー
            ['recipe_id' => 31, 'material_id' => 320], // ココナッツオイル
            ['recipe_id' => 31, 'material_id' => 1],   // 白米

            // ── recipe 32: パッタイ ────────────────────────
            ['recipe_id' => 32, 'material_id' => 24],  // ビーフン
            ['recipe_id' => 32, 'material_id' => 81],  // エビ
            ['recipe_id' => 32, 'material_id' => 194], // 絹ごし豆腐
            ['recipe_id' => 32, 'material_id' => 122], // もやし
            ['recipe_id' => 32, 'material_id' => 288], // ナンプラー
            ['recipe_id' => 32, 'material_id' => 163], // ライム
            ['recipe_id' => 32, 'material_id' => 175], // 卵

            // ── recipe 33: フォー ──────────────────────────
            ['recipe_id' => 33, 'material_id' => 23],  // フォー（麺）
            ['recipe_id' => 33, 'material_id' => 54],  // 牛バラ肉
            ['recipe_id' => 33, 'material_id' => 148], // パクチー
            ['recipe_id' => 33, 'material_id' => 163], // ライム
            ['recipe_id' => 33, 'material_id' => 288], // ナンプラー
            ['recipe_id' => 33, 'material_id' => 119], // 長ねぎ
            ['recipe_id' => 33, 'material_id' => 321], // 水

            // ── recipe 34: ビビンバ ────────────────────────
            ['recipe_id' => 34, 'material_id' => 1],   // 白米
            ['recipe_id' => 34, 'material_id' => 109], // ほうれん草
            ['recipe_id' => 34, 'material_id' => 100], // にんじん
            ['recipe_id' => 34, 'material_id' => 122], // もやし
            ['recipe_id' => 34, 'material_id' => 53],  // 牛切り落とし肉
            ['recipe_id' => 34, 'material_id' => 175], // 卵
            ['recipe_id' => 34, 'material_id' => 309], // コチュジャン
            ['recipe_id' => 34, 'material_id' => 301], // ごま油

            // ── recipe 35: 参鶏湯 ──────────────────────────
            ['recipe_id' => 35, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 35, 'material_id' => 3],   // もち米
            ['recipe_id' => 35, 'material_id' => 132], // にんにく
            ['recipe_id' => 35, 'material_id' => 133], // 生姜
            ['recipe_id' => 35, 'material_id' => 275], // 塩
            ['recipe_id' => 35, 'material_id' => 321], // 水
            ['recipe_id' => 35, 'material_id' => 119], // 長ねぎ

            // ── recipe 36: ガパオライス ───────────────────
            ['recipe_id' => 36, 'material_id' => 51],  // 鶏ひき肉
            ['recipe_id' => 36, 'material_id' => 145], // バジル
            ['recipe_id' => 36, 'material_id' => 288], // ナンプラー
            ['recipe_id' => 36, 'material_id' => 287], // オイスターソース
            ['recipe_id' => 36, 'material_id' => 132], // にんにく
            ['recipe_id' => 36, 'material_id' => 152], // とうがらし
            ['recipe_id' => 36, 'material_id' => 175], // 卵
            ['recipe_id' => 36, 'material_id' => 1],   // 白米

            // ── recipe 37: 麻辣湯 ──────────────────────────
            ['recipe_id' => 37, 'material_id' => 193], // 木綿豆腐
            ['recipe_id' => 37, 'material_id' => 25],  // 春雨
            ['recipe_id' => 37, 'material_id' => 285], // 豆板醤
            ['recipe_id' => 37, 'material_id' => 284], // 鶏がらスープの素
            ['recipe_id' => 37, 'material_id' => 307], // ラー油
            ['recipe_id' => 37, 'material_id' => 132], // にんにく
            ['recipe_id' => 37, 'material_id' => 109], // ほうれん草

            // ── recipe 38: バインミー ─────────────────────
            ['recipe_id' => 38, 'material_id' => 30],  // バゲット
            ['recipe_id' => 38, 'material_id' => 39],  // 豚肉（薄切り）
            ['recipe_id' => 38, 'material_id' => 100], // にんじん
            ['recipe_id' => 38, 'material_id' => 108], // 大根
            ['recipe_id' => 38, 'material_id' => 148], // パクチー
            ['recipe_id' => 38, 'material_id' => 292], // マヨネーズ
            ['recipe_id' => 38, 'material_id' => 274], // 酢

            // ── recipe 39: ナシゴレン ─────────────────────
            ['recipe_id' => 39, 'material_id' => 1],   // 白米
            ['recipe_id' => 39, 'material_id' => 81],  // エビ
            ['recipe_id' => 39, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 39, 'material_id' => 175], // 卵
            ['recipe_id' => 39, 'material_id' => 291], // ケチャップ
            ['recipe_id' => 39, 'material_id' => 288], // ナンプラー
            ['recipe_id' => 39, 'material_id' => 285], // 豆板醤

            // ── recipe 40: チキンティッカマサラ ─────────
            ['recipe_id' => 40, 'material_id' => 46],  // 鶏むね肉
            ['recipe_id' => 40, 'material_id' => 182], // ヨーグルト
            ['recipe_id' => 40, 'material_id' => 262], // トマト缶（カット）
            ['recipe_id' => 40, 'material_id' => 179], // 生クリーム
            ['recipe_id' => 40, 'material_id' => 278], // カレー粉
            ['recipe_id' => 40, 'material_id' => 132], // にんにく
            ['recipe_id' => 40, 'material_id' => 133], // 生姜
            ['recipe_id' => 40, 'material_id' => 35],  // ナン

            // ── recipe 41: ポテトサラダ ───────────────────
            ['recipe_id' => 41, 'material_id' => 104], // じゃがいも
            ['recipe_id' => 41, 'material_id' => 107], // きゅうり
            ['recipe_id' => 41, 'material_id' => 60],  // ハム
            ['recipe_id' => 41, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 41, 'material_id' => 292], // マヨネーズ
            ['recipe_id' => 41, 'material_id' => 302], // マスタード（粒）
            ['recipe_id' => 41, 'material_id' => 274], // 酢

            // ── recipe 42: 冷やし中華 ─────────────────────
            ['recipe_id' => 42, 'material_id' => 22],  // 中華麺
            ['recipe_id' => 42, 'material_id' => 60],  // ハム
            ['recipe_id' => 42, 'material_id' => 107], // きゅうり
            ['recipe_id' => 42, 'material_id' => 175], // 卵
            ['recipe_id' => 42, 'material_id' => 105], // トマト
            ['recipe_id' => 42, 'material_id' => 271], // 醤油
            ['recipe_id' => 42, 'material_id' => 274], // 酢
            ['recipe_id' => 42, 'material_id' => 301], // ごま油

            // ── recipe 43: クリームシチュー ──────────────
            ['recipe_id' => 43, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 43, 'material_id' => 104], // じゃがいも
            ['recipe_id' => 43, 'material_id' => 100], // にんじん
            ['recipe_id' => 43, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 43, 'material_id' => 280], // シチュールー
            ['recipe_id' => 43, 'material_id' => 177], // 牛乳
            ['recipe_id' => 43, 'material_id' => 181], // バター

            // ── recipe 44: 豚汁 ────────────────────────────
            ['recipe_id' => 44, 'material_id' => 40],  // 豚バラ肉
            ['recipe_id' => 44, 'material_id' => 108], // 大根
            ['recipe_id' => 44, 'material_id' => 100], // にんじん
            ['recipe_id' => 44, 'material_id' => 117], // ごぼう
            ['recipe_id' => 44, 'material_id' => 200], // 味噌
            ['recipe_id' => 44, 'material_id' => 282], // だし（顆粒）
            ['recipe_id' => 44, 'material_id' => 119], // 長ねぎ

            // ── recipe 45: フレンチトースト ──────────────
            ['recipe_id' => 45, 'material_id' => 29],  // 食パン
            ['recipe_id' => 45, 'material_id' => 175], // 卵
            ['recipe_id' => 45, 'material_id' => 177], // 牛乳
            ['recipe_id' => 45, 'material_id' => 231], // グラニュー糖
            ['recipe_id' => 45, 'material_id' => 181], // バター
            ['recipe_id' => 45, 'material_id' => 235], // メープルシロップ

            // ── recipe 46: オムライス ─────────────────────
            ['recipe_id' => 46, 'material_id' => 1],   // 白米
            ['recipe_id' => 46, 'material_id' => 175], // 卵
            ['recipe_id' => 46, 'material_id' => 47],  // 鶏もも肉
            ['recipe_id' => 46, 'material_id' => 99],  // 玉ねぎ
            ['recipe_id' => 46, 'material_id' => 291], // ケチャップ
            ['recipe_id' => 46, 'material_id' => 181], // バター
            ['recipe_id' => 46, 'material_id' => 177], // 牛乳

            // ── recipe 47: 豆腐チゲ ───────────────────────
            ['recipe_id' => 47, 'material_id' => 193], // 木綿豆腐
            ['recipe_id' => 47, 'material_id' => 40],  // 豚バラ肉
            ['recipe_id' => 47, 'material_id' => 309], // コチュジャン
            ['recipe_id' => 47, 'material_id' => 285], // 豆板醤
            ['recipe_id' => 47, 'material_id' => 284], // 鶏がらスープの素
            ['recipe_id' => 47, 'material_id' => 132], // にんにく
            ['recipe_id' => 47, 'material_id' => 119], // 長ねぎ

            // ── recipe 48: アボカドとサーモンのポケ丼 ───
            ['recipe_id' => 48, 'material_id' => 69],  // サーモン
            ['recipe_id' => 48, 'material_id' => 153], // アボカド
            ['recipe_id' => 48, 'material_id' => 107], // きゅうり
            ['recipe_id' => 48, 'material_id' => 1],   // 白米
            ['recipe_id' => 48, 'material_id' => 271], // 醤油
            ['recipe_id' => 48, 'material_id' => 301], // ごま油
            ['recipe_id' => 48, 'material_id' => 299], // すりごま（白）

            // ── recipe 49: かぼちゃの煮物 ────────────────
            ['recipe_id' => 49, 'material_id' => 115], // かぼちゃ
            ['recipe_id' => 49, 'material_id' => 271], // 醤油
            ['recipe_id' => 49, 'material_id' => 272], // みりん
            ['recipe_id' => 49, 'material_id' => 230], // 上白糖
            ['recipe_id' => 49, 'material_id' => 282], // だし（顆粒）
            ['recipe_id' => 49, 'material_id' => 321], // 水

            // ── recipe 50: ブルスケッタ ───────────────────
            ['recipe_id' => 50, 'material_id' => 30],  // バゲット
            ['recipe_id' => 50, 'material_id' => 105], // トマト
            ['recipe_id' => 50, 'material_id' => 145], // バジル
            ['recipe_id' => 50, 'material_id' => 132], // にんにく
            ['recipe_id' => 50, 'material_id' => 312], // オリーブオイル
            ['recipe_id' => 50, 'material_id' => 304], // バルサミコ酢
            ['recipe_id' => 50, 'material_id' => 275], // 塩
        ];

        DB::table('material_recipe')->insert($data);
    }
}
