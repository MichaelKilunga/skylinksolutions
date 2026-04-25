@extends('admin.layouts.app')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@push('styles')
<style>
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 1024px) {
        .profile-grid {
            grid-template-columns: 2fr 1fr;
        }
    }
    .card {
        background: var(--bg-sidebar);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px;
    }
    .card-header {
        margin-bottom: 20px;
        border-bottom: 1px solid var(--border);
        padding-bottom: 16px;
    }
    .card-title {
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 4px;
    }
    .card-subtitle {
        font-size: 13px;
        color: var(--text-muted);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 8px;
    }
    .form-control {
        width: 100%;
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--border);
        color: #fff;
        padding: 12px 16px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        transition: all 0.2s;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        background: rgba(255,255,255,0.08);
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        text-decoration: none;
    }
    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: #fff;
    }
    .btn-primary:hover {
        box-shadow: 0 4px 12px rgba(59,130,246,0.3);
        transform: translateY(-1px);
    }
    .btn-danger {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    .btn-danger:hover {
        background: var(--danger);
        color: #fff;
    }
    .avatar-upload {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
    }
    .avatar-preview {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--bg-card);
        border: 2px solid var(--border);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--primary);
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .text-danger { color: var(--danger); font-size: 12px; margin-top: 4px; display: block; }
</style>
@endpush

@section('content')

<div class="profile-grid">
    <div class="left-col">
        <!-- Profile Information -->
        <div class="card mb-4" style="margin-bottom: 24px;">
            <div class="card-header">
                <h2 class="card-title">Profile Information</h2>
                <p class="card-subtitle">Update your account's profile information and email address.</p>
            </div>
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="avatar-upload">
                    <div class="avatar-preview">
                        @if($user->profile_photo_path)
                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <label class="btn" style="background: rgba(255,255,255,0.1); color: #fff;">
                            <i class="fas fa-camera"></i> Change Photo
                            <input type="file" name="photo" style="display: none;" accept="image/*" onchange="previewImage(this)">
                        </label>
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Position / Job Title</label>
                    <input type="text" name="position" class="form-control" value="{{ old('position', $user->position) }}">
                    @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="4">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>

        <!-- Update Password -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Update Password</h2>
                <p class="card-subtitle">Ensure your account is using a long, random password to stay secure.</p>
            </div>
            <form action="{{ route('admin.profile.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required autocomplete="current-password">
                    @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" required autocomplete="new-password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>

    <div class="right-col">
        <!-- Delete Account -->
        @if(!auth()->user()->hasRole('super-admin'))
        <div class="card" style="border-color: rgba(239, 68, 68, 0.3);">
            <div class="card-header">
                <h2 class="card-title" style="color: var(--danger);">Delete Account</h2>
                <p class="card-subtitle">Request to permanently delete your account.</p>
            </div>
            
            <p style="font-size: 14px; color: var(--text-muted); margin-bottom: 20px; line-height: 1.6;">
                Once your account is deleted, all of its resources and data will be permanently deleted. If you wish to proceed, you can submit a deletion request to the system administrators.
            </p>

            @if($user->deletion_requested_at)
                <div style="background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); padding: 12px; border-radius: 8px; color: var(--warning); font-size: 13px; font-weight: 500;">
                    <i class="fas fa-clock"></i> Your deletion request is pending review (Requested on {{ $user->deletion_requested_at->format('M d, Y') }}).
                </div>
            @else
                <form action="{{ route('admin.profile.deletion') }}" method="POST" onsubmit="return confirm('Are you sure you want to request account deletion?');">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Request Account Deletion
                    </button>
                </form>
            @endif
        </div>
        @else
        <div class="card">
             <div class="card-header">
                <h2 class="card-title">Super Admin</h2>
                <p class="card-subtitle">Account deletion is restricted.</p>
            </div>
            <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">
                As a super admin, your account cannot be deleted via the interface to prevent accidental lockout of the system.
            </p>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.querySelector('.avatar-preview');
                preview.innerHTML = `<img src="${e.target.result}" style="width:100%; height:100%; object-fit:cover;">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush

@endsection
