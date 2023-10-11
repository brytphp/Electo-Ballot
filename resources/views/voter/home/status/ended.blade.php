<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="row justify-content-center mt-sm-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <h4 class="mt-4 font-weight-semibold text-danger">Election Closed</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-2 mb-2">
                            <div class="col-sm-6 col-8">
                                <div>
                                    <img src="{{ asset('svg/close.svg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3 ">

                                {{-- <h2>Total Vote Cast
                                    {{ auth()->user()->election->voted->count() }}/{{ auth()->user()->election->register->count() }}
                                </h2> --}}

                                <a href="javascript:void(0)" class="btn btn-outline-dark waves-effect waves-light"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Close Window
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
