<nav class="adultNavigation">

    <div class="grid grid--4-col nav__options">

        <div class="grid__item">
            <div class="nav__item {{setActive('home')}}">
                <a href="{{route('adult_index')}}">
                    <img class="nav__img" src="{{asset('img/icons/navigation/home'.setActiveImage('home').'.svg')}}" alt="">
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
                    <p>Kids</p>
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
