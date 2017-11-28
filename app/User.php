<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'age',
                           'about',
                           'name',
                           'email',
                           'password',
                           'phone_number',
                          ];

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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
                        'status' => 'boolean',
                    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'last_login',
                    ];

    /**
     * Metric Rating relation.
     *
     * @return Illuminate\Database\Eloquent\HasManyRelation
     **/
    public function ratings()
    {
        return $this->hasMany('App\Entities\Rating');
    }

    /**
     * Hash user password.
     *
     * @param string $password Password string to be hashed
     **/
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * User timline activites.
     **/
    public function log()
    {
        return $this->hasMany('App\Timeline');
    }

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function self(self $user)
    {
        return $user->id === $this->id;
    }
}//end class
