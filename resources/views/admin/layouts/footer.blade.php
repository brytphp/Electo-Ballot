<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <b>{{ date('Y') }} © {{ config('app.name', 'Laravel') }}.</b>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block ">
                    <a href="javascript:void(0)" class="text-danger"><b>{{ config('version.string') }}</b></a>
                </div>
            </div>
        </div>
    </div>
</footer>
