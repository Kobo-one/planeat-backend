<div class=" adultHeader">
    <div class="grid grid--3-col adultHeader__options">
        <div class="grid__item text--left">@if($back)<a class="adultHeader__Back" href="{{$back}}">< Back</a>@endif</div>
        <div class="grid__item text--center">@if($title){{$title}}@endif</div>
        <div class="grid__item text--right">@if($rightUrl)<a class="adultHeader__link" href="{{$rightUrl}}"><img src="{{asset($icon)}}" alt="" class="icon icon__header"></a>@endif</div>
    </div>
    @if($search)
        <div class="adultHeader__search">
            <form action="{{url()->current()}}" method="GET">
                <input type="text" placeholder="Search..." name="search">
            </form>
        </div>
    @endif
</div>
