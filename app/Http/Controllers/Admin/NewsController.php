<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    use FileUploadTrait; // Sử dụng trait

    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index', ['news' => $news]);
    }

    public function indexForm()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image' => ['required']
        ]);

        // Sử dụng hàm handleFileUpload từ trait FileUploadTrait
        $imagePath = $this->handleFileUpload($request, 'image');

        $news = new News();
        $news->category_id = $request->category;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;

        $news->save();

        return redirect()->route('news-list');
    }

    public function editForm($id)
    {
        $categories = Category::all();
        return view('admin.news.edit', ['news' => News::where('id', $id)->first(), 'categories' => $categories]);
    }

    public function updateNews(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            // 'image' => ['required']
        ]);

        $news = News::findOrFail($request->id);
        // Sử dụng hàm handleFileUpload từ trait FileUploadTrait

        $imagePath = $this->handleFileUpload($request, 'image');
        $news->category_id = $request->category;
        if ($imagePath) {
            $news->image = $imagePath;
        }
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;

        $news->save();

        return redirect()->route('news-list');
    }

    public function deleteNews($id)
    {
        try {
            $news = News::findOrFail($id);
            $this->deleteFile($news->image);
            $news->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
