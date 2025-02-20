
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('questions.index')" :active="request()->routeIs('questions.*')">
        {{ __('Questions') }}
    </x-nav-link>
    @auth
        <x-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.*')">
            {{ __('Mes Favoris') }}
        </x-nav-link>
    @endauth
</div><?php
