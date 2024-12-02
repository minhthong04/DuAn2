<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function scopeActiveEntries($query)
    {
        return $query->where(['status' => 1, 'is_approved' => 1]);
    }

    // app/Models/News.php

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
