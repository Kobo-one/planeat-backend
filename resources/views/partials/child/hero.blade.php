<div class="hero__details text--center">
    <div class="hero--equipment">
        <img class="hero--avatar" src="{{asset($child->avatar->imgBig)}}" alt="Your avatar">
        @if($child->weapon)
            <img src="{{asset($child->weapon->img)}}" alt="{{$child->weapon->name}}" class="hero--weapon">
        @endif
        @if($child->shield)
            <img src="{{asset($child->shield->img)}}" alt="{{$child->shield->name}}" class="hero--shield">
        @endif
    </div>
    <h1>{{$child->name}}</h1>
    <h2>Level {{$child->level}}</h2>
    <h3>{{$child->xp}} EXP.</h3>


</div>
