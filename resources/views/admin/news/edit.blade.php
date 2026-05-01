@extends('admin.layouts.app')
@section('title', 'Edit News')
@section('page-title', 'Edit News Article')

@push('styles')
<style>
    .form-container { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 32px; max-width: 900px; }
    .form-group { margin-bottom: 24px; }
    label { display: block; font-size: 13px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; }
    .form-control { width: 100%; background: rgba(15,23,42,0.5); border: 1px solid var(--border); border-radius: 10px; padding: 12px 16px; color: var(--text); font-size: 14px; transition: all 0.2s; }
    .form-control:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
    textarea.form-control { min-height: 120px; resize: vertical; }
    
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    
    .file-input-wrapper { position: relative; }
    .file-input-label { display: flex; align-items: center; gap: 10px; padding: 12px 16px; background: #fff; border: 1px dashed rgba(255,255,255,0.2); border-radius: 10px; cursor: pointer; color: var(--text-muted); font-size: 14px; transition: all 0.2s; }
    .file-input-label:hover { border-color: #3b82f6; color: #fff; background: rgba(59,130,246,0.05); }
    input[type="file"] { position: absolute; opacity: 0; width: 0; height: 0; }

    .preview-box { display: flex; align-items: center; gap: 12px; margin-top: 10px; padding: 10px; background: rgba(255,255,255,0.03); border-radius: 8px; }
    .preview-img { width: 80px; height: 50px; border-radius: 4px; object-fit: cover; }
    .preview-info { font-size: 12px; color: #64748b; }

    .btn-submit { padding: 12px 28px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 14px; font-weight: 700; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.3); }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    .btn-cancel { padding: 12px 24px; background: transparent; border: 1px solid var(--border); border-radius: 10px; color: var(--text-muted); font-size: 14px; font-weight: 600; text-decoration: none; transition: all 0.2s; margin-right: 12px; }
    .btn-cancel:hover { background: #fff; color: #fff; }

    .checkbox-group { display: flex; align-items: center; gap: 10px; margin-top: 10px; }
    .checkbox-group input { width: 18px; height: 18px; cursor: pointer; }
</style>
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Article Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter a catchy title" value="{{ old('title', $news->title) }}" required>
            @error('title') <span style="color:#ef4444; font-size:12px;">{{ $message }}</span> @enderror
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control" placeholder="e.g. System Update, Company" value="{{ old('category', $news->category) }}">
            </div>
            <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="e.g. Michael Kilunga" value="{{ old('author_name', $news->author_name) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt (Short Summary)</label>
            <textarea name="excerpt" id="excerpt" class="form-control" placeholder="A brief summary for the news grid">{{ old('excerpt', $news->excerpt) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Full Content</label>
            <textarea name="content" id="content" class="form-control" placeholder="The full story goes here..." style="min-height:250px;">{{ old('content', $news->content) }}</textarea>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label>Featured Image</label>
                <div class="file-input-wrapper">
                    <label for="image" class="file-input-label">
                        <i class="fas fa-image"></i> <span>Replace News Image</span>
                    </label>
                    <input type="file" name="image" id="image">
                </div>
                @if($news->image)
                    <div class="preview-box">
                        <img src="{{ Str::startsWith($news->image, 'images/') ? asset($news->image) : asset('storage/' . $news->image) }}" class="preview-img">
                        <div class="preview-info">Current featured image</div>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Author Avatar</label>
                <div class="file-input-wrapper">
                    <label for="author_image" class="file-input-label">
                        <i class="fas fa-user-circle"></i> <span>Replace Author Image</span>
                    </label>
                    <input type="file" name="author_image" id="author_image">
                </div>
                @if($news->author_image)
                    <div class="preview-box">
                        <img src="{{ Str::startsWith($news->author_image, 'images/') ? asset($news->author_image) : asset('storage/' . $news->author_image) }}" class="preview-img" style="width:40px; height:40px; border-radius:50%;">
                        <div class="preview-info">Current avatar</div>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group checkbox-group">
            <input type="checkbox" name="is_published" id="is_published" {{ $news->is_published ? 'checked' : '' }}>
            <label for="is_published" style="margin-bottom:0;">Published</label>
        </div>

        <div style="margin-top:40px; display:flex; justify-content:flex-end; align-items:center;">
            <a href="{{ route('admin.news.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">Update Article</button>
        </div>
    </form>
</div>
@endsection

