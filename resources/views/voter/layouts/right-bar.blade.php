<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Help</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />

        <div class="mx-3 textjustify"> {!! $election->how_to_vote !!}</div>

    </div>




    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        style="display: none;" id="modal-info">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">WELCOME {{ auth()->user()->first_name }}!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Let's get started...</h4>
                    <p>
                        Please take few seconds to go through the election process.
                    </p>

                    {!! $election->how_to_vote !!}

                    <strong>
                        Kindly click on <i class="bx bx-help-circle bx-tada text-danger"></i> at the top right corner
                        for more help.
                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

</div>
