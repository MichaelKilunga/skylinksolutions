@extends('admin.layouts.app')
@section('title', 'Manage Sliders')
@section('page-title', 'Home Sliders')

@section('topbar-actions')
    <a href="{{ route('admin.sliders.create') }}" class="topbar-btn" style="background: var(--primary); color: #fff; border: none;">
        <i class="fas fa-plus"></i> Add New Slider
    </a>
@endsection

@section('content')
<div class="panel">
    <div class="panel-header">
        <span class="panel-title">Active Hero Sliders</span>
    </div>
    <div class="panel-body p-0">
        <div class="table-responsive">
            <table class="table datatable" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 1px solid var(--border);">
                        <th style="padding: 15px 22px; color: var(--text-muted); font-size: 13px;">Image</th>
                        <th style="padding: 15px 22px; color: var(--text-muted); font-size: 13px;">Title & Description</th>
                        <th style="padding: 15px 22px; color: var(--text-muted); font-size: 13px;">Order</th>
                        <th style="padding: 15px 22px; color: var(--text-muted); font-size: 13px;">Status</th>
                        <th style="padding: 15px 22px; color: var(--text-muted); font-size: 13px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 15px 22px;">
                                <img src="{{ asset($slider->image) }}" style="width: 100px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border);">
                            </td>
                            <td style="padding: 15px 22px;">
                                <div style="font-weight: 600; color: #fff;">{{ $slider->title }}</div>
                                <div style="font-size: 12px; color: var(--text-muted); max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $slider->description }}
                                </div>
                            </td>
                            <td style="padding: 15px 22px; color: var(--text-muted);">{{ $slider->order }}</td>
                            <td style="padding: 15px 22px;">
                                <form action="{{ route('admin.sliders.toggle', $slider) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                                        @if($slider->is_active)
                                            <span style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700;">Active</span>
                                        @else
                                            <span style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700;">Inactive</span>
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td style="padding: 15px 22px; text-align: right;">
                                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="topbar-btn" style="padding: 6px 10px; font-size: 12px;"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Delete this slider?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="topbar-btn" style="padding: 6px 10px; font-size: 12px; color: var(--danger);"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 40px; text-align: center; color: var(--text-muted);">No sliders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
