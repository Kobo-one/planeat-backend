<div class="grid grid--bp-med-3-col">

    <div class="grid__item text text--left">@if($back)<a href="{{url()->previous()}}">< Back</a>@endif</div>
    <div class="grid__item text text--center">@if($title){{$title}}@endif</div>
    <div class="grid__item text text--right">@if($rightUrl)<a href="{{$rightUrl}}"><img src="{{asset($icon)}}" alt="" class="icon icon__header"></a>@endif</div>


</div>
