@extends('layouts.admin')

@section('content')
    <div class="apartment-list">
        <h1 class="text-center mb-3">I tuoi Appartamenti</h1>

        <div class="row">
            @foreach ($apartments as $apartment)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    {{-- link alla show dell'appartamento --}}
                    <div>
                        <div class="card">
                            <div class="position-relative">
                                <a class="text-decoration-none" href="{{ route('admin.apartment.show', $apartment) }}">
                                    <img
                                        onerror="this.src ='{{ asset('img/placeholder.png') }}'"
                                        src="{{ asset('storage/uploads/' . $apartment->image_path) }}"
                                        class="card-img-top rounded rounded-4"
                                        alt="Appartamento">
                                </a>
                                <a href="{{ route('admin.apartment.edit-visible', $apartment) }}"
                                    class="visible-badge text-bg-success text-decoration-none">
                                    <i class="far {{ $apartment->visible ? 'fa-eye' : 'fa-eye-slash' }} p-1"></i>
                                </a>
                                @if ($apartment->sponsors->count() && strtotime($apartment->sponsors[0]->pivot->expiration_date) >= strtotime(now()))
                                    <div class="sponsor-badge text-bg-warning">
                                        <span>Sponsorizzato</span>
                                    </div>
                                @endif
                            </div>
                            <a class="text-decoration-none text-black" href="{{ route('admin.apartment.show', $apartment) }}">
                                <div class="card-body">
                                    <h6 class="card-title single-line-ellipsis fw-bold">{{ $apartment->title }}</h6>
                                    <p class="card-text single-line-ellipsis">{{ $apartment->address }}</p>
                                    <p class="card-text">{{ $apartment->num_of_bed }} letto/i &middot;
                                        {{ $apartment->num_of_bathroom }} bagno/i &middot; {{ $apartment->square_meters }}
                                        mq</p>
                                    <p class="card-text fw-bold">&euro;{{ $apartment->price }}/notte</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
