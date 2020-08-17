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
        $userlist = UserList::paginate(config('variable.paginate'));
        return view('user_forms.userlist', compact('userlist'));
    }
    
    public function create() {
        return view('user_forms.create');
    }

    public function uploadImageAvatar($image)
    {
        $fileNameToStore = time() . '-' .$image->getClientOriginalName();
        $image->storeAs('/public/avatar',$fileNameToStore);
        $fileToStore = 'storage/avatar/'.$fileNameToStore;
        return $fileToStore;
    }

    public function store(UserRequest $request) {
        $fileNameToStore = '';
        if($request->hasFile('avatar')) {
            $fileNameToStore = $this->uploadImageAvatar($request->file('avatar'));
        }
        UserList::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $fileNameToStore
        ]);
        return redirect('users')->with('message', __('messages.success.add'));
    }

    public function edit($id) {
        $us = UserList::findOrFail($id)->toArray();
        return view('user_forms.edit', compact('us'));
    }
  
    public function update(UserRequest $request) {
        $data = [ 
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone
        ];
        if($request->hasFile('avatar')) {
            $fileToStore = $this->uploadImageAvatar($request->file('avatar'));
            $data['avatar'] = $fileToStore;
        }
        UserList::findOrFail($request->id)->update($data);
        return redirect('users')->with('message', __('messages.success.edit'));
    }
    
    public function destroy($id) {
        UserList::findOrFail($id)->delete();
        return redirect('users');
    }
}
