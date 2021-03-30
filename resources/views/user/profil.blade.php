@extends('layouts.user')
@section('content')
<div class="section-body">
    <h2 class="section-title">Hi, {{ Str::ucfirst(Session::get('login')['name']) }}!</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>
    
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Posts</div>
                            <div class="profile-widget-item-value">{{ number_format($post) }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Followers</div>
                            <div class="profile-widget-item-value">{{ number_format($follower) }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Like</div>
                            <div class="profile-widget-item-value">{{ number_format($like) }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('user.getProfil') }}" class="btn btn-primary btn-block">
                        <i class="far fa-edit mr-2"></i>Perbaharui Profil
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            {{-- <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="Ujang" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="Maman" required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" value="ujang@maman.com" required="">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Phone</label>
                                <input type="tel" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-0 col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                    <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                    <div class="text-muted form-text">
                                        You will get new information about products, offers and promotions
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <h4>Social Media</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                        @foreach ($sosmed as $item_sosmed)
                        <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ asset('theme/img/avatar/avatar-1.png') }}">
                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="{{ route('user.sosmed_detail',['id' => $item_sosmed->id]) }}" class="link-user">
                                            {{ $item_sosmed->username }}
                                        </a>
                                    </div>
                                    <div class="text-job text-muted">{{ $item_sosmed->toSosmed->description }}</div>
                                    
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">{{ number_format($item_sosmed->post) }}</div>
                                        <div class="media-label">Posts</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">{{ number_format($item_sosmed->follower) }}</div>
                                        <div class="media-label">Followers</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">{{ number_format($item_sosmed->like) }}</div>
                                        <div class="media-label">Like</div>
                                    </div>
                                </div>
                        </li>    
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer mx-auto text-center">
                    <a href="{{ route('user.sosmed') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Social Media</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection