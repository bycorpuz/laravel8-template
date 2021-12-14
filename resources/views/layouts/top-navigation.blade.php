<div id="shortcut">
    <ul>
        <li class="{!! Request::is('home') ? 'active' : '' !!}">
            <a href="{{ url('/home') }}" class="jarvismetro-tile big-cubes bg-color-blueLight {!! Request::is('home') ? 'selected' : '' !!}"> 
                <span class="iconbox"> 
                    <i class="fa fa-home fa-4x"></i> 
                    <span>Home </span> 
                </span> 
            </a>
        </li>
    </ul>
</div>