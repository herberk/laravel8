<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap ">
            <div class="md:w-1/4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Listado  {{ __('Todo') }}
                </h2>
            </div>
            <div class="md:w-3/4">
                @livewire('todo.todo-notification-component')
            </div>
        </div>
    </x-slot>

 <div class="py-6">
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
     <div class="mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{--                <div class="container mx-auto sm:px-4" >--}}
                    <div class="wrapper">
                        <div class="flex flex-wrap ">
                            <div class="md:w-1/6">
                               {{-- @livewire('todo.todo-notification-component') <!-- This component will show notification when todo is saved or updated -->--}}

                                @livewire('todo.form-component') <!-- This component will display Todo form -->
                            </div>
                            <div class="md:w-5/6">

                               @livewire('todo.list-component') <!-- This component will list Todos -->

                            </div>
                        </div>
                   </div>

{{--                </div>--}}
            </div>
       </div>

</div>
</x-app-layout>
