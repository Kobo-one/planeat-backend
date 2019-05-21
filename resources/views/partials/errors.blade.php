@if ($errors->any())
    <div class="block notice notice--danger">
        <ul class="list list--reset">
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    <br>
@endif
