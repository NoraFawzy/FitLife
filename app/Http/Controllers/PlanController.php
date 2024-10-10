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

            return redirect()->route('plans.indexx')->with('success', 'تم تحديث الخطة بنجاح');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على الخطة');
        }
    }

    public function destroy($id)
    {
        // البحث عن الخطة وحذفها
        $plan = Plan::find($id);

        if ($plan) {
            $plan->delete();
            return redirect()->route('plans.indexx')->with('success', 'تم حذف الخطة بنجاح');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على الخطة');
        }
    }

    
    public function subscribe($planId)
    {
        // Get the currently authenticated user
        $user = auth()->user();
        
        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to subscribe.');
        }
    
        // Find the plan by its ID
        $plan = Plan::findOrFail($planId);
        
        // Associate the plan with the user
        $user->is_subscribed = true; // Set subscription status
        
        // Save the user instance
        if ($user->save()) {
            // Optionally, you could also associate the plan with the user if needed
            // $user->plans()->attach($planId); // Uncomment if you have a many-to-many relationship
            
            // Redirect to profile with a success message
            return redirect()->route('profile.show')->with('success', 'Subscription successful!');
        } else {
            // Handle the case when saving fails
            return redirect()->route('profile.show')->with('error', 'Subscription failed. Please try again.');
        }
    }
    
}
