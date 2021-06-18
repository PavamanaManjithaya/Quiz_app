<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use App\Models\User;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password','visible_password','occupation','address','phone','bio','is_admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    private $limit=10;

    public function storeUser($data){
        $data['visible_password']=$data['password'];
        $data['password']=bcrypt($data['password']);
        $data['is_admin']=0;
        return User::create($data);
    }
    public function allUser(){
        return User::latest()->paginate($this->limit);
    }
    public function findUser($id){
        return User::find($id);
    }
    public function updateUser($data,$id){
        $user=User::find($id);
        if ($data['password']) {
            $user->password=bcrypt($data['password']);
            $user->visible_password=$data['password'];
        }
        $user->name=$data['name'];
        $user->occupation=$data['occupation'];
        $user->address=$data['address'];
        $user->bio=$data['bio'];
        $user->save();
        return $user;
    }
    public function destroyUser($id){
      return User::find($id)->delete();
    }
}
