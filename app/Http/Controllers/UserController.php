<?php
namespace App\Http\Controllers;

use App\User;
use App\UserList;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $us = UserList::paginate(config('variable.paginate'));
        return view('user_forms.userlist', compact('us'));
    }
    
    public function create() {
        return view('user_forms.create');
    }

    public function uploadImageAvatar($image) {
        $avatar = uniqid(). "_" .$image->getClientOriginalName();
        $image->storeAs('public/avatar/', $avatar);
        return $avatar;
    }

    public function store(UserRequest $request)
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $this->uploadImageAvatar($request->file('avatar'));
        }
        UserList::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $avatar
        ]);
        return redirect('users')->with('message', __('messages.success.add'));
    }
        
    public function edit($id) {
        $us = UserList::findOrFail($id);
        return view('user_forms.edit', compact('us'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $us = UserList::find($id);
        if ($request->hasFile('avatar')) {
            $avatar = $this->uploadImageAvatar($request->file('avatar'));
            $image = $us->avatar;
            Storage::delete('public/avatar/'.$image);    
            $data['avatar'] = $avatar;
        }
        $us->update($data);
        return redirect('users')->with('message', __('messages.success.edit'));
    }
  
    public function destroy($id) {
        UserList::findOrFail($id)->delete();
        return redirect('users');
    }

}
