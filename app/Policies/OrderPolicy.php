<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Determine if user can view any orders
     */
    public function viewAny(User $user): bool
    {
        // All authenticated users can view their own orders list
        return true;
    }

    /**
     * Determine if user can view the order
     */
    public function view(User $user, Order $order): bool
    {
        // User can only view their own orders
        return $user->id === $order->user_id;
    }

    /**
     * Determine if user can update the order
     */
    public function update(User $user, Order $order): bool
    {
        // User can only update their own pending orders
        return $user->id === $order->user_id && $order->status === 'pending';
    }

    /**
     * Determine if user can cancel the order
     */
    public function cancel(User $user, Order $order): bool
    {
        // User can only cancel their own pending orders
        return $user->id === $order->user_id && $order->status === 'pending';
    }
}
