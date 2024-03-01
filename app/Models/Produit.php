<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=[
        'RefPdt',
        'LibPdt' ,
        'prix' ,
        'Qte' ,
        'description',
        'id_type',
        'image',
    ];
    protected $primaryKey = 'RefPdt';
    public $incrementing = false; // Set to false to indicate that the primary key is not auto-incrementing
    protected $keyType = 'string'; // Assuming RefPdt is a string
   
    public function type(){
        return $this->belongsTo(Type::class, 'id_type');
    }
}
