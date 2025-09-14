<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class FollowerModel extends ModalComponent
{
    
    public $userId;
    protected $user;
    public function getfollowerListProperty()
    {
        $this->user = User::find($this->userId);
        return $this->user->followers()->wherePivot('confirmed',true)->get();
    }
    public function removeFollower($userId)
    {
        $userremove = User::find($userId);
        $this->user= User::find($this->userId);
        $userremove->unfollow($this->user);
        $this->dispatch('unfollowuser');
    }

 
    public function render()
    {
        return view('livewire.follower-model');
    }
}
