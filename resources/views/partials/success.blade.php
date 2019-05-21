@if (session('success'))
    <div class="block notice notice--success">
        {{ session('success') }}
    </div>
    <br>
@endif

@if (session('resent'))
    <div class="block notice notice--success">
        {{ __('Er werd een nieuwe bevestigingslink naar uw e-mail gestuurd.') }}
    </div>
    <br>
@endif

@if (session('warning'))
    <div class="block notice notice--warning">
        {{ session('warning') }}
    </div>
    <br>
@endif

@if (session('info'))
    <div class="block notice notice--info">
        {{ session('info') }}
    </div>
    <br>
@endif