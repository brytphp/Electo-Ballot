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
                    <h5 class="modal-title mt-0">Hi {{ auth()->user()->first_name }},</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! $election->how_to_vote !!}

                    <strong class="text-uppercase">
                        KINDLY CLICK ON <i class="bx bx-help-circle bx-tada text-danger"></i> AT THE TOP RIGHT CORNER TO
                        SHOW THIS AGAIN.
                    </strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

</div>
