<?php

namespace App\Models;

use App\Helpers\AlphabetIdConverter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 */
class Link extends Model
{
    use HasFactory;

    protected $fillable = ['original_link'];

    protected function shortLink(): Attribute
    {
        return Attribute::make(
            get: function () {
            return AlphabetIdConverter::convertToAlphabetId($this->id);
        }
        );
    }
}
