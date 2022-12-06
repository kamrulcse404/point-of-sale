<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'admin_id',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function sales(){
        return $this->hasMany(SaleInvoice::class);
    }
}
