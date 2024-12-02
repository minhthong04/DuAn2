<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tin với is_breaking_news = 1 và status = 1
        $heroSlider = News::with(['category'])
            ->where('is_breaking_news', 1)
            ->where('status', 1)
            ->where('is_approved', 1)
            ->orderBy('id', 'DESC')
            ->take(7)
            ->get();

        // Sắp xếp theo id với DESC, lấy 5 tin mới nhất
        $recentNews = News::orderBy('id', 'DESC')
            ->activeEntries()
            ->take(6)
            ->get();


        // Sắp xếp theo views với DESC, lấy 5 tin có lượt xem cao nhất
        $mostViewedPosts = News::activeEntries()
            ->orderBy('views', 'DESC')
            ->take(4)
            ->get();

        // // Lấy tất cả các chuyên mục có tin tức
        // $categorySection = Category::with(['news' => function ($query) {
        //     $query->where('status', 1);
        // }])->get();

        return view('frontend.home', compact(
            'heroSlider',
            'recentNews',
            'mostViewedPosts'
            // 'categorySection'
        ));
    }

    public function news(Request $request)
    {
        $news = News::query();

        $news->when($request->filled('category'), function ($query) use ($request) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        });


        $news->when($request->has('search'), function ($query) use ($request) {
            $search = '%' . $request->search . '%';
            $query->where('title', 'like', $search)
                ->orWhere('content', 'like', $search)
                ->orWhereHas('category', fn($q) => $q->where('name', 'like', $search));
        });

        $news = $news->activeEntries()->paginate(4);


        $recentNews = News::with(['category'])
            ->activeEntries()
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $categories = Category::where(['status' => 1])->get();


        return view('frontend.news', compact('news', 'recentNews', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->first();

        return view('frontend.detail', compact('news'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
