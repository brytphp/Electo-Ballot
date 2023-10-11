<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="row justify-content-center mt-sm-5">
        <div class="col-md-8">
            <div class="card bgdark">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <h4 class="mt-4 font-weight-semibold text-success">Upcoming Eelection</h4>
                                <hr>
                                <div class="mt-4">
                                </div>
                            </div>
                        </div>

                        <span> @include('partials.counter',['election' => $election])</span>

                        <div class="row justify-content-center mt-5 mb-2">
                                <div class="col-sm-6 col-8">
                                    <img src="{{ asset('svg/upcoming.svg') }}" alt=""
                                class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3 text-center">
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
