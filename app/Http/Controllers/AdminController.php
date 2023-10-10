<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function loginHandler(Request $request, Response $response) {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' =>  'La saisie de votre email ou pseudo est obligatoire',
                'login_id.email'    =>  'Adresse email invalide.',
                'login_id.exists'   =>  'Cette adresse email n\'existe pas dans le système.',
                'password.required' =>  'Le mot de passe est obligatoire.'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' =>  'La saisie de votre email ou pseudo est obligatoire',
                //'login_id.exists'   =>  'Ce pseudo n\'existe pas dans le système.',
                'login_id.exists'   =>  'Ces paramètres de connexion n\'existent pas dans le système.',
                'password.required' =>  'Le mot de passe est obligatoire.'
            ]);
        }

        $credentials = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.home');
        } else {
            session()->flash('fail', 'Paramètres de connexion incorrects.');
            return redirect()->route('admin.login');
        }
    }


    public function logout() {
        Auth::guard('admin')->logout();
        session()->flash('fail', 'Vous vous êtes deconnecté !');
        return redirect()->route('admin.login');
    }

    public function profileView()
    {
        $adminUser = null;
        if(Auth::guard('admin')->check()) {
            $adminUser = Admin::findOrFail(auth()->id());
        }
        return view('back.pages.admin.profile', compact('adminUser'));
    }

    public function changeProfilePicture(Request $request) {
        $admin = Admin::findOrFail(auth('admin')->id());
        $path = 'uploads/users/admins/';
        $file = $request->file('adminProfilePictureFile');
        $old_picture = $admin->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $filename = 'ADMIN_IMG_'.rand(2,1000).$admin->id.time().uniqid().'.jpg';

        $upload = $file->move(public_path($path), $filename);

        if($upload) {
            /* When img is uploaded successfully, delete admin old picture */
            if($old_picture != null && File::exists(public_path($path.$old_picture))) {
                File::delete(public_path($path.$old_picture));
            }
            /* and update the admin profile pic name in db */
            $admin->update(['picture'=>$filename]);
            return response()->json(['status'=>0, 'msg'=>'Votre photo de profil a été mise à jour.']);
        } else {
            return response()->json(['status'=>0, 'msg'=>'Something went wrong.']);
        }
    }

}
