<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? asset('/storage/donaturs/' . $value) : 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100',
        );
    }
}
