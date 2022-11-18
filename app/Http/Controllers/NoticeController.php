<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::all();


        return view('notices.index', compact('notices'));
    }
    public function show(Notice $notice) {

        return view('notices.show', compact('notice'));

    }
}
