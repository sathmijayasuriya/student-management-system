<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserProfile extends Component
{

    public $first_name, $last_name, $email, $userId;
    public $showUpdateForm = false;
    public $showPasswordForm = false;
    public $current_password, $new_password, $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->userId = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function enableEdit()
    {
        $this->showUpdateForm = true;
        $this->showPasswordForm = false;
    }
        public function enablePasswordChange()
    {
        $this->showPasswordForm = true;
        $this->showUpdateForm = false;
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }


    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        $user = User::find($this->userId);
        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ]);

        $this->showUpdateForm = false;
        session()->flash('message', 'Profile updated successfully!');
    }

        public function changePassword()
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::find($this->userId);
        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->showPasswordForm = false;
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        session()->flash('message', 'Password changed successfully!');
    }


    public function deleteProfile()
    {
        $user = User::find($this->userId);
        Auth::logout();
        $user->delete();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}