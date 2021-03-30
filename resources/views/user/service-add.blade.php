@extends('layouts.user')
@section('content')
<div class="section-body">
    
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 ">
                    
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="d-block">Tambah Service</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('user.service.addSosmed') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="frist_name">Platform</label>
                                <select name="platform" id="sosmedtype" class="form-control">
                                    <option value="0">Pilih Platform</option>
                                    @foreach ($sosmed as $item)
                                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="frist_name">Jenis Service</label>
                                <select name="service" id="service" class="form-control">
                                    <option value="0">Pilih Jenis Service</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Akun Social Media</label>
                                <select name="akun" id="idSocmed" class="form-control">
                                    <option value="0">Pilih Akun Social Media</option>
                                </select>
                                {{ $errors->first('akun') }}
                            </div>
                            <div class="form-group col-6">
                                <label for="price">Harga</label>
                                <input id="price" type="text" class="form-control {{  ($errors->has('price')) ? 'is-invalid' : '' }} use-number" name="price" value="{{ old('price') }}">
                                <small class="text-muted">Contoh penulisan harga 100000</small>
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="durasi">Durasi</label>
                                <div class="input-group">
                                    <input id="durasi" type="number" class="form-control {{  ($errors->has('durasi')) ? 'is-invalid' : '' }}" name="durasi" value="{{ old('durasi') }}">
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
    $('#sosmedtype').change(function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            method:'POST',
            url : "{{ route('user.service.getSosmed') }}",
            data: { id : id },
            success : function(data){
                var obj = $.parseJSON(data);
                var pecah = obj.split('_');
                $('#service').html(pecah[1]);
                $('#idSocmed').html(pecah[0]);
                $('#mod-prod?uct-detail').modal('hide');
                // proses_modal('#add-cart');
                console.log(pecah[2]);
                    
            },error:function(XMLHttpRequest){
                console.log(XMLHttpRequest);
            }
        });
    });

</script>
@endsection