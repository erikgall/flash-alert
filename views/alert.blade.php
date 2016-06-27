@if(session()->has('alert'))

    <alert-static :show.sync="true" :type.sync="'{{ session('alert.type') }}'" :message.sync="'{{ session('alert.message') }}'"></alert-static>

@endif