@extends('layouts.user')
@section('content')
<div class="section-body">
    
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 ">
                    
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="d-block">Ubah Service</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('user.service.updateService') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $detail['id'] }}">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="frist_name">Platform</label>
                                <select name="platform" id="sosmedtype" class="form-control" disabled>
                                    <option value="0">Pilih Platform</option>
                                    @foreach ($sosmed as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id == $detail['sosmedtype']) ? 'selected' : '' }}>{{ $item->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="frist_name">Jenis Service</label>
                                <select name="service" id="service" class="form-control">
                                    @foreach ($servicetype as $item_st)
                                        <option value="{{ $item_st->id }}" {{ ($item_st->id == $detail['service']) ? 'selected' : '' }}>{{ $item_st->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Akun Social Media</label>
                                <select name="akun" id="idSocmed" class="form-control">
                                    @foreach ($service as $item_sm)
                                        <option value="{{ $item_sm->id }}" {{ ($item_sm->id == $detail['idSocmed']) ? 'selected' : 'b ;' }}>{{ $item_sm->username }}</option>
                                    @endforeach
                                </select>
                                {{ $errors->first('akun') }}
                            </div>
                            <div class="form-group col-6">
                                <label for="price">Harga</label>
                                <input id="price" type="text" class="form-control {{  ($errors->has('price')) ? 'is-invalid' : '' }} use-number" name="price" value="{{ $detail['price'] }}">
                                <small class="text-muted">Contoh penulisan harga 100000</small>
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="durasi">Durasi</label>
                                <div class="input-group">
                                    <input id="durasi" type="number" class="form-control {{  ($errors->has('durasi')) ? 'is-invalid' : '' }}" name="durasi" value="{{ $detail['durasi'] }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Minggu
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="invalid-feedback">
                                    {{ $errors->first('durasi') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('user.service.delService') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $detail['id'] }}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="fas fa-trash-alt"></i> Hapus</button>
            </form>
            
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

</script>
@endsection