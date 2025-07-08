<div class="container mt-4">
    <div class="card mx-auto" style="max-width: auto;">
        <div class="card-body">
            <h2 class="card-title mb-4">My Profile</h2>

            @if (session()->has('message'))
                <div class="alert alert-success" x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show">
                    {{ session('message') }}
                </div>
            @endif

            @if ($showUpdateForm)
                <div>
                    <div class="mb-3">
                        <label class="form-label">First Name:</label>
                        <input type="text" wire:model="first_name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="text" wire:model="last_name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" wire:model="email" class="form-control" />
                    </div>

                    <button wire:click="updateProfile" class="btn btn-outline-primary">Save</button>
                    <button wire:click="$set('showUpdateForm', false)" class="btn btn-light"
                        style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;">Cancel</button>
                </div>
            @elseif ($showPasswordForm)
                <div>
                    <div class="mb-3">
                        <label class="form-label">Current Password:</label>
                        <input type="password" wire:model="current_password" class="form-control" />
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password:</label>
                        <input type="password" wire:model="new_password" class="form-control" />
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password:</label>
                        <input type="password" wire:model="new_password_confirmation" class="form-control" />
                    </div>

                    <button wire:click="changePassword" class="btn btn-outline-primary">Change Password</button>
                    <button wire:click="$set('showPasswordForm', false)" class="btn btn-light"
                        style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;">Cancel</button>
                </div>
            @else
                <p><strong>Name:</strong> {{ $first_name }} {{ $last_name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>

                <button wire:click="enableEdit" class="btn btn-light"
                    style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;">
                    <i class="ti ti-pencil"></i> Edit Profile
                </button>

                <button wire:click="enablePasswordChange" class="btn btn-light"
                    style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;">
                    <i class="ti ti-key"></i> Change Password
                </button>

                <button wire:click="deleteProfile" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete your profile?')">
                    Delete Profile
                </button>
            @endif
        </div>
    </div>
</div>
