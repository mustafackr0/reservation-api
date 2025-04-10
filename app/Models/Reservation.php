<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'hotel_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'guest_count',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
}
