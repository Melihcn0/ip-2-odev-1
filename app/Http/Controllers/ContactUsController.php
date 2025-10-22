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
        return view('pages.contact-us',compact('departments'));
    }
    public function store(Request $request)
    {
         App::setLocale('tr'); // Sadece bu istekte dili Türkçe yap

        $request->validate(rules:[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'department' => 'required'
        ]);

        return back()->with('success', 'Mesajınız başarıyla gönderilmiştir.');
    }
}
