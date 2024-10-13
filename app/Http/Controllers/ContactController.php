<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\alert;
use App\Mail\Contact as ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'cf-name' => 'required|max:255',
            'cf-email' => 'required|email',
            'cf-message' => 'required',
        ]);

        // Save the contact data
        Contact::create([
            'name' => $request->input('cf-name'),
            'email' => $request->input('cf-email'),
            'message' => $request->input('cf-message'),
        ]);

        // Redirect with success message
        alert()->success('Nice to see you', 'We have received your message and will contact you shortly');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $usemailers = Contact::where('email', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $usemailers = Contact::orderBy('created_at')->get();
        }

        // Display messages in the view
        return view('admin.contact', compact('usemailers'));
    }

    public function updateCheckedStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->checked = $request->has('checked') ? 1 : 0; // Update checked status
        $contact->save();
        alert()->success('Success', 'Message has been handled');
        return redirect()->route('contacts');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            alert()->success('Success', 'Email deleted successfully.');
            return redirect()->route('contacts');
        }
        alert()->warning('Email not found.');
        return redirect()->route('contacts');
    }

    public function reply(Request $request, $id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Email not found.');
        }

        // Validate the message input
        $request->validate([
            'message' => 'required|string',
        ]);

        // Send the email using the Contact Mailable
       // Mail::to($contact->email)->send(new ContactMail($request->message));

        alert()->success('Success', 'Email sent successfully.');
        return redirect()->back();
    }

    public function markAsChecked(Request $request, $id)
    {
        $email = Contact::find($id);
        $email->is_checked = true; // Mark email as checked
        $email->save();

        return response()->json(['success' => true]);
    }
}
