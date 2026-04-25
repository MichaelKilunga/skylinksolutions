<x-action-section>
    <x-slot name="title">
        {{ __('Account Deletion Request') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Request that your account be deleted by the administrator.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            @if (auth()->user()->deletion_requested_at)
                <div class="p-4 bg-red-50 border-l-4 border-red-400 text-red-700 mb-4">
                    {{ __('You have requested that your account be deleted. An administrator will review your request shortly.') }}
                    <div class="text-xs mt-1">Requested on: {{ auth()->user()->deletion_requested_at->format('M d, Y H:i') }}</div>
                </div>
            @else
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before requesting deletion, please download any data or information that you wish to retain.') }}
            @endif
        </div>

        <div class="mt-5">
            @if (auth()->user()->deletion_requested_at)
                <form method="POST" action="{{ route('profile.cancel-deletion') }}">
                    @csrf
                    <x-secondary-button type="submit">
                        {{ __('Cancel Deletion Request') }}
                    </x-secondary-button>
                </form>
            @else
                <form method="POST" action="{{ route('profile.request-deletion') }}" onsubmit="return confirm('Are you sure you want to request account deletion?')">
                    @csrf
                    <x-danger-button type="submit">
                        {{ __('Request Account Deletion') }}
                    </x-danger-button>
                </form>
            @endif
        </div>
    </x-slot>
</x-action-section>
