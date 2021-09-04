<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'role_id',
    'avatar',
    'first_name',
    'last_name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public const ROLES = [
    'ADMIN' => 'admin',
    'SELLER' => 'seller',
    'USER' => 'user'
  ];

  // HOOKS

  public  static function booted()
  {
    static::creating(function ($model) {
      $model->avatar = asset('/images/avatars/dummy-profile.svg');
    });
  }

  // RELATIONSHIPS

  public function role()
  {
    return $this->belongsTo(Role::class);
  }
}
