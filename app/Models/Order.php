<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_address',
        'payment_method',
        'status'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Custom Attribute: Formatted Total
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    // Custom Attribute: Payment Method Label
    public function getPaymentMethodLabelAttribute()
    {
        return match($this->payment_method) {
            'transfer' => 'Transfer Bank',
            'cod' => 'Cash on Delivery (COD)',
            'ewallet' => 'E-Wallet',
            default => $this->payment_method
        };
    }

    // Custom Attribute: Status Badge
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge bg-warning">Menunggu</span>',
            'processing' => '<span class="badge bg-info">Diproses</span>',
            'completed' => '<span class="badge bg-success">Selesai</span>',
            'cancelled' => '<span class="badge bg-danger">Dibatalkan</span>',
            default => '<span class="badge bg-secondary">' . $this->status . '</span>'
        };
    }
}
