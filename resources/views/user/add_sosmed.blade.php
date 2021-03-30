@extends('layouts.user')
@section('content')
<div class="section-body">
    
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 ">
                    
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="d-block">Tambah Social Media</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('user.addSosmed') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="frist_name">Jenis</label>
                                <select name="sosmedtype" id="jenis_sosmed" class="form-control">
                                    @foreach ($sosmed as $item)
                                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control {{  ($errors->has('username')) ? 'is-invalid' : '' }}" name="username" value="{{ old('username') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="url">Url</label>
                                <input id="url" type="text" class="form-control {{  ($errors->has('url')) ? 'is-invalid' : '' }}" name="url" value="{{ old('url') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            </div>
                        </div>

                        <div class="row" id="intagram">
                            <div class="form-group col-3">
                                <label for="follower">Followers</label>
                                <input id="follower" type="number" class="form-control {{  ($errors->has('follower')) ? 'is-invalid' : '' }}" name="follower" value="{{ old('follower') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('follower') }}
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="post">Post</label>
                                <input id="post" type="number" class="form-control {{  ($errors->has('post')) ? 'is-invalid' : '' }}" name="post" value="{{ old('post') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('post') }}
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="like">Likes</label>
                                <input id="like" type="number" class="form-control {{  ($errors->has('like')) ? 'is-invalid' : '' }}" name="like" value="{{ old('like') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('like') }}
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="comment">Comments</label>
                                <input id="comment" type="number" class="form-control {{  ($errors->has('comment')) ? 'is-invalid' : '' }}" name="comment" value="{{ old('comment') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="engagement">Engagement</label>
                                <input id="engagement" type="number" class="form-control {{  ($errors->has('engagement')) ? 'is-invalid' : '' }}" name="engagement" value="{{ old('engagement') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('engagement') }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="engagement">Engagement Rate</label>
                                <input id="engagement" type="text" class="form-control {{  ($errors->has('engagement_rate')) ? 'is-invalid' : '' }}" name="engagement_rate" value="{{ old('engagement_rate') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('engagement_rate') }}
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