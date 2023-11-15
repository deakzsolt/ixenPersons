<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'permanent_address',
        'temporary_address',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * This will return email
     *
     * @return HasMany
     */
    public function personEmails(): HasMany
    {
        return $this->hasMany(PersonEmail::class);
    }

    /**
     * This will return mobile number
     *
     * @return HasMany
     */
    public function personMobiles(): HasMany
    {
        return $this->hasMany(PersonMobile::class);
    }

    /**
     * This will return phone number
     *
     * @return HasMany
     */
    public function personTelephones(): HasMany
    {
        return $this->hasMany(PersonTelephone::class);
    }
}
