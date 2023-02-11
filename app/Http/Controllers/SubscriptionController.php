<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSubscription($subscriptionId)
    {
        return Subscription::getSubscription($subscriptionId);
    }

    public function checkIfHasPlanSubscription($userId)
    {
        return Subscription::checkIfHasPlanSubscription($userId);
    }
}
