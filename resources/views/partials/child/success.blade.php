@if (session('success'))
    <div class="block childNotice childNotice--success">
        {{ session('success') }}
    </div>
    <br>
@endif

@if (session('resent'))
    <div class="block childNotice childNotice--success">
        {{ __('Er werd een nieuwe bevestigingslink naar uw e-mail gestuurd.') }}
    </div>
    <br>
@endif

@if (session('warning'))
    <div class="block childNotice childNotice--warning">
        {{ session('warning') }}
    </div>
    <br>
@endif

@if (session('info'))
    <div class="block childNotice childNotice--info">
        {{ session('info') }}
    </div>
    <br>
@endif
