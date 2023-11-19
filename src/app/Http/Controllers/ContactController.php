<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('index');
    }
    //->middleware([ContactRequests::class])

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function find()
    {
        $contacts = Contact::simplePaginate(4);
        return view('find', ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $item = Contact::where('last_name', 'LIKE', "%{$request->input}%")->get();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    //getFullNameAttribute

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/find');
    }
}
