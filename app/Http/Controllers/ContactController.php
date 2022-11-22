<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    function sendMail(ContactRequest $request)
    {
        // dd($request);
        $contact = new Contact($request->validated());
        $validated = $request->validated();
        $contact->save();
        // $contact->save();
        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)
        // 確認はmailHogで行う(localhost:8025)
        // Mail::to('test@test.com')->send(new ContactAdminMail($validated));
        return to_route('contact.complete');
    }

    public function complete()
    {
        return view('contact.complete');
    }


    public function top()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }
    public function detail(Contact $contact)
    {

        // dd($contact);
        return view('admin.contacts.detail', compact('contact'));
    }

    // 指定したIDの削除処理
    public function destroy($id)
    {
        // dd($id);
        $blog = Contact::findOrFail($id);
        $blog->delete();

        return to_route('admin.contacts.index')->with('success', 'お問い合わせを削除しました');
    }
}
