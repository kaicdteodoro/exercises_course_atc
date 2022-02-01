<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'id_number'];
    public static $form_data = ['name', 'email', 'phone', 'id_number'];
    public static $rules = [
        'name' => 'string|required|max:255',
        'email' => 'string|required|max:255|unique:users',
        'phone' => 'string|required|max:255',
        'id_number' => 'string|required|max:255'
    ];
    public static $messages = ['name.required' => 'Um nome é obrigatório'];
    protected $casts = ['name' => 'string', 'email' => 'string', 'phone' => 'string', 'id_number' => 'string'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
