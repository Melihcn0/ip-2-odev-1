<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContactUsController extends Controller
{
    public function index()
    {
        $departments = [
            ['id' => 1, 'name' => 'Bilgisayar Teknolojileri'],
            ['id' => 2, 'name' => 'Makine'],
            ['id' => 3, 'name' => 'Tasarım'],
            ['id' => 4, 'name' => 'Tekstil'],
            ['id' => 5, 'name' => 'Gıda'],
        ];

        return view('pages.contact-us', compact('departments'));
    }

    public function store(Request $request)
    {
        App::setLocale('tr'); // sadece bu istekte dili Türkçe yap

        $request->validate([
            'first_name' => 'required|string|min:2|max:50',
            'last_name'  => 'required|string|min:2|max:50',
            'email'      => 'required|email|max:100',
            'department' => 'required',
            'message'    => 'required|string|min:5|max:250',
        ]);

        return back()->with('success', 'Mesajınız başarıyla gönderilmiştir.');
    }
}
