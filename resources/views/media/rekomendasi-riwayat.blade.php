@extends('Layouts.media')
@section('content')
    <div class="section-body">
         <h2 class="section-title">Riwayat Rekomendasi Media</h2>
         <p class="section-lead">This page is just an example for you to create your own page.</p>
         
         <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Rekomendasi</th>
                                        <th>Client</th>
                                        <th>Periode</th>
                                        <th>Jumlah KOL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                        $i = 1 + (($riwayat->currentPage() - 1) * 5);
                                    @endphp
                                    @if (count($riwayat) > 0)
                                         @foreach ($riwayat as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><a href="{{ route('media.rekomendasi.detail', ['code'=>$item->code]) }}">{{ $item->code }}</a></td>
                                                <td>{{ $item->withProject->name }}<br> ({{ $item->withProject->client }})</td>
                                                <td>{{ date('d-m-Y', strtotime($item->withProject->start_date)) }} s.d {{ date('d-m-Y', strtotime($item->withProject->end_date)) }}</td>
                                                <td>{{ count($item->withRekKol) }} Kol</td>
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
                                                Tidak Ada Data Riwayat Rekomendasi Media
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>    
                        <div class="text-right">
                            {{ $riwayat->links('pagination.paging1') }}
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
         
    </div>
@endsection