<nav class="adultNavigation">

    <div class="grid grid--4-col nav__options">

        <div class="grid__item">
            <div class="nav__item {{setActive('adult')}}">
                <a href="{{route('adult_index')}}">
                    <img class="nav__img" src="{{asset('img/icons/navigation/home'.setActiveImage('adult').'.svg')}}" alt="">
                    <p>Home</p>
                </a>
            </div>
        </div>
        <div class="grid__item">
            <div class="nav__item {{setActive('adult/planning')}}">
                <a href="{{route('planning_index')}}">
                    <img class="nav__img" src="{{asset('img/icons/navigation/planning'.setActiveImage('adult/planning').'.svg')}}" alt="">
                    <p>Planning</p>
                </a>
            </div>
        </div>
        <div class="grid__item">
            <div class="nav__item {{setActive('adult/family')}}">
                <a href="{{route('family_index')}}">
                    <img class="nav__img" src="{{asset('img/icons/navigation/family'.setActiveImage('adult/family').'.svg')}}" alt="">
                    <p>Family</p>
                </a>
            </div>
        </div>
        <div class="grid__item">
            <div class="nav__item {{setActive('adult/settings')}}">
                <a href="{{route('settings_index')}}">
                    <img class="nav__img" src="{{asset('img/icons/navigation/settings'.setActiveImage('adult/settings').'.svg')}}" alt="">
                    <p>Settings</p>
                </a>
            </div>
        </div>

    </div>

</nav>
