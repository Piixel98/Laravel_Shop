@if(Session::has('success'))
    <div id="alertMsg" class="alert alert-dismissible alert-success"  role="alert">
        {{Session::get('success')}}
    </div>
@elseif( Session::has('warning'))
    <div id="alertMsg" class="alert alert-dismissible alert-warning"  role="alert">
        {{Session::get('warning')}}
    </div>
@elseif(Session::has('error'))
    <div id="alertMsg" class="alert alert-dismissible alert-error"  role="alert">
        {{Session::get('error')}}
    </div>
@elseif(Session::has('info'))
    <div id="alertMsg" class="alert alert-dismissible alert-info"  role="alert">
        {{ Session::get('info')}}
    </div>
@endif

