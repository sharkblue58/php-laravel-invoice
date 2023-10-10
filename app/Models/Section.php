<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['section_name', 'description', 'created_by'];
    public function products(): HasMany
    {
      return  $this->hasMany(Product::class);
    }
}
