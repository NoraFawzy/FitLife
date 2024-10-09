<?php

namespace App\Http\Controllers;

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
}
