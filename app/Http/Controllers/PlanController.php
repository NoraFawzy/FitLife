<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        // جلب جميع الخطط من قاعدة البيانات
        $plans = Plan::all();
        // عرض الخطط في عرض 'users.subscriptions'
        return view('users.subscriptions', compact('plans'));
    }

    public function indexx()
    {
        // جلب جميع الخطط من قاعدة البيانات
        $plans = Plan::all();
        // عرض الخطط في عرض 'users.subscriptions'
        return view('admin.plans-list', compact('plans'));
    }

    public function create()
    {
        return view('admin.add-plan'); // عرض صفحة إضافة خطة
    }

    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        // إنشاء خطة جديدة
        Plan::create([
            'name' => $validatedData['name'],
            'sub_title' => $validatedData['sub_title'],  // إضافة sub_title
            'desc' => $validatedData['desc'],
            'price' => $validatedData['price'],
            'duration' => $validatedData['duration'],
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('plans.indexx')->with('success', 'Plan added successfully.');
    }


    public function edit($id)
    {
        // جلب الخطة من قاعدة البيانات
        $plan = Plan::findOrFail($id);
        // عرض صفحة التعديل مع تمرير الخطة
        return view('admin.edit-plan', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        // تحقق من صحة البيانات المُدخلة
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        // البحث عن الخطة وتحديث البيانات
        $plan = Plan::find($id);

        if ($plan) {
            $plan->update([
                'name' => $validatedData['name'],
                'sub_title' => $validatedData['sub_title'],
                'desc' => $validatedData['desc'],
                'price' => $validatedData['price'],
                'duration' => $validatedData['duration'],
            ]);

            return redirect()->route('plans.indexx')->with('success', 'Plan Updated Successfuly');
        } else {
            return redirect()->back()->with('error', 'No plan found!');
        }
    }

    public function destroy($id)
    {
        // البحث عن الخطة وحذفها
        $plan = Plan::find($id);

        if ($plan) {
            $plan->delete();
            return redirect()->route('plans.indexx')->with('success', 'Plan Deleted Successfuly');
        } else {
            return redirect()->back()->with('error', 'No plan found!');
        }
    }

    
    public function subscribe($planId)
    {
        // Get the currently authenticated user
        $user = auth()->user();
        
        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('loginn')->with('error', 'You need to be logged in to subscribe.');
        }
    
        // Check if the user is an admin
        if ($user->role === 'admin') { // Check if the user's role is 'admin'
            alert()->error('Error', 'Admins cannot subscribe to plans.');
            return redirect()->route('profile.show');
        }
    
        // Find the plan by its ID
        $plan = Plan::findOrFail($planId);
    
        // Check if the user is already subscribed to this plan
        if ($user->is_subscribed && $user->plan_id == $plan->id) {
            alert()->warning('Warning', 'You are already subscribed to this plan.');
            return redirect()->route('profile.show');
        }
    
        // Check if the user is subscribed to any other plan
        if ($user->is_subscribed) {
            alert()->error('Error', 'You are already subscribed to another plan.');
            return redirect()->route('profile.show');
        }
    
        // Update the user's subscription status and associate the plan
        $user->is_subscribed = true; // Set subscription status to true
        $user->plan_id = $plan->id;  // Associate the plan with the user
        
        // Save the user instance
        if ($user->save()) {
            // Redirect to profile with a success message
            alert()->success('Success', 'Successfully subscribed to the plan.');
            return redirect()->route('profile.show');
        } else {
            // Handle the case when saving fails
            alert()->error('Error', 'Subscription failed. Please try again.');
            return redirect()->route('profile.show');
        }
    }
    
    
    
}
