<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{  
    use HasFactory;

    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
    const RISK = 'risk';
    const NONE = 'none';


    protected $fillable = ['title', 'content', 'completed_at', 'due_date', 'priority'];

    protected $dates = ['due_date'];

    public static function getPriorities()
    {
        $priority = [
            'low' => self::LOW,
            'medium' => self::MEDIUM,
            'high' => self::HIGH,
            'risk' => self::RISK,
            'none' => self::NONE,
        ];
        return $priority;
    }
}