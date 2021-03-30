@if (Session::has('notif') && Session::get('notif') != '')
<div class="alert alert-danger alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('notif') }}
</div>
@endif
@php
Session::put('notif','');
@endphp