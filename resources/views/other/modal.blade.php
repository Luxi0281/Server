<div class="modal fade" id="myModal" role="dialog" aria-hidden="true" style ="top:30%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-center" id="exampleModalLabel">@lang('welcome.modalHead')</h1>
            </div>
            <div class="modal-body">
                @lang('welcome.modalP1') <br>
                @lang('welcome.modalP2')
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal"><button class="btn btn-danger">@lang('welcome.modalNo')</button></a>
                <a href="{{route('login')}}"><button class="btn btn-success">@lang('welcome.modalYes') </button> </a>
            </div>
        </div>
    </div>
</div>