@extends('Layouts.media')
@section('content')
<div class="section-body">
    <h2 class="section-title">Media Rekomendasi</h2>
    <form action="{{ route('media.rekomendasi.submitRekomendasi') }}" method="post">
    <div class="row">
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Project</label>
                            <div class="col-sm-10">
                                <select name="idProject" class="form-control" id="selProject">
                                    <option value="0">Pilih Project</option>
                                    @foreach ($project as $item)
                                        <option value="{{ $item->id }}">{{ $item->client }} ({{ $item->name }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="client" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-5">
                               <input type="text" class="form-control" name="start_date" disabled>
                            </div>
                            <div class="col-sm-5">
                               <input type="text" class="form-control" name="end_date" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $valId = [];
            @endphp
            @foreach ($rekomend as $item)
            <input type="hidden" name="idKol[]" value="{{ $item->id }}">
            @php
            $expAudiens = explode(';',$item->audience_character);
            @endphp
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('media.service.getData', ['username'=>$item->username]) }}" target="_blank"><h5 class="d-inline-block">{{ $item->name }}</h5> <span class="badge-type {{ (!empty($item->koltypes)) ? $item->toKolType->description : 'non-type' }}">{{ (!empty($item->koltypes)) ? $item->toKolType->description : '-' }}</span></a>
                        <ul class="list-none use-profile">
                            <li><i class="fas fa-envelope mr-1"></i> {{ $item->email }}</li>
                            <li><i class="fas fa-phone mr-1"></i> {{ $item->contact_person }}</li>
                            <li><i class="fas fa-map-marked-alt mr-1"></i> {{ $item->to_location->description }}</li>
                            <li><i class="fas fa-users mr-1"></i> {{ number_format($item->follower) }} Follower</li>
                        </ul>
                        <ul class="list-none list-sosmed">
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
                        {{-- <a href="javascript:void(0)" class="btn btn-block {{ (in_array($item->id, Session::get('rek_kol'))) ? 'btn-danger selected' : 'btn-info btn-select' }}" data-id="{{ $item->id }}"> {!! (in_array($item->id, Session::get('rek_kol'))) ? '<i class="fas fa-trash-alt"></i> Hapus' : '<i class="far fa-check-circle"></i> Pilih' !!}</a> --}}
                        
                    </div>
                </div>
            </div>
            @endforeach
        @csrf
        
        <div class="col-sm-12">
            <button class="btn btn-success btn-block btn-lg" type="submit">
                Simpan
            </button>
        </div>
    </div>   
    </form>
    
</div>
@endsection
@section('modal')


@endsection

@section('script')
   <script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('#selProject').change(function () {
           var id = $(this).val();
           $.ajax({
               type:"post",
               url:"{{ route('media.rekomendasi.getProject')}}" ,
               data:{
                   id:id
                },
                success:function(data)
                {
                    var parse = JSON.parse(data);
                    $('input[name="client"]').val(parse['client']);
                    $('input[name="start_date"]').val(parse['start_date']);
                    $('input[name="end_date"]').val(parse['end_date']);

                },
                error:function(XMLHttpRequest){
                    console.log(XMLHttpRequest);
                }
            });
       })
   </script>
@endsection