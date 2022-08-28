<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class WithdrawStmt extends Model
{
    protected $table = 'withdraw_stmt';
    protected $fillable = [
        'id',
        'user_id',
        'amt',
        'date_time',
        'status',
        'receiver_id',
        'created_at',
        'updated_at'
    ];
    
}