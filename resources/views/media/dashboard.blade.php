@extends('Layouts.media')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Admin</h4>
                </div>
                <div class="card-body">
                    10
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>News</h4>
                </div>
                <div class="card-body">
                    42
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Reports</h4>
                </div>
                <div class="card-body">
                    1,201
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Online Users</h4>
                </div>
                <div class="card-body">
                    47
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Statistics</h4>
                <div class="card-header-action">
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary">Week</a>
                        <a href="#" class="btn">Month</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="182"></canvas>
                <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                        <div class="detail-value">$243</div>
                        <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                        <div class="detail-value">$2,902</div>
                        <div class="detail-name">This Week's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                        <div class="detail-value">$12,821</div>
                        <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                        <div class="detail-value">$92,142</div>
                        <div class="detail-name">This Year's Sales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>KOL terbaru</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    @for ($i = 0; $i < 4; $i++)
                    <li class="media">
                        <img class="mr-3 rounded-circle" width="50" src="{{ asset('theme/img/avatar/avatar-1.png') }}" alt="avatar">
                        <div class="media-body">
                            <div class="float-right text-primary">Now</div>
                            <div class="media-title">Farhan A Mujib</div>
                            <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                        </div>
                    </li>
                    @endfor
                </ul>
                {{-- <div class="text-center pt-1 pb-1">
                    <a href="#" class="btn btn-primary btn-lg btn-round">
                        View All
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Referral URL</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">2,100</div>
                    <div class="font-weight-bold mb-1">Google</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">1,880</div>
                    <div class="font-weight-bold mb-1">Facebook</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">1,521</div>
                    <div class="font-weight-bold mb-1">Bing</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">884</div>
                    <div class="font-weight-bold mb-1">Yahoo</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">473</div>
                    <div class="font-weight-bold mb-1">Kodinger</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">418</div>
                    <div class="font-weight-bold mb-1">Multinity</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Tasks</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    @for ($i = 0; $i < 4; $i++)
                        <li class="media">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cbx-{{$i}}" checked="">
                                <label class="custom-control-label" for="cbx-{{$i}}"></label>
                            </div>
                            <img class="mr-3 rounded-circle" width="50" src="{{ asset('theme/img/avatar/avatar-5.png') }}" alt="avatar">
                            <div class="media-body">
                                <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                                <h6 class="media-title"><a href="#">Add a new component</a></h6>
                                <div class="text-small text-muted">Serj Tankian <div class="bullet"></div> 4 Min</div>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection