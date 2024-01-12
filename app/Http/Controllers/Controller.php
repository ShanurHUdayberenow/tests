<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function profile() {
        $fields = [
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Ady',
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'E-poçta',
            ],
            [
                'name' => 'phoneNumber',
                'type' => 'text',
                'label' => 'Telefon belgi',
                'prefix' => '+993'
            ],
            [
                'name' => 'avatar',
                'type' => 'image',
                'label' => 'Surat'
            ],
            [
                'name' => 'oldPassword',
                'type' => 'password',
                'label' => 'Köne parol',
            ],
            [
                'name' => 'newPassword',
                'type' => 'password',
                'label' => 'Täze parol'
            ]
        ];
        return view('admin.profile', [
            'fields' => $fields,
            'user' => auth()->user()
        ]);
    }
    public function profilePost(\Illuminate\Http\Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'phoneNumber' => 'required|min:8|max:8',
        ]);
        if ($request->newPassword) {
            if (!$request->oldPassword)
                return redirect()->back()->withErrors([trans('message.enter_old_password')]);
            if (Hash::check($request->oldPassword, auth()->user()->password)) {
                if (strlen($request->newPassword) < 8)
                    return redirect()->back()->withErrors([trans('message.password_8_character')]);
                auth()->user()->update([
                    'password' => bcrypt($request->newPassword)
                ]);
            } else {
                return redirect()->back()->withErrors([trans('message.old_password_wrong')]);
            }
        }
        $filename = auth()->user()->filename;
        $avatar = auth()->user()->avatar;
        if ($request->hasFile('avatar')) {
            if ($filename) {
                Storage::disk('public')->delete('images/avatars/'.$filename);
            }
            $filename = $request->avatar->hashName();
            $request->avatar->storeAs('images/avatars/', $filename, 'public');
            $avatar = url('storage/images/avatars/'.$filename);
        } else if ($request->avatarImageDeleted == 'true') {
            if ($filename != null) {
                Storage::disk('public')->delete('images/avatars/'.$filename);
            }
            $filename = null;
            $avatar = null;
        }
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'avatar' => $avatar,
            'filename' => $filename
        ]);
        return redirect()->back()->with('message', trans('message.profile_updated_successfully'));
    }
}
