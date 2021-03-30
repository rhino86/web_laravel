@extends('layouts.user')
@section('content')
<div class="section-body">
    <h2 class="section-title">Hi, {{ Str::ucfirst(Session::get('login')['name']) }}!</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row">
        <div class="col-md-6 mx-auto mb-3">
            <a href="{{ route('user.service.add') }}" class="btn btn-primary btn-block btn-service"><i class="fas fa-plus-circle mr-1"></i> Service</a>
        </div>
    </div>
    
    <div class="row">
        @foreach ($service as $item)
            <div class="col-12 col-md-3">
            <div class="pricing">
                <div class="pricing-title">
                    {{ $item->socialmedia->description }}
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        @php
                            $price = Str::substr($item->price, 0, Str::length($item->price) - 3);
                            $last_price = Str::substr($item->price, Str::length($item->price) - 3, Str::length($item->price));
                        @endphp
                        <h4>Rp. {{ number_format($price) }}<small>,{{ $last_price }}</small> </h4>
                        <div>per post</div>
                    </div>
                    <div class="pricing-details">
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-user"></i></div>
                            <div class="pricing-item-label">{{ $item->joinKolSosmed->username }}</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="fas fa-boxes"></i></div>
                            <div class="pricing-item-label">{{ $item->joinService->description }}</div>
                        </div>
                        <div class="pricing-item">
                            <div class="pricing-item-icon"><i class="far fa-clock"></i></div>
                            <div class="pricing-item-label">{{ $item->durasi }} Minggu</div>
                        </div>
                    </div>
                </div>
                <div class="pricing-cta">
                    <a href="{{ route('user.service.detService', ['sosmed' => $item->sosmedtype,'id'=>$item->id]) }}">Ubah <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection