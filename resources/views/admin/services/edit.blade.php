@extends('admin.layouts.app')
@section('title', 'Edit Service')
@section('page-title', 'Edit Service: ' . $service->title)

@push('styles')
    <style>
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 13px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #60a5fa;
        }

        .edit-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 14px;
            transition: all 0.2s;
            outline: none;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            background: rgba(139, 92, 246, 0.08);
        }

        .btn-submit {
            padding: 12px 24px;
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
        }

        .item-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .item-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .item-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .item-info img {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            object-fit: cover;
        }

        .item-info i {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(139, 92, 246, 0.1);
            border-radius: 6px;
            color: #a78bfa;
        }

        .btn-del-small {
            color: #f87171;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            opacity: 0.6;
            transition: 0.2s;
        }

        .btn-del-small:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .toggle-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toggle-switch {
            position: relative;
            width: 44px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toggle-slider:before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            left: 2px;
            top: 2px;
            background: #94a3b8;
            border-radius: 50%;
            transition: 0.3s;
        }

        input:checked+.toggle-slider {
            background: rgba(16, 185, 129, 0.3);
            border-color: rgba(16, 185, 129, 0.5);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(20px);
            background: #10b981;
        }
    </style>
@endpush

@section('content')
    <a href="{{ route('admin.services.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Services
    </a>

    <div class="edit-grid">
        <div class="main-column">
            <!-- Basic Info -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-info-circle text-primary"></i> Basic Information</h3>
                <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $service->title) }}" required>
                        </div>
                        <div class="form-group">
                            <label>Icon Class</label>
                            <input type="text" name="icon" class="form-control"
                                value="{{ old('icon', $service->icon) }}">
                        </div>
                    </div>

                    {{-- <div class="form-group">
                    <label>Banner Image</label>
                    @if ($service->banner_image)
                        <img src="{{ asset('storage/' . $service->banner_image) }}" style="width:100%; height:150px; object-fit:cover; border-radius:10px; margin-bottom:10px;">
                    @endif
                    <input type="file" name="banner_image" class="form-control">
                </div> --}}

                    <div class="form-group">
                        <label>Short Description (Tagline)</label>
                        <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $service->short_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Full Description</label>
                        <textarea name="description" class="form-control" rows="10">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Active Status</label>
                        <div class="toggle-row">
                            <label class="toggle-switch">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1"
                                    {{ old('status', $service->status) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                            <span style="color:#94a3b8; font-size:14px;">Show this service on the website</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>

            <!-- Features Section -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-list-ul text-warning"></i> Service Features (Cards)</h3>

                <div class="item-list mb-4">
                    @forelse($service->features as $feature)
                        <div class="item-card">
                            <div class="item-info">
                                <i class="{{ $feature->icon ?? 'fas fa-check' }}"></i>
                                <div>
                                    <div style="font-weight:600; color:#fff;">{{ $feature->title }}</div>
                                    <div style="font-size:12px; color:#64748b;">{{ Str::limit($feature->description, 50) }}
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.services.features.delete', $feature) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-del-small" onclick="return confirm('Delete feature?')"><i
                                        class="fas fa-times"></i></button>
                            </form>
                        </div>
                    @empty
                        <p style="text-align:center; color:#475569; padding:20px;">No features added yet.</p>
                    @endforelse
                </div>

                <hr style="border-color:rgba(255,255,255,0.05); margin:24px 0;">

                <form method="POST" action="{{ route('admin.services.features.add', $service) }}">
                    @csrf
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                        <div class="form-group">
                            <label>Feature Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. 24/7 Support"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Icon Class</label>
                            <input type="text" name="icon" class="form-control" placeholder="fa fa-clock">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Feature Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Briefly explain this feature..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit" style="background:#4b5563;"><i class="fas fa-plus"></i> Add
                        Feature</button>
                </form>
            </div>
        </div>

        <div class="side-column">
            <!-- Slider Images -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-images text-success"></i> Slider Images</h3>

                <div class="item-list mb-4">
                    @foreach ($service->images as $img)
                        <div class="item-card">
                            <div class="item-info">
                                <img src="{{ asset('storage/' . $img->image) }}">
                                <span style="font-size:13px; color:#fff;">{{ $img->title ?? 'Slide Image' }}</span>
                            </div>
                            <form method="POST" action="{{ route('admin.services.images.delete', $img) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-del-small"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <form method="POST" action="{{ route('admin.services.images.add', $service) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>New Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Caption (Optional)</label>
                        <input type="text" name="title" class="form-control" placeholder="Slide caption...">
                    </div>
                    <button type="submit" class="btn-submit" style="width:100%;"><i class="fas fa-upload"></i>
                        Upload</button>
                </form>
            </div>

            <!-- Projects Section -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-project-diagram text-info"></i> Recent Projects</h3>

                <div class="item-list mb-4">
                    @foreach ($service->projects as $proj)
                        <div class="item-card">
                            <div class="item-info">
                                <img src="{{ asset('storage/' . $proj->image) }}">
                                <div>
                                    <div style="font-size:13px; color:#fff;">{{ $proj->title }}</div>
                                    <div style="font-size:11px; color:#64748b;">{{ $proj->category }}</div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.services.projects.delete', $proj) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-del-small"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <form method="POST" action="{{ route('admin.services.projects.add', $service) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Project Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" placeholder="e.g. E-commerce">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Live Link (Optional)</label>
                        <input type="url" name="link" class="form-control" placeholder="https://...">
                    </div>
                    <button type="submit" class="btn-submit" style="width:100%; background:#0ea5e9;"><i
                            class="fas fa-plus"></i> Add Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection
