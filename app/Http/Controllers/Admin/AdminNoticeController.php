<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class AdminNoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest('updated_at')->simplePaginate(10);
        return view('admin.notices.index', ['notices' => $notices]);
    }
}
