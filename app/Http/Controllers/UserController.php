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
        $user = UserList::paginate(config('variable.paginate'));
        return view('user_forms.userlist', compact('user'));
    }
    
    public function create() {
        return view('user_forms.create');
    }

    public function uploadImageAvatar($image) {
        $avatar = uniqid(). "_" .$image->getClientOriginalName();
        $image->storeAs(config('variable.link'), $avatar);
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
        $user = UserList::findOrFail($id);
        return view('user_forms.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = UserList::find($id);
        if ($request->hasFile('avatar')) {
            $image = $user->avatar;
            Storage::delete(config('variable.link').$image); 
            $avatar = $this->uploadImageAvatar($request->file('avatar'));
            $data['avatar'] = $avatar;
        }
        $user->update($data);
        return redirect('users')->with('message', __('messages.success.edit'));
    }
  
    public function destroy($id) {
        UserList::findOrFail($id)->delete();
        return redirect('users');
    }

}

