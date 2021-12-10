<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function list()
    {
        $emails = \App\Models\TestEmail::all();
        $results = [];

        foreach ($emails as $key => $email) {
            $results[$key]['id'] = $email->id;
            $results[$key]['email'] = $email->email;
            $results[$key]['subject'] = $email->subject;
            $results[$key]['body'] = $email->body;
            $results[$key]['body'] = $email->body;
            $results[$key]['attachments'] = $email->attachments ? asset('storage/attachments/' . $email->attachments) : '';
        }

        return $results;
    }

    public function send(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'subject' => 'required|string',
            'body' => 'required|string'
        ]);

        try {
            // If any attachment found
            $attachments = '';

            if ($request->file('attachments')) {
                $attachments = time() . '_' . $request->file('attachments')->getClientOriginalName();
                $request->file('attachments')->move(storage_path('app/public/attachments/'), $attachments);
            }

            $testEmail = \App\Models\TestEmail::create([
                'email' => $fields['email'],
                'subject' => $fields['subject'],
                'body' => $fields['body'],
                'attachments' => $attachments,
            ]);

            Mail::to($testEmail->email)->send(new TestEmail($testEmail));
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'error on mail sending ' . $e->getMessage()]);
        }

        return response()->json(['status' => 'success', 'message' => 'Mail sent successfully']);
    }
}
