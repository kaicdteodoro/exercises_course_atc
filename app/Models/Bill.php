<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['invoice', 'installment', 'value', 'client_id', 'due_date', 'payment_date'];
    protected $casts = ['invoice' => 'int', 'installment' => 'int', 'value' => 'float', 'client_id' => 'int'];
    public static $rules = [
        'invoice' => 'required|max:255',
//        'installment' => 'required|max:255|unique:users',
//        'value' => 'required|max:255',
    ];
    public static $messages = ['invoice.required' => 'Uma fatura é obrigatória'];
    protected $dates = ['due_date', 'payment_date', 'created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
