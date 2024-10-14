<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index(Request $request)
    {
        // جلب قيمة البحث من الطلب (Request)
        $search = $request->query('search');

        // إذا كان هناك بحث، ابحث عن المستخدمين بالبريد الإلكتروني
        if ($search) {
            $users = User::where('email', 'LIKE', "%{$search}%")->get();
        } else {
            // إذا لم يكن هناك بحث، اعرض جميع المستخدمين
            $users = User::with('plan')->orderBy('id', 'asc')->get(); // إحضار المستخدمين مع خطتهم، ترتيب حسب تاريخ الإنشاء
        }
        // عرض المستخدمين في الواجهة
        return view('admin.users-list', compact('users'));
    }


    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        $plans = Plan::all(); // احضار جميع الخطط
        return view('users.create', compact('plans')); // تمرير الخطط إلى العرض
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
            'plan_id' => 'nullable|exists:plans,id',
            'gender' => ['required', 'string', 'in:male,female'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'plan_id' => $request->plan_id,
            'gender' => $request->gender, // تخزين الجنس
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    public function show($id)
    {
        $user = User::with('plan')->findOrFail($id); // احضار المستخدم مع خطته
        return view('users.show', compact('user')); // تمرير المستخدم إلى العرض
    }

    // عرض صفحة تعديل المستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $plans = Plan::all(); // استرجاع جميع الخطط
        return view('users.edit', compact('user', 'plans'));
    }

    // تحديث معلومات المستخدم
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
            'plan_id' => 'nullable|exists:plans,id',
            'gender' => 'required|string|in:male,female', // إضافة قواعد التحقق
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'plan_id' => $request->plan_id,
            'gender' => $request->gender, // تحديث الجنس
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // حذف المستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
