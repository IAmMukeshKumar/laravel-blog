@if(session('success'))
    <div class="alert alert-success">
        <i class="glyphicon glyphicon-ok"></i> {{session('success')}}
    </div>
@endif