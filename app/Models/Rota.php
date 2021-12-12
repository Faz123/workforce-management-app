<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_number', 'week_ending',
        'shift_type', 'shift_day',
        'duties', 'start_time',
        'end_time', 'holiday_approved', 'holiday_requested', 'store_code', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
