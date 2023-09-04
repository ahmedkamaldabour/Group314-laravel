<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'major_id'
    ];

    public const IMAGE_PATH = 'uploads/doctors/';

    public static $rules = [
        'name' => 'required|string|max:255',
        'major_id' => 'required|exists:majors,id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
