<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'uuid',
        'first_name',
        'lastname',
        'ssn',
        'phone',
        'email'
    ];

    /**
     * @return mixed
     */
    public function hasEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function hasPhone(): mixed
    {
        return $this->phone;
    }
}
