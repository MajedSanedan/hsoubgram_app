<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PandingFollowersCount extends Component
{
    protected $listeners = [
        'reqConfirmed' => '$refresh',
        'reqDeleted' => '$refresh',
        'followstatuschanged' => '$refresh',
    ];

    public function getCountProperty()
    {
        return Auth::user()->panding_followers()->count();
    }
    public function render()
    {
        return view('livewire.panding-followers-count');
    }
}
