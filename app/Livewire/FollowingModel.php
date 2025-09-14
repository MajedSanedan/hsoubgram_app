<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class FollowingModel extends ModalComponent
{
    public $userId;
    protected $user;
    public function getfollowingListProperty()
    {
        $this->user = User::find($this->userId);
        return $this->user->following()->wherePivot('confirmed',true)->get();
    }

    public function unfollow($userId)
    {
        $userunfollow = User::find($userId);
        Auth::user()->unfollow($userunfollow);
        $this->dispatch('unfollowuser');
    }
    public function render()
    {
        return view('livewire.following-model');
    }
}
