<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminUserHeaderProfileInfoComp extends Component
{
    public $admin;
    public $userSeller;

    public $listeners = [
        'updateAdminUserHeaderInfo' => '$refresh'
    ];

    public function mount() {
        if(Auth::guard('admin')->check()) {
            $this->admin = Admin::findOrFail(auth()->id());
        }
    }
    public function render()
    {
        return view('livewire.admin-user-header-profile-info-comp');
    }
}
