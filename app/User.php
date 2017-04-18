<?php

namespace App;

use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasDefender;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
}//end class
