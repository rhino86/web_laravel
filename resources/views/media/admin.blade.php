@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Admin</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Admin</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                        $i = 1 + (($admin->currentPage() - 1) * 5);
                                    @endphp
                                    @if (count($admin) > 0)
                                         @foreach ($admin as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->fullName }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->ha_join->description }}</td>
                                                <td>
                                                    <a href="{{ route('media.admin.getData', ['username'=>$item->username]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('media.admin.getPassword', ['username'=>$item->username]) }}" class="btn btn-warning btn-sm"><i class="fas fa-key"></i></a>
                                                    <form action="{{ route('media.admin.delete') }}" onsubmit="return confirm('Apakah Kamu Yakin Akan menghapus Data Ini?');" method="post" class="d-inline-block">
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
                                            <td colspan="5" class="text-center">
                                                Tidak Ada Data Admin
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>    
                        <div class="text-right">
                            {{ $admin->links('pagination.paging1') }}
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Admin</h4>
                    </div>
                    <div class="card-body">
                        @include('_part/_alert')
                        <form method="POST" action="{{ route('media.admin.submit') }}" class="fr-custom">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    {{-- <label>Nama Lengkap</label> --}}
                                    <input type="text" class="form-control" name="fullName" value="{{ old('fullName') }}" placeholder="Nama Lengkap">
                                    @if($errors->has('fullName'))
                                    <span class="text-danger d-block">{{ $errors->first('fullName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-12 mb-10-px">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                                    <small class="text-muted">Minimal 5 karakter tanpa spasi atau simbol lainnya</small>
                                    @if($errors->has('username'))
                                    <span class="text-danger d-block">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-12 mb-10-px">
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
                                    <small class="text-muted">Minimal 8 karakter serta kombinasi huruf dan angka</small>
                                    @if($errors->has('password'))
                                    <span class="text-danger d-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Konfirmasi Password">
                                    @if($errors->has('confirm_password'))
                                    <span class="text-danger d-block">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <select name="hakAkses" class="form-control">
                                        @foreach ($hakakses as $item)
                                            <option value="{{ $item->id }}">{{ $item->description }}</option>
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