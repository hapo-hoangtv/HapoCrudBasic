<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserList extends Model
{
    protected $table = 'user_lists';
    public $timestamps = false; 
    protected $fillable = ['name','address','email','phone','avatar'];

    use SoftDeletes;
    
    public function deleteUserList($id)
    {
        return UserList::where('id', $id)->delete();
    }
}
