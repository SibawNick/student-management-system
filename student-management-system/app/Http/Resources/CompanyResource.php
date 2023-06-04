<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'street' => $this->street,
            'phone' => $this->phone,
            'email' => $this->email,
            'reg_no' => $this->reg_no,
            'logo' => asset($this->logo),
        ];
    }
}
