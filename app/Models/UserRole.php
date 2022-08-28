<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class UserRole extends Model
{
    protected $table = 'user_role';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
    
}