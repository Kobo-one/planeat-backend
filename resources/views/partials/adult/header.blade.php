<div class="adultHeader">

    <div class="adultHeader__item">@if($back)<a href="{{url()->previous()}}">< Back</a>@endif</div>
    <div class="adultHeader__item">@if($title){{$title}}@endif</div>
    <div class="adultHeader__item">@if($rightUrl)<a href="{{$rightUrl}}"><img src="{{asset($icon)}}" alt="" class="adultHeader__icon"></a>@endif</div>


</div>
