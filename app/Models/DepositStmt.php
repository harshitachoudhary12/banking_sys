<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class DepositStmt extends Model
{
    protected $table = 'deposit_stmt';
    protected $fillable = [
        'id',
        'user_id',
        'amt',
        'date_time',
        'status',
        'sender_id',
        'created_at',
        'updated_at'
    ];
    
}