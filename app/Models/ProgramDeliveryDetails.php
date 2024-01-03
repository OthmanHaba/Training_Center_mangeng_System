<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramDeliveryDetails extends Model
{
    use HasFactory;

    public function program_delivery_trainers(): HasMany
    {
        return $this->hasMany(ProgramDeliveryTrainers::class);
    }
}
