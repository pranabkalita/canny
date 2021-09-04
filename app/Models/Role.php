<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
  use HasFactory;

  public const ROLES = [
    'ADMIN' => 'Admin',
    'SELLER' => 'Seller',
    'USER' => 'User'
  ];

  // RELATIONSHIPS

  public function users()
  {
    return $this->hasMany(User::class);
  }
}
