@extends('Layouts.media')
@section('content')
<div class="section-body ">
    <div class="form-filter row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 ">
            <a href="javascript:void(0)" class="btn btn-success btn-block btn-filter" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-filter"></i> Filter</a>
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.rekomendasi.filter') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <select name="audiens[]" class="form-control user-select-general user-select-audiens" multiple>
                                        @foreach ($audience_character as $item)
                                            <option value="{{ ucwords($item->description) }}" >{{ ucwords($item->description) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <input type="number" class="form-control" name="price" placeholder="Harga Maksimal">
                                </div>
                                <div class="form-group col-6">
                                    {{-- <select name="servicetype" class="form-control">
                                        <option value="0">Pilih Jenis Layanan</option>
                                        @foreach ($servicetype as $item)
                                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="number" class="form-control" name="min_engagement" placeholder="Minimal Engagement Rate">
                                </div>
                                <div class="form-group col-6">
                                    <input type="number" class="form-control" name="min_follower" placeholder="Minimal Jumlah Follower">
                                </div>
                                <div class="form-group col-6">
                                    <input type="number" class="form-control" name="max_follower" placeholder="Maksimal Jumlah Follower">
                                </div>
                                {{-- <div class="form-group col-12">
                                    
                                </div> --}}
                                <div class="form-group col-12">
                                    <div class="row btn-group-sosmed">
                                        @foreach ($socialmediatype as $item_sosmed)
                                            <div class="col-2">
                                                <label id="{{ $item_sosmed->description }}" class="label-sosmed">
                                                    <input type="checkbox" name="socialmedia[]" id="sosemd-{{ $item_sosmed->id }}" class="radio-sosmed" data-id="{{ $item_sosmed->description }}" value="{{ $item_sosmed->id }}" >
                                                    {{-- <i class="fab fa-{{ strtolower($item_sosmed->description) }}"></i> --}}{{ $item_sosmed->description }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <select name="location" class="form-control use-select2-non-multiple {{  ($errors->has('location')) ? 'is-invalid' : '' }}">
                                        <option value="0">Pilih Provinsi</option>
                                        @foreach ($province as $item)
                                            <option value="{{ $item->id }}" >{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <select name="jenisKelamin" class="form-control">
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>Kategori</label>
                                    <div class="row btn-group-sosmed">
                                        @foreach ($category as $item_sosmed)
                                            <div class="col-2">
                                                <label id="{{ $item_sosmed->description }}" class="label-sosmed">
                                                    <input type="checkbox" name="category[]" id="category-{{ $item_sosmed->id }}" class="radio-sosmed" data-id="{{ $item_sosmed->description }}" value="{{ $item_sosmed->id }}" >
                                                    {{-- <i class="fab fa-{{ strtolower($item_sosmed->description) }}"></i> --}}{{ $item_sosmed->description }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
    <div class="row mt-sm-4 kol-sosmed">
        @foreach ($kol as $item)
        @php
        $expAudiens = explode(';',$item->audience_character);
        @endphp
        <div class="col-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('media.service.getData', ['username'=>$item->username]) }}" target="_blank"><h5 class="d-inline-block">{{ $item->name }}</h5> <span class="badge-type {{ (!empty($item->koltypes)) ? $item->toKolType->description : 'non-type' }}">{{ (!empty($item->koltypes)) ? $item->toKolType->description : '-' }}</span></a>
                    <ul class="list-none use-profile">
                        {{-- <li><i class="fas fa-envelope mr-1"></i> {{ $item->email }}</li> --}}
                        <li><i class="fas fa-user-tag mr-1"></i> Kategori {{ $item->toCategory->description }}</li>
                        <li><i class="fas fa-phone mr-1"></i> {{ $item->contact_person }}</li>
                        <li><i class="fas fa-map-marked-alt mr-1"></i> {{ $item->to_location->description }}</li>
                        <li><i class="fas fa-users mr-1"></i> {{ number_format($item->follower) }} Follower</li>
                    </ul>
                    <ul class="list-none list-sosmed d-block">
                        @if (!empty($item->SocialMedia))
                            @foreach ($item->SocialMedia as $itemSosmed)
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
                    <a href="javascript:void(0)" class="btn btn-block {{ (in_array($item->id, Session::get('rek_kol'))) ? 'btn-danger selected' : 'btn-info btn-select' }}" data-id="{{ $item->id }}"> {!! (in_array($item->id, Session::get('rek_kol'))) ? '<i class="fas fa-trash-alt"></i> Hapus' : '<i class="far fa-check-circle"></i> Pilih' !!}</a>
                    {{-- <form action="{{ route('media.audiens.delete') }}" onsubmit="return confirm('Apakah Kamu Yakin Akan menghapus Data Ini?');" method="post" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm btn-block "><i class="fas fa-trash-alt"></i> Hapus</button>
                    </form> --}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-sm-12">
            <div class="{{ (count(Session::get('rek_kol')) == 0) ? 'd-none' : '' }} " id="btn-next">
                <div class="text-right">
                    <a href="{{ route('media.rekomendasi.preview') }}" class="btn btn-success">Lanjut <i class="fas fa-arrow-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')


@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            addRek();
            hapusRek();
        })
        function addRek() {
            $('.btn-select').click(function () {
                var id = $(this).attr('data-id');
                // alert(id);
                $.ajax({
                    type:"post",
                    url:"{{ route('media.rekomendasi.postSession')}}" ,
                    data:{
                        id:id
                    },
                    success:function(data)
                    {
                        console.log(data); 
                        if (data == 0) {
                            $('#btn-next').addClass('d-none');
                            $('#btn-next').removeClass('d-block');
                        }else{
                            $('#btn-next').removeClass('d-none');
                            $('#btn-next').addClass('d-block');
                        }
                        hapusRek();
                    },
                    error:function(XMLHttpRequest){
                        console.log(XMLHttpRequest);
                    }
                });
                $(this).removeClass('btn-info');
                $(this).removeClass('btn-select');
                $(this).addClass('btn-danger');
                $(this).addClass('selected');
                $(this).html('<i class="fas fa-trash-alt"></i> Hapus'); 
                
            });
        }

        function hapusRek() {
            $('.selected').click(function () {
                var id = $(this).attr('data-id');
                // alert(id);
                $.ajax({
                    type:"post",
                    url:"{{ route('media.rekomendasi.delSession')}}" ,
                    data:{
                        id:id
                    },
                    success:function(data)
                    {
                        console.log(data);   
                        if (data == 0) {
                            $('#btn-next').addClass('d-none');
                            $('#btn-next').removeClass('d-block');
                        }else{
                            $('#btn-next').removeClass('d-none');
                            $('#btn-next').addClass('d-block');
                        }
                        addRek();     
                    },
                    error:function(XMLHttpRequest){
                        console.log(XMLHttpRequest);
                    }
                });
                $(this).addClass('btn-info');
                $(this).addClass('btn-select');
                $(this).removeClass('btn-danger');
                $(this).removeClass('selected');
                $(this).html('<i class="far fa-check-circle"></i> Pilih');
            })
        }
    </script>
@endsection