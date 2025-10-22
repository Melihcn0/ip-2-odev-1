<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContactHrController extends Controller
{
    public function index()
    {
        App::setLocale('tr');

        // dropdown verileri
        $educationLevels = ['İlkokul', 'Ortaokul', 'Lise', 'Ön Lisans', 'Lisans', 'Yüksek Lisans', 'Doktora'];
        $genders = ['Kadın', 'Erkek'];
        $licenses = ['Yok', 'A1', 'A2', 'B', 'C', 'D', 'E'];
        $positions = [
            'Yazılım Geliştirici', 'Sistem Uzmanı', 'Grafik Tasarımcı',
            'Proje Asistanı', 'Ofis Asistanı', 'Veri Analisti',
            'İK Uzmanı', 'Stajyer'
        ];
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', '0+', '0-'];
        $maritalStatuses = ['Bekar', 'Evli', 'Boşanmış'];
        $militaryStatuses = ['Yapıldı', 'Muaf', 'Erteleme'];
        $travelPermissions = ['Evet', 'Hayır'];
        $smokingStatuses = ['Kullanıyorum', 'Kullanmıyorum'];
        $disabilities = ['Var', 'Yok'];

        return view('pages.contact-hr', compact(
            'educationLevels', 'genders', 'licenses', 'positions',
            'bloodTypes', 'maritalStatuses', 'militaryStatuses',
            'travelPermissions', 'smokingStatuses', 'disabilities'
        ));
    }

    public function store(Request $request)
    {
        App::setLocale('tr');

        $validated = $request->validate([

            // 🔹 1. KİŞİSEL BİLGİLER
            'first_name'        => 'required|string|min:2|max:50',
            'last_name'         => 'required|string|min:2|max:50',
            'identity_number'   => 'required|digits:11',
            'email'             => 'required|email|max:100',
            'phone'             => 'required|string|min:10|max:15',
            'birth_date'        => 'required|date',
            'birth_place'       => 'required|string|min:2|max:50',
            'gender'            => 'required|string',
            'marital_status'    => 'required|string',
            'nationality'       => 'required|string|min:3|max:50',
            'blood_type'        => 'required|string|max:5',
            'address'           => 'required|string|min:10|max:255',

            // 🔹 2. EĞİTİM
            'education_level'   => 'required|string',
            'university'        => 'required|string|min:2|max:100',
            'department'        => 'required|string|min:2|max:100',
            'graduation_year'   => 'required|integer|min:1950|max:' . date('Y'),
            'gpa'               => 'required|numeric|min:0|max:4',
            'foreign_languages' => 'required|string|min:2|max:255',
            'certificates'      => 'required|string|min:2|max:255',
            'courses'           => 'required|string|min:2|max:255',

            // 🔹 3. DENEYİM
            'last_company'      => 'required|string|min:2|max:100',
            'last_position'     => 'required|string|min:2|max:100',
            'experience_duration' => 'required|string|min:2|max:50',
            'position'          => 'required|string|max:100',
            'experience'        => 'required|string|min:10|max:1000',
            'projects'          => 'required|string|min:5|max:1000',
            'achievements'      => 'required|string|min:5|max:1000',

            // 🔹 4. YETENEKLER & TEKNİK
            'skills'            => 'required|string|min:5|max:1000',
            'computer_skills'   => 'required|string|min:3|max:255',
            'programming_languages' => 'required|string|min:3|max:255',
            'tools'             => 'required|string|min:3|max:255',
            'technologies'      => 'required|string|min:3|max:255',
            'driving_license'   => 'required|string|max:20',
            'extra_license'     => 'nullable|string|max:100',

            // 🔹 5. REFERANS & SOSYAL
            'reference'         => 'required|string|min:2|max:255',
            'reference_phone'   => 'required|string|min:10|max:20',
            'linkedin'          => 'required|url|max:255',
            'github'            => 'required|url|max:255',
            'portfolio'         => 'required|url|max:255',
            'social_media'      => 'required|url|max:255',

            // 🔹 6. EK BİLGİLER
            'military_status'   => 'required|string|max:50',
            'travel_permission' => 'required|string|max:10',
            'smoking'           => 'required|string|max:10',
            'disability'        => 'required|string|max:10',
            'emergency_contact' => 'required|string|min:2|max:100',
            'emergency_phone'   => 'required|string|min:10|max:20',
            'health_condition'  => 'required|string|min:2|max:255',
            'hobbies'           => 'required|string|min:2|max:255',
            'relocation'        => 'required|string|max:20',
            'preferred_shift'   => 'required|string|min:2|max:100',
            'availability'      => 'required|string|min:2|max:100',
            'salary_expectation'=> 'required|numeric|min:1000',
            'start_date'        => 'required|date|after_or_equal:today',
            'notes'             => 'required|string|min:5|max:1000',

            // 🔹 ONAYLAR
            'consent'           => 'accepted',
            'privacy_policy'    => 'accepted',
        ], [
            'required' => ':attribute alanı zorunludur.',
            'email' => 'Geçerli bir e-posta adresi giriniz.',
            'numeric' => ':attribute sayısal olmalıdır.',
            'digits' => ':attribute :digits haneli olmalıdır.',
            'min' => ':attribute en az :min karakter olmalıdır.',
            'max' => ':attribute en fazla :max karakter olabilir.',
            'url' => 'Lütfen geçerli bir bağlantı giriniz.',
            'accepted' => ':attribute onaylanmalıdır.',
            'after_or_equal' => ':attribute bugünden sonraki bir tarih olmalıdır.',
        ]);

        // 🔹 (isteğe bağlı) burada kayıt işlemi yapılabilir
        // ContactHr::create($validated);

        return back()->with('success', 'Başvurunuz başarıyla alınmıştır.');
    }
}
