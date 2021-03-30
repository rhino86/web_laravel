@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Project</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Project</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.project.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $detail['id'] }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ $detail['name'] }}" placeholder="Nama Project" disabled>
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="client" value="{{ $detail['client'] }}" placeholder="Nama Client" disabled>
                                @if($errors->has('client'))
                                <span class="text-danger">{{ $errors->first('client') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control use-datepicker" name="start_date" value="{{ date('m/d/Y', strtotime($detail['start_date'])) }}" placeholder="{{ date('m/d/Y') }}">
                                        @if($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control use-datepicker" name="end_date" value="{{ date('m/d/Y', strtotime($detail['end_date'])) }}" placeholder="{{ date('m/d/Y') }}">
                                        @if($errors->has('end_date'))
                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>  
                                </div>
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