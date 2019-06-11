<nav class="childNavigation">


    <div class="nav__item {{childNav('home')}}">
        <a href="{{route('child_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/map-icon.svg')}}" alt="map icon">
            </div>
            <p>Map</p>
        </a>
    </div>

    <div class="nav__item {{childNav('quests')}}">
        <a href="{{route('child_quests_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/quest-icon.svg')}}" alt="quest icon">
            </div>
            <p>Quests</p>
        </a>
    </div>

    <div class="nav__item {{childNav('goals')}}">
        <a href="{{route('child_goals_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/medal-icon.svg')}}" alt="goals icon">
            </div>
            <p>Goals</p>
        </a>
    </div>

    <div class="nav__item {{childNav('hero')}}">
        <a href="{{route('child_hero_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset(Auth::user()->currentMember()->avatar->img)}}" alt="avatar icon">
            </div>
            <p>Hero</p>
        </a>
    </div>


    <div class="subNavigation">
        @yield('subNavigation')
    </div>

</nav>
