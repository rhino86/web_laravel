@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Project</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Project</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project</th>
                                        <th>Client</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                        $i = 1 + (($project->currentPage() - 1) * 5);
                                    @endphp
                                    @if (count($project) > 0)
                                         @foreach ($project as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><a href="{{ route('media.project.getData', ['slug'=>$item->slug]) }}">{{ $item->name }}</a></td>
                                                <td>{{ $item->client }}</td>
                                                <td>
                                                    
                                                    <form action="{{ route('media.category.delete') }}" onsubmit="return confirm('Apakah Kamu Yakin Akan menghapus Data Ini?');" method="post" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm d-inline-block-cs"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>  
                                            @php
                                                $i++;
                                            @endphp  
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                Tidak Ada Data Kategori
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>    
                        <div class="text-right">
                            {{ $project->links('pagination.paging1') }}
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Project</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.project.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Project">
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="client" value="{{ old('client') }}" placeholder="Nama Client">
                                @if($errors->has('client'))
                                <span class="text-danger">{{ $errors->first('client') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control use-datepicker" name="start_date" value="{{ old('start_date') }}" placeholder="{{ date('m/d/Y') }}">
                                        @if($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control use-datepicker" name="end_date" value="{{ old('end_date') }}" placeholder="{{ date('m/d/Y') }}">
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