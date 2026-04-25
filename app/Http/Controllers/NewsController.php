<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Announcement;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $announcements = Announcement::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // Separate the latest one as featured
        $featured = $news->first();
        $gridNews = $news->slice(1);

        return view('news.index', compact('featured', 'gridNews', 'news', 'announcements'));
    }

    public function show($slug)
    {
        $item = News::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Get related news or recent news for sidebar
        $recentNews = News::where('is_published', true)
            ->where('id', '!=', $item->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $announcements = Announcement::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('news.show', compact('item', 'recentNews', 'announcements'));
    }
}
