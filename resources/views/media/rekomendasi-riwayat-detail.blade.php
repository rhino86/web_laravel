@extends('Layouts.media')
@section('content')
<div class="section-body ">
    <h2 class="section-title">Detail KOL </h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="row mt-sm-4">
        @foreach ($riwayat as $item)
        @php
        $expAudiens = explode(';',$item->withKol->audience_character);
        @endphp
        <div class="col-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('media.service.getData', ['username'=>$item->withKol->username]) }}" target="_blank"><h5 class="d-inline-block">{{ $item->withKol->name }}</h5> <span class="badge-type {{ (!empty($item->withKol->koltypes)) ? $item->withKol->toKolType->description : 'non-type' }}">{{ (!empty($item->withKol->koltypes)) ? $item->withKol->toKolType->description : '-' }}</span></a>
                    <ul class="list-none use-profile">
                        <li><i class="fas fa-envelope mr-1"></i> {{ $item->withKol->email }}</li>
                        <li><i class="fas fa-phone mr-1"></i> {{ $item->withKol->contact_person }}</li>
                        <li><i class="fas fa-map-marked-alt mr-1"></i> {{ $item->withKol->to_location->description }}</li>
                        <li><i class="fas fa-users mr-1"></i> {{ number_format($item->withKol->follower) }} Follower</li>
                    </ul>
                    <ul class="list-none list-sosmed">
                        @if (!empty($item->withKol->SocialMedia))
                            @foreach ($item->withKol->SocialMedia as $itemSosmed)
                                @if ($itemSosmed->sosmedtype == 1)
                                    @php
                                        $icon = '<i class="fab fa-instagram"></i>';
                                    @endphp
                                @elseif($itemSosmed->sosmedtype == 2)
                                    @php
                                    $icon = '<i class="fab fa-facebook"></i>';
                                    @endphp
                                @elseif($itemSosmed->sosmedtype == 3)
                                    @php
                                        $icon = '<i class="fab fa-youtube"></i>';
                                    @endphp
                                @elseif($itemSosmed->sosmedtype == 4)
                                    @php
                                        $icon = '<i class="fab fa-tiktok"></i>';
                                    @endphp
                                @else
                                    @php
                                    $icon = '<i class="fab fa-twitter"></i>';
                                    @endphp
                                @endif
                            <li class="d-inline-block"><a href="{{ $itemSosmed->url }}" target="_blank">{!! $icon !!}</a></li>    
                            
                            @endforeach
                        @endif
                    </ul>
                    <ul class="list-none ">
                        @for ($j = 0; $j < count($expAudiens); $j++)
                            @if ($j % 5 == 0)
                                @php
                                $badge = 'primary';
                                @endphp
                            @elseif($j % 5 == 1)
                                @php
                                $badge = 'success';
                                @endphp
                            @elseif($j % 5 == 2)
                                @php
                                $badge = 'warning';
                                @endphp
                            @elseif($j % 5 == 3)
                                @php
                                $badge = 'secondary';
                                @endphp
                            @else
                                @php
                                $badge = 'info';
                                @endphp
                            @endif
                        
                        <li class="d-inline-block"><span class="badge badge-{{$badge}} badge-small mt-1">{{ $expAudiens[$j] }}</span></li>
                        @endfor
                    </ul>
                    
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection
@section('modal')


@endsection

@section('script')
    
@endsection