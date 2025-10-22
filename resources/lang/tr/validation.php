<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Doğrulama Mesajları
    |--------------------------------------------------------------------------
    */

    'required' => ':attribute alanı zorunludur.',
    'email'    => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'url'      => ':attribute geçerli bir bağlantı olmalıdır.',
    'accepted' => ':attribute kabul edilmelidir.',
    'min'      => [
        'string' => ':attribute en az :min karakter olmalıdır.',
    ],
    'max'      => [
        'string' => ':attribute en fazla :max karakter olmalıdır.',
    ],
    'numeric'  => ':attribute sayısal bir değer olmalıdır.',
    'date'     => ':attribute geçerli bir tarih olmalıdır.',
    'after_or_equal' => ':attribute bugünden sonraki bir tarih olmalıdır.',
    'digits'   => ':attribute :digits haneli olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Alan İsimleri (Attribute)
    |--------------------------------------------------------------------------
    */

    'attributes' => [

        // 🔹 1. KİŞİSEL BİLGİLER
        'first_name'        => 'Ad',
        'last_name'         => 'Soyad',
        'identity_number'   => 'T.C. Kimlik No',
        'email'             => 'E-posta adresi',
        'phone'             => 'Telefon numarası',
        'birth_date'        => 'Doğum tarihi',
        'birth_place'       => 'Doğum yeri',
        'gender'            => 'Cinsiyet',
        'marital_status'    => 'Medeni durum',
        'nationality'       => 'Uyruk',
        'blood_type'        => 'Kan grubu',
        'address'           => 'Adres',

        // 🔹 2. EĞİTİM
        'education_level'   => 'Eğitim durumu',
        'university'        => 'Üniversite / Okul',
        'department'        => 'Bölüm',
        'graduation_year'   => 'Mezuniyet yılı',
        'gpa'               => 'Not ortalaması',
        'foreign_languages' => 'Yabancı diller',
        'certificates'      => 'Sertifikalar',
        'courses'           => 'Katıldığı kurslar',

        // 🔹 3. DENEYİM
        'last_company'      => 'Son çalıştığınız şirket',
        'last_position'     => 'Son pozisyon',
        'position'          => 'Pozisyon',
        'experience_duration'=> 'Çalışma süresi',
        'experience'        => 'Görev ve sorumluluklar',
        'projects'          => 'Yer aldığınız projeler',
        'achievements'      => 'Başarılar',

        // 🔹 4. YETENEKLER & TEKNİK
        'skills'            => 'Yetenekler',
        'computer_skills'   => 'Bilgisayar programları',
        'programming_languages' => 'Programlama dilleri',
        'tools'             => 'Kullandığı araçlar',
        'technologies'      => 'Teknolojiler',
        'driving_license'   => 'Ehliyet',
        'extra_license'     => 'Ek ehliyet / sertifikalar',

        // 🔹 5. REFERANS & SOSYAL
        'reference'         => 'Referans adı',
        'reference_phone'   => 'Referans telefonu',
        'linkedin'          => 'LinkedIn adresi',
        'github'            => 'GitHub adresi',
        'portfolio'         => 'Kişisel web sitesi / portföy',
        'social_media'      => 'Diğer sosyal medya hesabı',

        // 🔹 6. EK BİLGİLER
        'military_status'   => 'Askerlik durumu',
        'travel_permission' => 'Seyahat izni',
        'smoking'           => 'Sigara kullanımı',
        'disability'        => 'Engel durumu',
        'emergency_contact' => 'Acil durumda ulaşılacak kişi',
        'emergency_phone'   => 'Acil durum telefonu',
        'health_condition'  => 'Sağlık durumu',
        'hobbies'           => 'Hobiler',
        'languages'         => 'Dil bilgisi',
        'preferred_shift'   => 'Tercih edilen vardiya',
        'availability'      => 'Uygunluk durumu',
        'relocation'        => 'Şehir değişikliği izni',
        'salary_expectation'=> 'Beklenen maaş',
        'start_date'        => 'İşe başlama tarihi',
        'notes'             => 'Ek notlar',

        // 🔹 ONAY
        'consent'           => 'KVKK onayı',
        'privacy_policy'    => 'Gizlilik politikası onayı',
    ],

    /*
    |--------------------------------------------------------------------------
    | Özel Mesajlar (Custom)
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'identity_number' => [
            'required' => 'T.C. Kimlik No alanı zorunludur.',
            'digits' => 'T.C. Kimlik No 11 haneli olmalıdır.',
        ],
        'email' => [
            'email' => 'Lütfen geçerli bir e-posta adresi girin.',
        ],
        'consent' => [
            'accepted' => 'KVKK onay kutusunu işaretlemeniz gerekmektedir.',
        ],
        'privacy_policy' => [
            'accepted' => 'Gizlilik politikası onay kutusunu işaretleyiniz.',
        ],
        'start_date' => [
            'after_or_equal' => 'İşe başlama tarihi bugünden sonraki bir tarih olmalıdır.',
        ],
    ],
];
