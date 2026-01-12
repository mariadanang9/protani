<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    use HasFactory;

    // Disable updated_at (we only need created_at)
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'activity_type',
        'weight',
        'session_id',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    /**
     * Relationship: Activity belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Activity belongs to Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Activity Types
     */
    const TYPE_VIEW = 'view';
    const TYPE_CART = 'cart';
    const TYPE_PURCHASE = 'purchase';

    /**
     * Activity Weights
     */
    const WEIGHT_VIEW = 1;
    const WEIGHT_CART = 2;
    const WEIGHT_PURCHASE = 3;
}
