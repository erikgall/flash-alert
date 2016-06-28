@if(session()->has('alert'))

    <flash-alert :show.sync="true"
                  icon="{{ session()->has('alert.icon') ? session('alert.icon') : 'fa-bell-o' }}"
                  type="{{ session('alert.type') }}"
                  message="{{ session('alert.message') }}"
                  :autohide="{{ session()->has('alert.autohide') ? session('alert.autohide') : 0 }}"></flash-alert>

@endif