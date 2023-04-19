<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="card-header">
            Dashboard
        </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(in_array(Auth::user()->tipo_usuario_id, [3]))
                        <x-nav-link :href="route('pacientes.lista')" :active="request()->routeIs('pacientes.lista') or request()->routeIs('pacientes.create') or request()->routeIs('pacientes.edit') or request()->routeIs('pacientes.show')">
                            {{ __('Mis Pacientes') }}
                        </x-nav-link>
                    @endif
                    @if(Auth::user()->tipo_usuario_id == 3)
                            {{--<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>--}}
                            <x-nav-link :href="route('paciente.lista')" :active="request()->routeIs('pacientes.index') or request()->routeIs('pacientes.create') or request()->routeIs('pacientes.edit') or request()->routeIs('pacientes.show')">
                                {{ __('Pacientes') }}
                            </x-nav-link>
                    @endif
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
