<div class="app-header">
    <div class="app-header-left">
        <span class="app-icon"></span>
        <p class="app-name">Agung Trans Mandiri</p>
    </div>
    <div class="app-header-right">
        <div class="dropdown">
            <button class="profile-btn">
                @if(auth()->user()->image == 'no picture')
                    <img src="{{ url('asset/account.png') }}" />
                @else
                    <img src="{{ url('asset/profile-image'.auth()->user()->image) }}" alt="">
                @endif
                <span>{{ old('name', Auth::user()->name) }}</span>
            </button>
            <div class="dropdown-content">
                <a href="/logout">Log Out</a>
            </div>
        </div>
    </div>
</div>