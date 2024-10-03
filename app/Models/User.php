<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'PhoneNumber',
        'birthday',
        'profile_photo',
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

    /**
     * Get the addresses for the user.
     */
    public function address(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function salesOrder(): HasMany
    {
        return $this->hasMany(SalesOrderDetail::class, 'customer_id');
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'user_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

}
