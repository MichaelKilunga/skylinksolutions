<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest('published_at')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'category'     => ['nullable', 'string', 'max:100'],
            'content'      => ['required', 'string'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'author_name'  => ['nullable', 'string', 'max:100'],
            'image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
            'author_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->hasFile('author_image')) {
            $data['author_image'] = $request->file('author_image')->store('authors', 'public');
        }

        $news = News::create($data);

        if ($news->is_published) {
            \App\Jobs\NotifySubscribersOfNewContent::dispatch($news, 'news');
        }

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'category'     => ['nullable', 'string', 'max:100'],
            'content'      => ['required', 'string'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'author_name'  => ['nullable', 'string', 'max:100'],
            'image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
            'author_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? ($news->published_at ?? now()) : null;

        if ($request->hasFile('image')) {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->hasFile('author_image')) {
            if ($news->author_image && Storage::disk('public')->exists($news->author_image)) {
                Storage::disk('public')->delete($news->author_image);
            }
            $data['author_image'] = $request->file('author_image')->store('authors', 'public');
        }

        $wasPublished = $news->is_published;
        $news->update($data);

        if (!$wasPublished && $news->is_published) {
            \App\Jobs\NotifySubscribersOfNewContent::dispatch($news, 'news');
        }

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image) Storage::disk('public')->delete($news->image);
        if ($news->author_image) Storage::disk('public')->delete($news->author_image);
        
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News article deleted.');
    }

    public function togglePublish(News $news)
    {
        $news->update([
            'is_published' => !$news->is_published,
            'published_at' => !$news->is_published ? now() : $news->published_at,
        ]);

        if ($news->is_published) {
            \App\Jobs\NotifySubscribersOfNewContent::dispatch($news, 'news');
        }

        return back()->with('success', 'News status updated.');
    }
}
