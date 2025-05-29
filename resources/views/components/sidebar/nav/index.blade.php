<nav class="flex flex-col overflow-y-auto transition-all duration-300 space-y-2">

    <div class="flex items-center justify-center py-2">
        <x-application-logo x-bind:class="$store.sidebar.full ? 'w-13s h-13' : 'w-12 h-12'" />

        <span class="text-gray-900 dark:text-gray-200 font-rubik-dirt py-4"
            x-bind:class="$store.sidebar.full ? 'text-3xl px-2' : 'hidden'">   
            {{ config('app.name') }}
        </span>
    </div>

    <ul class="px-2 space-y-2" x-bind:class="{'px-4': !$store.sidebar.full}">
        <!-- SideBar Toggle -->
        <button @click="$store.sidebar.toggleSidebar()"
            class="hidden sm:block focus:outline-none absolute p-1 -right-3 top-10 bg-gray-100 dark:bg-gray-700 rounded-full shadow-md">
            <x-icon name="chevron-left" class="h-4 w-4 transform" x-bind:class="$store.sidebar.full ? '':'-rotate-180 '"/>
        </button>

        <x-sidebar.nav.item tab="home" text="Dashboard" icon="home" />

        <x-sidebar.nav.dropdown-item tab="users" text="Users" icon="users">
            <x-sidebar.nav.sub-item text="All Users"/>
            <x-sidebar.nav.sub-item text="Active Users"/>
            <x-sidebar.nav.sub-item text="Inactive Users"/>
        </x-sidebar.nav.dropdown-item>

        <x-sidebar.nav.item tab="posts" text="Posts" icon="newspaper" />

        <x-sidebar.nav.item tab="schedules" text="Schedules" icon="clock" badgeValue="3" badgeColor="bg-pink-600" />
    </ul>
</nav>