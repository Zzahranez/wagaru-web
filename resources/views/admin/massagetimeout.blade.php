<!-- Flash Message -->
@if (session('message'))
<div class="alert" style="background-color: #5a8f8c; color: white;" role="alert" role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif