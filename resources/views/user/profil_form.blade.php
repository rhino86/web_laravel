@extends('layouts.user')
@section('content')
<div class="section-body">
    
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 ">
                    
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="d-block">Ubah Profil</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('user.updateProfil') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="frist_name">Nama Lengkap</label>
                                <input type="text" class="form-control {{  ($errors->has('name')) ? 'is-invalid' : '' }}" name="name" value="{{ $detail['name'] }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="frist_name">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $detail['username'] }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" class="form-control {{  ($errors->has('gender')) ? 'is-invalid' : '' }}">
                                    <option value="1" {{ ($detail['gender'] == 1) ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="2" {{ ($detail['gender'] == 2) ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="religion">Agama</label>
                                <select name="religion" class="form-control {{  ($errors->has('religion')) ? 'is-invalid' : '' }}">
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
                                <label for="tempatLahir">Tempat Lahir</label>
                                <input type="text" name="tempatLahir" class="form-control {{  ($errors->has('tempatLahir')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['tempatLahir'])) ? $detail['tempatLahir'] : old('tempatLahir') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('tempatLahir') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="taggalLahir">Tanggal Lahir</label>
                                <input type="text" name="tanggalLahir" class="form-control use-datepicker {{  ($errors->has('tanggalLahir')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['tanggalLahir'])) ? date('m/d/Y', strtotime($detail['tanggalLahir'])) : date('m/d/Y', strtotime(old('tanggalLahir'))) }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggalLahir') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control-textarea" rows="4">{{ $detail['description'] }}</textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Lokasi</label>
                                <select name="location" class="form-control use-select2-non-multiple {{  ($errors->has('location')) ? 'is-invalid' : '' }}">
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
                                <label for="contact_person">Kontak Person</label>
                                <input type="text" name="contact_person" class="form-control {{  ($errors->has('contact_person')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['contact_person'])) ? $detail['contact_person'] : old('contact_person') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_person') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="bank_name">bank</label>
                                <select name="bank_name" id="bank_name" class="form-control {{  ($errors->has('bank_name')) ? 'is-invalid' : '' }}">
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
                                <label for="bank_account">Pemilik Rekening</label>
                                <input type="text" name="bank_account" class="form-control {{  ($errors->has('bank_account')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['bank_account'])) ? $detail['bank_account'] : old('bank_account') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_account') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="bank_number_account">Nomor Rekening</label>
                                <input type="text" name="bank_number_account" class="form-control {{  ($errors->has('bank_number_account')) ? 'is-invalid' : '' }}" value="{{ (!empty($detail['bank_number_account'])) ? $detail['bank_number_account'] : old('bank_number_account') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_number_account') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="inters">Interst</label>
                                <select name="interst[]" class="form-control user-select2 {{  ($errors->has('interst')) ? 'is-invalid' : '' }}" multiple>
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
                                <label for="inters">Audiens Character</label>
                                <select name="audience_character[]" class="form-control user-select2 {{  ($errors->has('audience_character')) ? 'is-invalid' : '' }}" multiple>
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
                        
                        <div class="row">
                            <div class="col-sm-3 float-left">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection