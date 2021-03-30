@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Audiens Character</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Audiens Character</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                        $i = 1 + (($audiens->currentPage() - 1) * 5);
                                    @endphp
                                    @if (count($audiens) > 0)
                                         @foreach ($audiens as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('media.audiens.getData', ['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('media.audiens.delete') }}" onsubmit="return confirm('Apakah Kamu Yakin Akan menghapus Data Ini?');" method="post" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm d-inline-block-cs"><i class="fas fa-trash-alt"></i></button>
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
                                                Tidak Ada Data Audiens Character
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>    
                        <div class="text-right">
                            {{ $audiens->links('pagination.paging1') }}
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.audiens.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Masukkan Audiens Character">
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