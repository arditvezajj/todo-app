<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ["title" ,"content" , "completed_at","due_date",];
}
// public  function getPriority()
//     {
//         $priority = [
//             '1' => low,
//             '2' => 'medium',
//             '3' => 'high',
//             '4' => 'risk',
//             '5' => 'none',
//         ];
//         return $priority;
//     }