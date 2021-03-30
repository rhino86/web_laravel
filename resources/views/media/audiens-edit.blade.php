@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Audiens Character</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Form </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.audiens.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $detail['id'] }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" value="{{ $detail['description'] }}" placeholder="Kategori">
                                @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Simpan
                                </button>
                            </div>
                        </form>   
                        @include('_part/_alert')
                    </div>
                    
                </div>
            </div>
        </div>
         
    </div>
@endsection