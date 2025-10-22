@extends('layout')

@section('title')
    ÇTBMYO | Bize Ulaşın
@endsection

@section('content')
    <h1 class="display-4 fst-italic">Bize Ulaşın</h1>
    <p class="lead my-3">Sorularınızı bize iletebilirsiniz.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Lütfen formda belirtilen hataları düzeltin.
        </div>
    @endif

    <form method="POST" action="{{ route('contactUs.store') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="first_name" class="form-label">Ad</label>
                <input
                    type="text"
                    class="form-control @error('first_name') is-invalid @enderror"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    placeholder="Adınız">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="last_name" class="form-label">Soyad</label>
                <input
                    type="text"
                    class="form-control @error('last_name') is-invalid @enderror"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    placeholder="Soyadınız">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-posta</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="example@mail.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Bölümünüz</label>
            <select 
                name="department" 
                id="department" 
                class="form-select @error('department') is-invalid @enderror"
            >
                <option value="" hidden>Bölüm Seçiniz...</option>
                @foreach($departments as $department)
                    <option 
                        value="{{ $department['id'] }}" 
                        {{ old('department') == $department['id'] ? 'selected' : '' }}
                    >
                        {{ $department['name'] }}
                    </option>
                @endforeach
            </select>
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Mesajınız</label>
            <textarea
                name="message"
                id="message"
                class="form-control @error('message') is-invalid @enderror"
                rows="3"
                placeholder="Mesajınızı yazın...">{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Gönder</button>
    </form>
@endsection

@section('footer')
    Bize Ulaşın Footerı
    @parent
@endsection
