<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // MENAMPILKAN HALAMAN INDEX
    public function index()
    {
        return view('backend.category.index', [
            'categories' => Category::get()
        ]);
    }



    // UNTUK MENAMBAH DATA
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:12'
        ]);

        $data['slug'] = Str::slug($data['name']);
        Category::create($data);

        return back()->with('success', 'Kategori Berhasil di Tambahkan.');
    }




    // UNTUK MERUBAH DATA
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:12'
        ]);

        $data['slug'] = Str::slug($data['name']);
        Category::find($id)->update($data);

        return back()->with('success', 'Kategori Berhasil di Ubah.');
    }





    // UNTUK MENGHAPUS DATA
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back()->with('success', 'Kategori Berhasil di Hapus.');
    }
}
