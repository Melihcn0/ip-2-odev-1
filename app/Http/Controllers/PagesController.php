<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home()
    {
        return view('pages.home');
    }
    public function About()
    {
        return view('pages.about');
    }
    public function Departments()
    {
        return view('pages.departments');
    }
    public function News()
    {
        $data = file_get_contents('https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fwww.aa.com.tr%2Ftr%2Frss%2Fdefault%3Fcat%3Dspor');

        $data  = json_decode($data);

        $news = $data -> items;

        return view('pages.news', compact('news'));
    }
    public function ContactUs()
    {
        return view('pages.contact-us');
    }
    public function ContactHr()
    {
        return view('pages.contact-hr');
    }
}
