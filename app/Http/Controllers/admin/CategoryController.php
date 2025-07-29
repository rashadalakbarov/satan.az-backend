<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->orderBy('name')->paginate(10);
        return view('categories-index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get(); // sadece ana kategoriler
        return view('categories-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'default_fullname' => trim($request->input('default_fullname'))
        ]);

        $request->validate([
            'default_fullname' => 'required|string|max:255',
            'default_select' => 'nullable|exists:categories,id',
            'default_activate' => 'required',
            'default_image' => 'nullable|image|max:2048',
        ], [
            'default_image.required' => 'Şəkil sahəsi boş buraxılmamalıdır.',
            'default_image.image' => 'Yüklənən nesne şəkil formatında deyil',
            'default_image.max' => 'Şəkil sahəsi ən çox :max mb ola bilər.',

            'default_fullname.required' => 'Kateqoriyanın adı boş buraxılmamalıdır.',
            'default_fullname.string' => 'Kateqoriyanın adı mətn şəklində olmalıdır.',
            'default_fullname.max' => 'Kateqoriyanın adı ən çox :max simvol ola bilər.',

            'default_activate.required' => 'Kateqoriyanın aktivliyi boş buraxılmamalıdır.',

            'default_select.exists' => 'Kateqoriya mövcuddur',
        ]);

        if ($request->hasFile('default_image')) {
            $file = $request->file('default_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            // Yeni resmi kaydet
            $path = $file->store('categories', 'public'); // storage/app/public/logo

            $data['image'] = $path;
        } else {
            $data['image'] = null;
        }

        Category::create([
            'image' => $data['image'],
            'name' => $request->default_fullname,
            'seflink' => Str::slug($request->default_fullname),
            'parent_id' => $request->default_select,
            'activate' => $request->default_activate,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori əlavə edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $allCategories = Category::where('id', '!=', $id)->get(); // kendisi hariç diğer kategoriler (ana kategori seçimi için)

        return view('categories-edit', compact('category', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'default_fullname' => trim($request->input('default_fullname'))
        ]);

        $request->validate([
            'default_fullname' => 'required|string|max:255',
            'default_select' => 'nullable|exists:categories,id',
            'default_activate' => 'required',
            'default_image' => 'nullable|image|max:2048',
        ], [
            'default_image.required' => 'Şəkil sahəsi boş buraxılmamalıdır.',
            'default_image.image' => 'Yüklənən nesne şəkil formatında deyil',
            'default_image.max' => 'Şəkil sahəsi ən çox :max mb ola bilər.',

            'default_fullname.required' => 'Kateqoriyanın adı boş buraxılmamalıdır.',
            'default_fullname.string' => 'Kateqoriyanın adı mətn şəklində olmalıdır.',
            'default_fullname.max' => 'Kateqoriyanın adı ən çox :max simvol ola bilər.',

            'default_activate.required' => 'Kateqoriyanın aktivliyi boş buraxılmamalıdır.',

            'default_select.exists' => 'Kateqoriya mövcuddur',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('default_image')) {
            $file = $request->file('default_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            // Önceki logoyu sil
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Yeni resmi kaydet
            $path = $file->store('categories', 'public'); // storage/app/public/logo

            $data['image'] = $path;
        } else {
            $data['image'] = null;
        }

        $category->image = $data['image'];
        $category->name = $request->default_fullname;
        $category->seflink = Str::slug($request->default_fullname);
        $category->parent_id = $request->default_select;
        $category->activate = $request->default_activate;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Eğer resim varsa, dosyayı sil
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori silindi.');
    }
}
