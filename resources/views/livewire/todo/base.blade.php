{{--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Livewire | Todo Application with Sorting, Filtering and Paginating</title>
        @livewireStyles
        @livewireScripts

        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

        <style>
            .error{
                color: red;
            }

            .container{
                max-width: 70%;
            }
        </style>
    </head>
    <body>--}}
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }} desde Tailwind
        </h2>
    </x-slot>
        <div class="container mx-auto sm:px-4" >
            <div class="wrapper">
                <div class="title-container">
                    <h1 class="title text-center">Laravel Livewire | Todo Application with Sorting, Filtering and Paginating</h1>
                </div>

                <div class="flex flex-wrap ">
                    <div class="md:w-1/4 pr-4 pl-4">

                        @livewire('todo.todo-notification-component') <!-- This component will show notification when todo is saved or updated -->

                        @livewire('todo.form-component') <!-- This component will display Todo form -->

                    </div>

                    <div class="md:w-3/4 pr-4 pl-4">

                        @livewire('todo.list-component') <!-- This component will list Todos -->

                    </div>
                </div>
            </div>

        </div>
</div>
 {{--       <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>--}}
