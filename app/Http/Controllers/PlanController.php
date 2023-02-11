<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mpdf\Tag\Sub;
use function Symfony\Component\String\s;

class PlanController extends Controller
{
    public function choosePlan(Request $request)
    {
        $subscription = Subscription::checkIfHasPlanSubscription(auth()->user()->id);
        if (!$subscription) {
            $plan = $request->plan;
            $plan_id = null;
            if ($plan == 'basic-monthly') {
                $plan_id = 1;
            } else if ($plan == 'basic-yearly') {
                $plan_id = 2;
            } else if ($plan == 'standard-monthly') {
                $plan_id = 3;
            } else if ($plan == 'standard-yearly') {
                $plan_id = 4;
            } else if ($plan == 'premium-monthly') {
                $plan_id = 5;
            } else if ($plan == 'premium-yearly') {
                $plan_id = 6;
            }
            $subscription = Subscription::create([
                'plan_id' => $plan_id,
                'media_owner_id' => auth()->user()->id,
                'subscribed_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('message', 'You have chosen the ' . $plan . ' plan successfully. Subscription ID is ' . $subscription->id . ', date: ' . ' ' . Carbon::now());
        }
        $plan = $this->getPlan($subscription->plan_id);
        return redirect()->back()->withErrors('You already have a subscription in the ' . $plan->name . ' plan, with subscription ID ' . $subscription->id . ' date: ' . ' ' . $subscription->subscribed_at);
    }

    public function updatePlan()
    {

    }

    public function deletePlan()
    {

    }

    public static function getPlan($subscriptionId)
    {
        return Plan::getPlan($subscriptionId);
    }

}
