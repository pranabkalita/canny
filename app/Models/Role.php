<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
