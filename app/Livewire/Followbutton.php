<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followbutton extends Component
{
    public $isFollowing;
    public $isPanding;
    public $userfriend;
    public $classes;
    public $showbg;

    public function mount($userfriend,$showbg=false)
    {
        $this->userfriend=$userfriend;
        $this->updafollowStatus();
        $this->showbg=$showbg;
    }

    public function toggleFollow()
    {
        $user=Auth::user();
        if($this->isFollowing)
        {
            $user->unfollow($this->userfriend);
        } elseif(!$this->isPanding)
        {
            $user->follow($this->userfriend);
        }
        $this->updafollowStatus();

    }

    public function updafollowStatus()
    {
        $user=Auth::user();
        $this->isFollowing=$user->isFollowing($this->userfriend);
        $this->isPanding=$user->isPanding($this->userfriend);
    }
    public function render()
    {
        return view('livewire.followbutton');
    }
}
