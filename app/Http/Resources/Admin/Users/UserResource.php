<?php

namespace App\Http\Resources\Admin\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'role' => $this->role->name,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'avatar' => $this->avatar,
      'dates' => [
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ]
    ];
  }
}
