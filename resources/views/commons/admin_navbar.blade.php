<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        @if(Auth::check())
            <a class="navbar-brand" href="{{ route('admin.home') }}">まちポケ</a>
        @else
            <a class="navbar-brand" href="/">まちポケ</a>
        @endif
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">{!! link_to_route('admin.logout', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else    
                    <li class="nav-item">{!! link_to_route('admin.login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif    
            </ul>
        </div>
    </nav>
</header>