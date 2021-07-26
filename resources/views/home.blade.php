@extends('layouts.app')

@section('content')
<div class="container">
  <div class="alert alert-warning shadow">
    Subscription allows you to access other topics on this site and make posts on our community forum
  </div>
    <div class="row justify-content-center">
        <div class="col-md-10">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                      <h3 class="text-center font-weight-bold">Subscription Plans</h3>
                    </div>

                   <div class="row">

                       <div class="col-md-4">
                        <div class="card wow slideInLeft poppins bg-white shadow p-1 mt-3 text-center px-3 border-0"  data-wow-duration="1s" data-wow-delay="500ms">
                            <div class="card-header py-5 border-0 delimiter-bottom">
                              <span class="h6 text-dark fw-bold">BASIC</span></div>
                              <hr class="featurette-divider bg-light">
                              <div class="card-body"><ul class="list-unstyled text-muted text-sm opacity-8 mb-4">
                                <li>1k</li>
                                <li>One Month</li>
                                <li>Commenting</li>
                                <li>Three Categories</li>
                                <li>Use Forum</li>
                              </ul>
                              <a href="" class="btn btn-dark">Subscribe</a>
                            </div>
                        </div>
                       </div>

                       <div class="col-md-4">
                        <div class="card wow slideInLeft poppins bg-secondary shadow p-1 mt-3 text-center px-3 border-0"  data-wow-duration="1s" data-wow-delay="500ms">
                            <div class="card-header py-5 border-0 delimiter-bottom">
                              <span class="h6 text-white fw-bold">STANDARD</span></div>
                              <hr class="featurette-divider bg-light">
                              <div class="card-body"><ul class="list-unstyled text-muted text-sm opacity-8 mb-4">
                                <li class="text-white">10k</li>
                                <li class="text-white">One Year</li>
                                <li class="text-white">Commenting</li>
                                <li class="text-white">Three Categories</li>
                                <li class="text-white">Use Forum</li>
                              </ul>
                              <a href="" class="btn btn-light">Subscribe</a>
                            </div>
                        </div>
                       </div>

                       <div class="col-md-4">
                        <div class="card wow slideInLeft poppins bg-white shadow p-1 mt-3 text-center px-3 border-0"  data-wow-duration="1s" data-wow-delay="500ms">
                            <div class="card-header py-5 border-0 delimiter-bottom">
                              <span class="h6 text-dark fw-bold">PREMIUM</span></div>
                              <hr class="featurette-divider bg-light">
                              <div class="card-body"><ul class="list-unstyled text-muted text-sm opacity-8 mb-4">
                                <li>5K</li>
                                <li>Six Months</li>
                                <li>Commenting</li>
                                <li>Three Categories</li>
                                <li>Use Forum</li>
                              </ul>
                              <a href="" class="btn btn-dark">Subscribe</a>
                            </div>
                        </div>
                       </div>

                   </div>

                </div>
            </div>
    </div>
</div>
@endsection
