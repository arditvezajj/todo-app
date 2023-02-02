<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{  
    use HasFactory;

    protected $fillable = ['title', 'content', 'completed_at', 'due_date', 'priority'];

    protected $dates = ['due_date'];

    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
    const RISK = 'risk';
    const NONE = 'none';

    public static function getPriorities()
    {
        return $priority = [
            'low' => self::LOW,
            'medium' => self::MEDIUM,
            'high' => self::HIGH,
            'risk' => self::RISK,
            'none' => self::NONE,
        ];
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'todos_tags', 'todo_id', 'tag_id');
    }
}