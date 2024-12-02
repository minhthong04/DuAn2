<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Chữ "Models" viết hoa
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(2);
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function indexForm()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category-list'); // Sửa lại tên hàm
    }

    public function editForm($id)
    {
        return view('admin.category.edit', ['category' => Category::where('id', $id)->first()]);
    }

    public function updateCategory(Request $request)
    {
        $category = Category::findOrFail(
            $request->id
        );
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category-list'); // Sửa lại tên hàm
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
