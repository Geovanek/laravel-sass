<nav class="px-2 space-y-2" x-bind:class="{'px-4': !$store.sidebar.full}">
    <x-sidebar.nav.nav-link href="{{ route('dashboard') }}" 
        route="dashboard" 
        text="Dashboard" 
        icon="home" />

    <x-sidebar.nav.nav-link href="{{ route('users') }}" 
        route="users" 
        text="Users" 
        icon="users" 
        badgeValue="3" 
        badgeColor="bg-pink-600" />

    <x-sidebar.nav.nav-dropdown 
        toogle="test" 
        text="Multi Level" 
        icon="check"
        :routes="['dashboard', 'home']">

        <x-sidebar.nav.nav-sub-link href="{{ route('dashboard') }}" route="dashboard" text="Test" />
        <x-sidebar.nav.nav-sub-link href="{{ route('home') }}" route="home" text="Test" />

    </x-sidebar.nav.nav-dropdown>
</nav>