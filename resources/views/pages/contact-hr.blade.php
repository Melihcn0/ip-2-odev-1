@extends('layout')

@section('title')
    ÇTBMYO | İK Başvuru
@endsection

@section('content')
<h1 class="display-4 fst-italic">İnsan Kaynakları Başvuru Formu</h1>
<p class="lead my-3">Aşağıdaki formu eksiksiz doldurarak başvurunuzu iletebilirsiniz.</p>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger"><strong>Lütfen formda belirtilen hataları düzeltin.</strong></div>
@endif

<form method="POST" action="{{ route('contactHr.store') }}" enctype="multipart/form-data" novalidate>
    @csrf

    {{-- 🔹 1. KİŞİSEL BİLGİLER --}}
    <h5 class="mt-4 border-bottom pb-2">Kişisel Bilgiler</h5>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Ad</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Soyad</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>T.C. Kimlik No</label>
            <input type="text" name="identity_number" class="form-control @error('identity_number') is-invalid @enderror" value="{{ old('identity_number') }}">
            @error('identity_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>E-posta</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Telefon</label>
            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="05xx xxx xx xx">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Doğum Tarihi</label>
            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}">
            @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Doğum Yeri</label>
            <input type="text" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place') }}">
            @error('birth_place') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Medeni Durum</label>
<select name="marital_status" class="form-select @error('marital_status') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Evli" {{ old('marital_status') == 'Evli' ? 'selected' : '' }}>Evli</option>
    <option value="Bekar" {{ old('marital_status') == 'Bekar' ? 'selected' : '' }}>Bekar</option>
    <option value="Boşanmış" {{ old('marital_status') == 'Boşanmış' ? 'selected' : '' }}>Boşanmış</option>
</select>

            @error('marital_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Cinsiyet</label>
<select name="gender" class="form-select @error('gender') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Erkek" {{ old('gender') == 'Erkek' ? 'selected' : '' }}>Erkek</option>
    <option value="Kadın" {{ old('gender') == 'Kadın' ? 'selected' : '' }}>Kadın</option>
</select>

            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Uyruk</label>
            <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality') }}">
            @error('nationality') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Kan Grubu</label>
<select name="blood_type" class="form-select @error('blood_type') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
    @endforeach
</select>

            @error('blood_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Adres</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- 🔹 2. EĞİTİM --}}
    <h5 class="mt-4 border-bottom pb-2">Eğitim Bilgileri</h5>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Eğitim Durumu</label>
<select name="education_level" class="form-select @error('education_level') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    @foreach(['İlkokul','Ortaokul','Lise','Ön Lisans','Lisans','Yüksek Lisans','Doktora'] as $edu)
        <option value="{{ $edu }}" {{ old('education_level') == $edu ? 'selected' : '' }}>{{ $edu }}</option>
    @endforeach
</select>

            @error('education_level') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Üniversite</label>
            <input type="text" name="university" class="form-control @error('university') is-invalid @enderror" value="{{ old('university') }}">
            @error('university') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Bölüm</label>
            <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}">
            @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Mezuniyet Yılı</label>
            <input type="number" name="graduation_year" class="form-control @error('graduation_year') is-invalid @enderror" value="{{ old('graduation_year') }}">
            @error('graduation_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Not Ortalaması</label>
            <input type="text" name="gpa" class="form-control @error('gpa') is-invalid @enderror" value="{{ old('gpa') }}">
            @error('gpa') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Yabancı Diller</label>
            <input type="text" name="foreign_languages" class="form-control @error('foreign_languages') is-invalid @enderror" value="{{ old('foreign_languages') }}">
            @error('foreign_languages') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Sertifikalar</label>
            <input type="text" name="certificates" class="form-control @error('certificates') is-invalid @enderror" value="{{ old('certificates') }}">
            @error('certificates') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Kurslar</label>
            <input type="text" name="courses" class="form-control @error('courses') is-invalid @enderror" value="{{ old('courses') }}">
            @error('courses') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- 🔹 3. DENEYİM --}}
    <h5 class="mt-4 border-bottom pb-2">İş Deneyimi</h5>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label>Son Şirket</label>
            <input type="text" name="last_company" class="form-control @error('last_company') is-invalid @enderror" value="{{ old('last_company') }}">
            @error('last_company') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Son Pozisyon</label>
            <input type="text" name="last_position" class="form-control @error('last_position') is-invalid @enderror" value="{{ old('last_position') }}">
            @error('last_position') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Çalışma Süresi</label>
            <input type="text" name="experience_duration" class="form-control @error('experience_duration') is-invalid @enderror" value="{{ old('experience_duration') }}">
            @error('experience_duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label>Pozisyon (Başvurduğun)</label>
            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
            @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label>Görev ve Sorumluluklar</label>
        <textarea name="experience" class="form-control @error('experience') is-invalid @enderror" rows="3">{{ old('experience') }}</textarea>
        @error('experience') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Projeler</label>
            <textarea name="projects" class="form-control @error('projects') is-invalid @enderror" rows="2">{{ old('projects') }}</textarea>
            @error('projects') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label>Başarılar</label>
            <textarea name="achievements" class="form-control @error('achievements') is-invalid @enderror" rows="2">{{ old('achievements') }}</textarea>
            @error('achievements') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- 🔹 4. YETENEKLER --}}
    <h5 class="mt-4 border-bottom pb-2">Yetenek ve Teknik Bilgiler</h5>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label>Yetenekler</label>
            <textarea name="skills" class="form-control @error('skills') is-invalid @enderror" rows="2">{{ old('skills') }}</textarea>
            @error('skills') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label>Bilgisayar Programları</label>
            <input type="text" name="computer_skills" class="form-control @error('computer_skills') is-invalid @enderror" value="{{ old('computer_skills') }}">
            @error('computer_skills') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label>Programlama Dilleri</label>
            <input type="text" name="programming_languages" class="form-control @error('programming_languages') is-invalid @enderror" value="{{ old('programming_languages') }}">
            @error('programming_languages') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label>Kullandığı Araçlar</label>
            <input type="text" name="tools" class="form-control @error('tools') is-invalid @enderror" value="{{ old('tools') }}">
            @error('tools') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label>Teknolojiler</label>
            <input type="text" name="technologies" class="form-control @error('technologies') is-invalid @enderror" value="{{ old('technologies') }}">
            @error('technologies') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label>Ehliyet</label>
            <input type="text" name="driving_license" class="form-control @error('driving_license') is-invalid @enderror" value="{{ old('driving_license') }}">
            @error('driving_license') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

{{-- 🔹 5. REFERANS & SOSYAL --}}
<h5 class="mt-4 border-bottom pb-2">Referans & Sosyal Bilgiler</h5>
<div class="row">
    <div class="col-md-4 mb-3">
        <label>Referans Adı</label>
        <input type="text" name="reference" required
               class="form-control @error('reference') is-invalid @enderror"
               value="{{ old('reference') }}">
        @error('reference') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Referans Telefonu</label>
        <input type="text" name="reference_phone" required
               class="form-control @error('reference_phone') is-invalid @enderror"
               value="{{ old('reference_phone') }}">
        @error('reference_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>LinkedIn</label>
        <input type="url" name="linkedin" required
               class="form-control @error('linkedin') is-invalid @enderror"
               value="{{ old('linkedin') }}">
        @error('linkedin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>GitHub</label>
        <input type="url" name="github" required
               class="form-control @error('github') is-invalid @enderror"
               value="{{ old('github') }}">
        @error('github') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Portföy / Web Sitesi</label>
        <input type="url" name="portfolio" required
               class="form-control @error('portfolio') is-invalid @enderror"
               value="{{ old('portfolio') }}">
        @error('portfolio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Diğer Sosyal Medya</label>
        <input type="url" name="social_media" required
               class="form-control @error('social_media') is-invalid @enderror"
               value="{{ old('social_media') }}">
        @error('social_media') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- 🔹 6. EK BİLGİLER --}}
<h5 class="mt-4 border-bottom pb-2">Ek Bilgiler</h5>
<div class="row">
    <div class="col-md-4 mb-3">
        <label>Askerlik Durumu</label>
<select name="military_status" required class="form-select @error('military_status') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Yapıldı" {{ old('military_status') == 'Yapıldı' ? 'selected' : '' }}>Yapıldı</option>
    <option value="Muaf" {{ old('military_status') == 'Muaf' ? 'selected' : '' }}>Muaf</option>
    <option value="Erteleme" {{ old('military_status') == 'Erteleme' ? 'selected' : '' }}>Erteleme</option>
</select>

        @error('military_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Seyahat Engeliniz</label>
<select name="travel_permission" required class="form-select @error('travel_permission') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Evet" {{ old('travel_permission') == 'Evet' ? 'selected' : '' }}>Evet</option>
    <option value="Hayır" {{ old('travel_permission') == 'Hayır' ? 'selected' : '' }}>Hayır</option>
</select>

        @error('travel_permission') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Sigara Kullanımı</label>
<select name="smoking" required class="form-select @error('smoking') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Kullanıyorum" {{ old('smoking') == 'Kullanıyorum' ? 'selected' : '' }}>Kullanıyorum</option>
    <option value="Kullanmıyorum" {{ old('smoking') == 'Kullanmıyorum' ? 'selected' : '' }}>Kullanmıyorum</option>
</select>

        @error('smoking') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Engel Durumu</label>
<select name="disability" required class="form-select @error('disability') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Var" {{ old('disability') == 'Var' ? 'selected' : '' }}>Var</option>
    <option value="Yok" {{ old('disability') == 'Yok' ? 'selected' : '' }}>Yok</option>
</select>

        @error('disability') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Acil Durum Kişisi</label>
        <input type="text" name="emergency_contact" required
               class="form-control @error('emergency_contact') is-invalid @enderror"
               value="{{ old('emergency_contact') }}">
        @error('emergency_contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Acil Durum Telefonu</label>
        <input type="text" name="emergency_phone" required
               class="form-control @error('emergency_phone') is-invalid @enderror"
               value="{{ old('emergency_phone') }}">
        @error('emergency_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Sağlık Durumu</label>
        <input type="text" name="health_condition" required
               class="form-control @error('health_condition') is-invalid @enderror"
               value="{{ old('health_condition') }}">
        @error('health_condition') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Hobiler</label>
        <input type="text" name="hobbies" required
               class="form-control @error('hobbies') is-invalid @enderror"
               value="{{ old('hobbies') }}">
        @error('hobbies') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Şehir Değişikliği İzni</label>
<select name="relocation" required class="form-select @error('relocation') is-invalid @enderror">
    <option value="" hidden>Seçiniz...</option>
    <option value="Evet" {{ old('relocation') == 'Evet' ? 'selected' : '' }}>Evet</option>
    <option value="Hayır" {{ old('relocation') == 'Hayır' ? 'selected' : '' }}>Hayır</option>
</select>

        @error('relocation') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Tercih Edilen Vardiya</label>
        <input type="text" name="preferred_shift" required
               class="form-control @error('preferred_shift') is-invalid @enderror"
               value="{{ old('preferred_shift') }}">
        @error('preferred_shift') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Uygunluk Durumu</label>
        <input type="text" name="availability" required
               class="form-control @error('availability') is-invalid @enderror"
               value="{{ old('availability') }}">
        @error('availability') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label>Beklenen Maaş</label>
        <input type="number" name="salary_expectation" required
               class="form-control @error('salary_expectation') is-invalid @enderror"
               value="{{ old('salary_expectation') }}">
        @error('salary_expectation') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>İşe Başlama Tarihi</label>
        <input type="date" name="start_date" required
               class="form-control @error('start_date') is-invalid @enderror"
               value="{{ old('start_date') }}">
        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label>Ek Notlar</label>
        <textarea name="notes" required
                  class="form-control @error('notes') is-invalid @enderror" rows="2">{{ old('notes') }}</textarea>
        @error('notes') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>


    {{-- 🔹 ONAY --}}
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="consent" id="consent">
        <label class="form-check-label" for="consent">
            KVKK ve gizlilik politikasını okudum, onaylıyorum.
        </label>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="privacy_policy" id="privacy_policy">
        <label class="form-check-label" for="privacy_policy">
            Gizlilik politikasını kabul ediyorum.
        </label>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Başvuruyu Gönder</button>
</form>
@endsection

@section('footer')
İnsan Kaynakları Başvuru Sayfası  
@parent
@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
  const errorField = document.querySelector('.is-invalid');
  if (errorField) errorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
});
</script>
