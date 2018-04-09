<div class="modal fade" id="myModal" role="dialog" aria-hidden="true" style ="top:30%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title text-center" id="exampleModalLabel">Warning</h1>
            </div>
            <div class="modal-body">
                You will proceed to the restricted area provided only for administrators of the current project. <br>
                Are you sure you want to continue?
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal"><button class="btn btn-danger">No, I am a regular user. Take me back</button></a>
                <a href="{{route('login')}}"><button class="btn btn-success">Yes, continue </button> </a>
            </div>
        </div>
    </div>
</div>