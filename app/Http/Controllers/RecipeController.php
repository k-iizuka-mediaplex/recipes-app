<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Material;

class RecipeController extends Controller
{
    public function index()
    {
        $all_recipes = Recipe::all();
        $genres = Genre::with('materials')->get();
        return view('recipes.index', compact('all_recipes'));
    }

    public function create()
    {
        $genres = Genre::with('materials')->get();
        return view('recipes.create', compact('genres'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|max:1000',
            'materials' => 'array',
            'new_material' => 'nullable|string|max:500|regex:/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠、,]+$/u'
        ], [
            'new_material.regex' => '入力できない記号が含まれています',
        ]);
        $recipe = Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $material_ids = $request->materials ?? [];

        if ($request->filled('new_material')) {
            $raw_input = str_replace('、', ',', $request->new_material);
            $new_material_names = explode(',', $raw_input);

            foreach ($new_material_names as $name) {
                $name = trim($name);
                if (!empty($name)) {
                    $material = Material::where('name', $name)->first();
                    if (!$material) {
                        $material = Material::create([
                            'name' => $name,
                            'genre_id' => 16
                        ]);
                    }

                    $material_ids[] = $material->id;
                }
            }
        }

        $recipe->materials()->attach($material_ids);

        return redirect()->route('recipes.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $recipe = Recipe::with('materials')->findOrFail($id);
        $genres = Genre::with('materials')->get();
        return view('recipes.edit', compact('recipe', 'genres'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:1000',
            'new_material' => 'nullable|string|max:500|regex:/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠、,]+$/u'
        ], [
            'new_material.regex' => '入力できない記号が含まれています'
        ]);
        $recipe = Recipe::findOrFail($id);

        $recipe->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $material_ids = $request->materials ?? [];

        if ($request->filled('new_material')) {
            $raw_input = str_replace('、', ',', $request->new_material);
            $new_material_names = explode(',', $raw_input);
            foreach ($new_material_names as $name) {
                $name = trim($name);
                if (!empty($name)) {
                    $material = Material::where('name', $name)->first();
                    if (!$material) {
                        $material = Material::create([
                            'name' => $name,
                            'genre_id' => 16
                        ]);
                    }

                    $material_ids[] = $material->id;
                }
            }
        }
        $recipe->materials()->sync($material_ids);
        return redirect()->route('recipes.index');
    }

    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->materials()->detach();
        $recipe->delete();
        return redirect()->route('recipes.index');
    }

    public function  manageMaterial()
    {
        $genres = Genre::with('materials')->get();
        return view('materials.manage', compact('genres'));
    }

    public function storeMaterial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠]+$/u',
            'genre_id' => 'required|exists:genres,id',
        ], [
            'name.regex' => '入力できない記号が含まれています'
        ]);

        Material::firstOrCreate([
            'name' => $request->name,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('materials.manage');
    }

    public function editMaterial(string $id)
    {
        $material = Material::findOrFail($id);

        $genres = Genre::all();

        return view('materials.edit', compact('material', 'genres'));
    }

    public function updateMaterial(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠]+$/u',
            'genre_id' => 'required|exists:genres,id',
        ], [
            'name.regex' => '入力できない記号が含まれています'
        ]);

        $material = Material::findOrFail($id);

        $material->update([
            'name' => $request->name,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('materials.manage');
    }

    public function destroyBulkMaterials(Request $request)
    {
        $ids = $request->material_ids ?? [];
        $cannot_delete_names = [];

        if (!empty($ids)) {
            foreach ($ids as $id) {
                $material = Material::find($id);
                if ($material) {
                    if ($material->recipes()->exists()) {
                        $cannot_delete_names[] = $material->name;
                    } else {
                        $material->recipes()->detach();
                        $material->delete();
                    }
                }
            }
        }

        if (!empty($cannot_delete_names)) {
            $names = implode('、', $cannot_delete_names);
            return redirect()->route('materials.manage')
                ->with('alert_message', "【{$names}】は、使用されています");
        }
        return redirect()->route('materials.manage');
    }
}
