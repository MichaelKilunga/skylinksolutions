@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('page-title', 'Edit User: ' . $user->name)

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

        .form-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 32px;
            max-width: 800px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 22px;
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
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            outline: none;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            background: rgba(139, 92, 246, 0.08);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.12);
        }

        .form-error {
            font-size: 12px;
            color: #f87171;
            margin-top: 6px;
        }

        .toggle-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
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

        .toggle-label {
            font-size: 14px;
            color: #94a3b8;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(139, 92, 246, 0.4);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <a href="{{ route('admin.users.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>

    <div class="form-card">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name <span style="color:#f87171;">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="John Doe"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address <span style="color:#f87171;">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-row">
                <div class="form-group">
                    <label for="password">Password (leave blank to keep current)</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••">
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        placeholder="••••••••">
                </div>
            </div> --}}

            <div class="form-row">
                <div class="form-group">
                    <label for="position">Job Position</label>
                    <input type="text" id="position" name="position" class="form-control"
                        placeholder="e.g. Software Developer" value="{{ old('position', $user->position) }}">
                    @error('position')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">System Role <span style="color:#f87171;">*</span></label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="user"
                            {{ old('role', $user->hasRole('super-admin') ? 'super-admin' : 'user') == 'user' ? 'selected' : '' }}>
                            User</option>
                        <option value="super-admin"
                            {{ old('role', $user->hasRole('super-admin') ? 'super-admin' : 'user') == 'super-admin' ? 'selected' : '' }}>
                            Super Admin</option>
                    </select>
                    @error('role')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="bio">Bio / Description (for Team section)</label>
                <textarea id="bio" name="bio" class="form-control" rows="3" placeholder="Brief introduction...">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="sort_order">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" class="form-control"
                        value="{{ old('sort_order', $user->sort_order) }}">
                    <div style="font-size:11px;color:#475569;margin-top:4px;">Lower numbers appear first in the Team
                        section.</div>
                </div>
                <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
                        <img src="{{ $user->profile_photo_url }}"
                            style="width:40px;height:40px;border-radius:50%;object-fit:cover;" alt="">
                        <span style="font-size:12px;color:#64748b;">Current Photo</span>
                    </div>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                    @error('photo')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Team Visibility</label>
                    <div class="toggle-row">
                        <label class="toggle-switch">
                            <input type="checkbox" name="is_visible"
                                {{ old('is_visible', $user->is_visible) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        <span class="toggle-label">Show on "About Us" page</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Login Access</label>
                    <div class="toggle-row">
                        <label class="toggle-switch">
                            <input type="checkbox" name="can_login"
                                {{ old('can_login', $user->can_login) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        <span class="toggle-label">Allow this user to login</span>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection
