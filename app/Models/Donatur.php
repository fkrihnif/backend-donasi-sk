<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;	// <-- import Auth Laravel

class Donatur extends Authenticatable
{
    use HasFactory, HasApiTokens;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];
    
    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * donations
     *
     * @return void
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * avatar
     *
     * @return Attribute
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/donaturs/' . $value) ?? 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $value) . '&background=4e73df&color=ffffff&size=100',
        );
    }
    
}