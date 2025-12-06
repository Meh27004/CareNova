<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
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
}

