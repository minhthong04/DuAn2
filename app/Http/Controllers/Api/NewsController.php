<?php

namespace App\Http\Controllers\Api;

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
        $news = News::query()->orderBy('id', 'DESC')->paginate(5);
        return response()->json($news);
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image' => ['required']
        ]);

        // Sử dụng hàm handleFileUpload từ trait FileUploadTrait
        // $imagePath = $this->handleFileUpload($request, 'image');

        $news = new News();
        $news->category_id = $request->category;
        $news->image = $request->image;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;

        $news->save();

        return response()->json($news, 201);
    }

    public function updateNews(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            // 'image' => ['required']
        ]);

        $news = News::findOrFail($request->id);
        $news->category_id = $request->category;
        if (isset($request->image) && !empty($request->image)) {
            $news->image = $request->image;
        }
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;

        $news->save();

        return response()->json($news);
    }

    public function detail(Request $request, $id)
    {
        // Lấy thông tin danh mục cùng với các bài viết thuộc danh mục đó
        $category = Category::with('news')->findOrFail($id);

        return response()->json($category);
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
