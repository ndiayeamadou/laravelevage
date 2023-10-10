<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminProfileTabs extends Component
{
    /* the default tab parameter adding to the profile page URL */
    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'];
    public $name, $email, $username, $admin_id;
    public $old_password, $new_password, $new_password_confirmation;

    public function selectTab($tab) {
        $this->tab = $tab;
    }

    public function mount() {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        if(Auth::guard('admin')->check()) {
            $admin = Admin::findOrFail(auth()->id());
            $this->admin_id = $admin->id;
            $this->name = $admin->name;
            $this->username = $admin->username;
            $this->email = $admin->email;
        }
    }

    public function updateAdminPersonalDetails() {
        //dd('update');
        $this->validate([
            'name' => 'required|string|min:5',
            'email'=> 'required|email|unique:admins,email'.$this->admin_id,//|unique:table,column,except,id,
            'username' => 'required|min:3|unique:admins,username'.$this->admin_id
        ]);
        Admin::find($this->admin_id)
                ->update([
                    'name'  => $this->name,
                    'email'  => $this->email,
                    'username'  => $this->username,
                ]);
        /*  */
        $this->emit('updateAdminUserHeaderInfo');
        $this->dispatchBrowserEvent('updateAdminInfo', [
            'adminName' => $this->name,
            'adminEmail'=> $this->email
        ]);

        $this->showToastr('success', 'Vos détails personnels ont bien été mis à jour.');
    }

    public function changePassword() {
        $this->validate([
            'old_password' => 'required|string|min:5',
            /* 'old_password' => [
                'required', function($attribute, $value, $fail) {
                    // auth('admin')->id())->password |equals also to| $this->admin_id
                    if(!Hash::check($value, Admin::find(auth('admin')->id())->password)) {
                        return $fail(__('L\'ancien mot de passe saisi est incorrect.'));
                    }
                }
            ], */
            'new_password' => 'required|confirmed|string|min:5|max:45',
        ]);
        $oldpwd = null;
        $admin = Admin::findOrFail($this->admin_id);
        if($admin) {
            $oldpwd = $admin->password;
        }
        if(!Hash::check($this->old_password, $oldpwd)) {
            $this->showToastr('error', 'L\'ancien mot de passe saisi est incorrect.');
            return;
        }

        //$admin->update(['password'=>$this->new_password]);
        $admin->update(['password'=>Hash::make($this->new_password)]);
        $this->showToastr('success', 'Votre mot de passe a bien été modifié.');
        $this->new_password = $this->new_password_confirmation = $this->old_password = null;
    }

    public function showToastr($type, $message) {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'  => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.admin-profile-tabs');
    }
}
