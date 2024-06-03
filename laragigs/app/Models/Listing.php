<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'email', 'logo', 'location', 'description', 'tags', 'website', 'company'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['tag'])) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if (isset($filters['search'])) {
            $query->where('tags', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('title', 'like', '');
        }
    }
}
