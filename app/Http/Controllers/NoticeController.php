<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Carbon\Carbon;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::paginate(5);


        return view('notices.index', compact('notices'));
    }
    public function show(Notice $notice) {

        // dd($notice);
        $date = $notice->updated_at->format('Y年m月d日');

        return view('notices.show', compact('notice', 'date'));

    }
}
