<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PandingFollowersList extends Component
{
    protected $follower;

    protected $listeners = [
        'reqConfirmed' => '$refresh',
        'reqDeleted' => '$refresh',
        'followstatuschanged' => '$refresh',
    ];

    public function confirme($id)
    {
        dd($id);
        // $this->follower = User::find($id);
        // Auth::user()->confirme($this->follower);
        // $this->dispatch('reqConfirmed');
    }
    public function delete($id)
    {
        $this->follower = User::find($id);
        Auth::user()->deleteReq($this->follower);
        $this->dispatch('reqDeleted');
    }
    public function render()
    {
        return view('livewire.panding-followers-list');
    }
}
