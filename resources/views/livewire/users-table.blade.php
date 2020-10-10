<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }} desde Tailwind
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<!--          Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
          Read the documentation to get started: https://tailwindui.com/documentation
        -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                   wire:model="search"
                                                   type="text" placeholder="Buscar..">
                                            <div class="form-input rounded-md shadow-sm mt-1 ml-6 block">
                                                <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                                                    <option value="5">5 por pagina</option>
                                                     <option value="10">10 por pagina</option>
                                                    <option value="15">15 por pagina</option>
                                                    <option value="50">50 por pagina</option>
                                                    <option value="100">100 por pagina</option>
                                                </select>
                                            </div>
                                             @if($search !=='')
                                                  <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
                                               @endif
                                        </div>
                                       @if($users->count())
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">
                                                    Nombre
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Equipo
                                                </th>
                                             <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                   Estado
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Rol
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50"></th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="{{$user->name}}}}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                                {{ $user->name }}
                                                            </div>
                                                            <div class="text-sm leading-5 text-gray-500">
                                                                {{ $user->email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                 <div class="text-sm leading-5 text-gray-900">Regional Paradigm Technician</div>
                                                    <div class="text-sm leading-5 text-gray-500">{{ $user->allTeams()->pluck('name')->join(', ') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                  Active
                                                </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                                    Admin
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                            </tr>

                                            @endforeach
                                            <!-- More rows... -->
                                            </tbody>
                                        </table>
                                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                           {{ $users->links() }}
                                        </div>
                                        @else
                                            <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                                               No hay resultados para la busqueda {{$search}} en la pagina {{$page}} al mostrar {{$perPage}} por pagina
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
