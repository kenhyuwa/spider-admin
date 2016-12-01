<?php 

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'name', 'address', 'phone', 'roles', 'images_profile'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class, 'profile_id');
    }
}