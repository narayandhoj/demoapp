@if (session('success_message'))
<div class="alert alert-success alert-block">
    <button class="close close-sm" data-dismiss="alert" type="button">
        <i class="fa fa-times">
        </i>
    </button>
    {{ session('success_message') }}
</div>
@endif

@if (session('warning_message'))
<div class="alert alert-block alert-danger">
    <button class="close close-sm" data-dismiss="alert" type="button">
        <i class="fa fa-times">
        </i>
    </button>
    {{ session('warning_message') }}
</div>
@endif
