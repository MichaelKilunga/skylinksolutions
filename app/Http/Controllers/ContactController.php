<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'contact_name' => ['required', 'string', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'subject'      => ['required', 'string', 'max:255'],
            'text'         => ['required', 'string'],
        ]);

        \App\Models\ContactMessage::create([
            'name'    => $data['contact_name'],
            'phone'   => $data['phone'] ?? null,
            'subject' => $data['subject'],
            'message' => $data['text'],
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:subscribers,email'],
            'name'  => ['nullable', 'string', 'max:255'],
        ]);

        $subscriber = \App\Models\Subscriber::create($data);

        try {
            \Illuminate\Support\Facades\Mail::to($subscriber->email)->send(new \App\Mail\NewsletterSubscribed($subscriber));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Newsletter subscription email failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for subscribing! A confirmation email has been sent to ' . $subscriber->email);
    }

    public function unsubscribe($token)
    {
        $subscriber = \App\Models\Subscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber) {
            $subscriber->update(['is_active' => false]);
            return view('news.unsubscribed', ['email' => $subscriber->email]);
        }

        return redirect('/news')->with('error', 'Invalid unsubscription token.');
    }

    public function requestQuote(Request $request)
    {
        $data = $request->validate([
            'fullname'     => ['required', 'string', 'max:255'],
            'location'     => ['required', 'string', 'max:255'],
            'device'       => ['required', 'string'],
            'phone_number' => ['required', 'string', 'max:30'],
            'message'      => ['nullable', 'string'],
        ]);

        \App\Models\ContactMessage::create([
            'name'    => $data['fullname'],
            'phone'   => $data['phone_number'],
            'subject' => 'Quote Request: ' . ucfirst($data['device']) . ' at ' . $data['location'],
            'message' => $data['message'] ?? 'No additional details provided.',
        ]);

        return redirect()->back()->with('success', 'Your quote request has been sent! We will contact you shortly.');
    }

    public function applyVolunteer(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'string', 'max:30'],
            'skills'     => ['required', 'string'],
            'motivation' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('volunteers', 'public');
        }

        \App\Models\Volunteer::create($data);

        return redirect()->back()->with('success', 'Your volunteer application has been submitted successfully! Thank you for your interest.');
    }

    public function applyField(Request $request)
    {
        $data = $request->validate([
            'full_name'      => ['required', 'string', 'max:255'],
            'university'     => ['required', 'string', 'max:255'],
            'program'        => ['required', 'string', 'max:255'],
            'year_of_study'  => ['required', 'string', 'max:50'],
            'start_date'     => ['required', 'date'],
            'end_date'       => ['required', 'date', 'after:start_date'],
            'duration_weeks' => ['required', 'integer'],
            'experience'     => ['nullable', 'string'],
            'learning_goals' => ['nullable', 'string'],
            'source'         => ['nullable', 'string'],
            'attachment'     => ['required', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('field_applications', 'public');
        }

        \App\Models\FieldApplication::create($data);

        return redirect()->back()->with('success', 'Your field application has been submitted successfully! We will review it soon.');
    }
}
