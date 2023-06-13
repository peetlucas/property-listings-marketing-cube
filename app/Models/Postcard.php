<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postcard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',            
        'price',
        'online_at',
        'offline_at',
        'is_draft',
        'user_id',
        'team_id'
    ];

    // Relationship To User

    public function scopeFilter($query, array $filters) {
        
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
