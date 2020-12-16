@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
@endif

<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500" id="dvInfo">
    <span class="text-xl inline-block mr-5 align-middle">
        <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8" id='msg-retorno' >
        <span id="msgInfo"></span>
    </span>
    <button id="btnInfo" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" >
        <span>×</span>
    </button>
</div>

<script type="text/javascript">

jQuery(document).ready(function ($){

    $('#dvInfo').hide();
        $("#btnInfo").click(
            function () {
                $('#dvInfo').hide();
            }
        );
});

</script>
