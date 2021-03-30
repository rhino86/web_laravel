@extends('Layouts.media')
@section('content')
<div class="section-body">
    <h2 class="section-title">Detail Key Opinion Leaders</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="row mt-sm-4">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 ">
            <div class="card card-primary">
                <div class="card-body">
                    <form method="POST" action="{{ route('media.influencer.updateDetail') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $detail['id'] }}">
                        <div class="row">
                            <div class="form-group col-6">
                                <h6 for="frist_name">Nama Lengkap</h6>
                                <input type="text" class="form-control {{  ($errors->has('name')) ? 'is-invalid' : '' }}" value="{{ $detail['name'] }}" disabled>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="frist_name">Username</h6>
                                <input type="text" class="form-control" value="{{ $detail['username'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <h6 for="gender">Jenis Kelamin</h6>
                                <select class="form-control {{  ($errors->has('gender')) ? 'is-invalid' : '' }}" disabled>
                                    <option value="1" {{ ($detail['gender'] == 1) ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="2" {{ ($detail['gender'] == 2) ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="religion">Agama</h6>
                                <select class="form-control {{  ($errors->has('religion')) ? 'is-invalid' : '' }}" disabled>
                                    <option value="0">Pilih Agama</option>
                                    @foreach ($religion as $item)
                                    <option value="{{ $item->id }}" {{ ($detail['religion'] == $item->id) ? 'selected' : '' }}>{{ $item->description }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="tempatLahir">Tempat Lahir</h6>
                                <input type="text"  class="form-control {{  ($errors->has('tempatLahir')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['tempatLahir'])) ? $detail['tempatLahir'] : old('tempatLahir') }}" disabled>
                                <div class="invalid-feedback">
                                    {{ $errors->first('tempatLahir') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="taggalLahir">Tanggal Lahir</h6>
                                <input type="text"  class="form-control use-datepicker {{  ($errors->has('tanggalLahir')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['tanggalLahir'])) ? date('m/d/Y', strtotime($detail['tanggalLahir'])) : date('m/d/Y', strtotime(old('tanggalLahir'))) }}" disabled>
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggalLahir') }}
                                </div>
                            </div>
                            {{-- <div class="form-group col-12">
                                <h6 for="description">Deskripsi</h6>
                                <textarea name="description" disabled class="form-control-textarea" rows="4">{{ $detail['description'] }}</textarea>
                            </div> --}}
                            <div class="form-group col-6">
                                <h6 for="email">Lokasi</h6>
                                <select class="form-control use-select2-non-multiple {{  ($errors->has('location')) ? 'is-invalid' : '' }}" disabled>
                                    <option value="0">Pilih Provinsi</option>
                                    @foreach ($province as $item)
                                    <option value="{{ $item->id }}" {{ ($detail['location'] == $item->id) ? 'selected' : '' }}>{{ $item->description }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="contact_person">Kontak Person</h6>
                                <input type="text" class="form-control {{  ($errors->has('contact_person')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['contact_person'])) ? $detail['contact_person'] : old('contact_person') }}" disabled>
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_person') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="bank_name">bank</h6>
                                <select  id="bank_name" class="form-control {{  ($errors->has('bank_name')) ? 'is-invalid' : '' }}" disabled>
                                    <option value="1" {{ ($detail['bank_name'] == 1) ? 'selected' : '' }}>Bank BRI</option>
                                    <option value="2" {{ ($detail['bank_name'] == 2) ? 'selected' : '' }}>Bank BNI</option>
                                    <option value="3" {{ ($detail['bank_name'] == 3) ? 'selected' : '' }}>Bank Mandiri</option>
                                    <option value="4" {{ ($detail['bank_name'] == 4) ? 'selected' : '' }}>Bank BTN</option>
                                    <option value="5" {{ ($detail['bank_name'] == 5) ? 'selected' : '' }}>Bank Bukopin</option>
                                    <option value="6" {{ ($detail['bank_name'] == 6) ? 'selected' : '' }}>Bank BCA</option>
                                    <option value="7" {{ ($detail['bank_name'] == 7) ? 'selected' : '' }}>Bank BSI</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="bank_account">Pemilik Rekening</h6>
                                <input type="text" class="form-control {{  ($errors->has('bank_account')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['bank_account'])) ? $detail['bank_account'] : old('bank_account') }}" disabled>
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_account') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <h6 for="bank_number_account">Nomor Rekening</h6>
                                <input type="text"  class="form-control {{  ($errors->has('bank_number_account')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['bank_number_account'])) ? $detail['bank_number_account'] : old('bank_number_account') }}" disabled>
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_number_account') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <h6 for="inters">Interst</h6>
                                <select  class="form-control user-select2 {{  ($errors->has('interst')) ? 'is-invalid' : '' }}" multiple disabled>
                                    @php
                                    $expInteres = explode(';', $detail['interst']);
                                    @endphp
                                    @foreach ($interest as $item)
                                    <option value="{{ $item->description }}" {{ (in_array($item->description, $expInteres)) ? 'selected' : '' }}>{{ $item->description }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('interst') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <h6 for="inters">Audiens Character</h6>
                                <select  class="form-control user-select2 {{  ($errors->has('audience_character')) ? 'is-invalid' : '' }}" multiple disabled>
                                    @php
                                    $expAudiens = explode(';', $detail['audience_character']);
                                    @endphp
                                    @foreach ($interest as $item)
                                    <option value="{{ $item->description }}" {{ (in_array($item->description, $expAudiens)) ? 'selected' : '' }}>{{ $item->description }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('audience_character') }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Social Media</div>
                                <p class="section-lead">All items here cannot be deleted.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Channel</th>
                                            <th class="text-center">Akun</th>
                                            <th class="text-center">Follower</th>
                                            <th class="text-center">Post</th>
                                            <th class="text-center">Comment</th>
                                            <th class="text-center">Like</th>
                                        </tr>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (count($socialmedia) > 0)
                                             @foreach ($socialmedia as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->toSosmed->description }}</td>
                                                    <td ><a href="{{ $item->url }}" target="_blank" >{{ $item->username }}</a></td>
                                                    <td class="text-center">{{ $item->follower }}</td>
                                                    <td class="text-center">{{ $item->post }}</td>
                                                    <td class="text-center">{{ $item->comment }}</td>
                                                    <td class="text-center">{{ $item->like }}</td>
                                                </tr>    
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Tidak Ada Data Social Media
                                                </td>
                                            </tr>
                                        @endif 
                                       
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Service Social Media</div>
                                <p class="section-lead">All items here cannot be deleted.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Channel</th>
                                            <th class="text-center">Akun</th>
                                            <th class="text-center">Service</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Durasi</th>
                                        </tr>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (count($service) > 0)
                                             @foreach ($service as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->socialmedia->description }}</td>
                                                    <td ><a href="{{ $item->joinKolSosmed->url }}" target="_blank" >{{ $item->joinKolSosmed->username }}</a></td>
                                                    <td class="text-center">{{ $item->joinService->description }}</td>
                                                    <td class="text-center">Rp.{{ number_format($item->price) }}</td>
                                                    <td class="text-center">{{ $item->durasi.' minggu' }}</td>
                                                </tr>    
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Tidak Ada Data Service Social Media
                                                </td>
                                            </tr>
                                        @endif 
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6 for="category">Tipe</h6>
                                    <select name="koltype" class="form-control">
                                        <option value="0" {{ ($detail['koltypes'] == 0) ? 'selected' : '' }}>Pilih Tipe</option>
                                        @foreach ($type as $item)
                                            <option value="{{ $item->id }}" {{ ($detail['koltypes'] == $item->id) ? 'selected' : '' }}>{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6 for="category" >Kategori</h6>
                                    <select name="category" class="form-control">
                                        <option value="0" {{ ($detail['category'] == 0) ? 'selected' : '' }}>Pilih Kategori</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ ($detail['category'] == $item->id) ? 'selected' : '' }}>{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 float-left">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection