@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Admin</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Admin</h4>
                    </div>
                    <div class="card-body">
                        @include('_part/_alert')
                        <form method="POST" action="{{ route('media.admin.update') }}" class="fr-custom">
                            @csrf
                            <input type="hidden" name="id" value="{{ $detail['id'] }}">
                            <div class="row">
                                <div class="form-group col-12">
                                    {{-- <label>Nama Lengkap</label> --}}
                                    <input type="text" class="form-control" name="fullName" value="{{ $detail['fullName'] }}" placeholder="Nama Lengkap">
                                    @if($errors->has('fullName'))
                                    <span class="text-danger d-block">{{ $errors->first('fullName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-12 mb-10-px">
                                    <input type="text" class="form-control" name="username" value="{{ $detail['username'] }}" placeholder="Username" disabled>
                                    <small class="text-muted">Minimal 5 karakter tanpa spasi atau simbol lainnya</small>
                                    @if($errors->has('username'))
                                    <span class="text-danger d-block">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-12">
                                    <select name="hakAkses" class="form-control">
                                        @foreach ($hakakses as $item)
                                            <option value="{{ $item->id }}" {{ ($item->id == $detail['hakAkses']) ? 'selected' : '' }}>{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
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