<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    // Cart.php (Model)
protected $table = 'charts';


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alat() {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
    
}
