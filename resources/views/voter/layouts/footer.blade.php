<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {{ auth()->user()->election->election }}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    {{ date('Y') }} © {{ config('app.name', 'Laravel') }}.
                </div>
            </div>
        </div>
    </div>
</footer>
