<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Request;
use App\Models\EmployeeJob;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getRecord(){

        $return = self::select('users.*');

        // search box start
        if(!empty(Request::get('id'))){
            $return = $return->where('id', Request::get('id'));
        }

        if(!empty(Request::get('name'))){
            $return = $return->where('name', 'like', '%' .Request::get('name'). '%');
        }

        if(!empty(Request::get('last_name'))){
            $return = $return->where('last_name', 'like', '%' .Request::get('last_name'). '%');
        }

        if(!empty(Request::get('email'))){
            $return = $return->where('email' , Request::get('email'));
        }

        $return = $return->orderBy('id', 'desc')->paginate(20);

        return $return;

    }

    public function get_job_single(){
        return $this->belongsTo(EmployeeJob::class , 'job_id');
    }

    public function get_manager_single(){
        return $this->belongsTo(Manager::class  ,  'manager_id');
    }

    public function get_department_single(){
        return $this->belongsTo(Department::class , 'department_id');
    }
}
