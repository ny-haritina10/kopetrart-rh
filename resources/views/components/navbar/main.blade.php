<div class="fx__navbar shadow">
    <div class="fx__navbar-brand"> 
        <h1> <a href="/cost/center/detail"> Kopetrart RH </a> </h1> <br>

        {{-- <div class="head" style="text-align: left; padding-left: 10%">
            <p> 
                <i class="fas fa-user-tie"></i>
                Connecté: <b>{{ auth()->user()->role->label }}</b>
            </p> 
            
            <p>
                <i class="fas fa-sign-out-alt"></i>            
                <a href="/logout"> Déconnexion </a>
            </p>
        </div> --}}
    </div>

    {{-- Talent Management Section --}}
    <div class="fx__navbar-section">
        <h3 class="fx__navbar-subtitle"> Talent Management </h3>
        <ul class="fx__navbar-list">
            <x-navbar.item href="{{ route('talent_needs.create') }}" :active="$active"> 
                <i class="fas fa-user-plus"></i> Talent Need Form
            </x-navbar.item>
            <x-navbar.item href="{{ route('departments.index') }}" :active="$active"> 
                <i class="fas fa-building"></i> Manage Departments
            </x-navbar.item>
        </ul>
    </div>
</div>