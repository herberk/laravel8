<div class="list-container">
{{--{{dd($todos)}}--}}
    <div wire:loading wire:init="loadList" >
        {{ $loading_message }}
    </div>

   <div class="filter-container">

        <div class=" flex flex-wrap ">
            <div class="md:w-1/4 pr-4 pl-4">
{{--                class="block appearance-none w-full py-1 px-2 mt-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"--}}
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model="search"  placeholder="Buscar en titulo..">
            </div>

            <div class="md:w-1/5 pr-4 pl-4">
{{--                <label for="">Status</label>--}}
                <select wire:model="filter.status" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="pending">Task Pending</option>
                    <option value="accomplished">Task Accomplished</option>
                </select>
            </div>

           {{-- <div class="md:w-1/4 pr-4 pl-4">
--}}{{--                <label for="">Order Field</label>--}}{{--
                <select wire:model="filter.order_field" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="title">Task Title</option>
                    <option value="status">Task Status</option>
                </select>
            </div>--}}
            <div class="md:w-1/4 pr-4 pl-4 mt-1">
                <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.empresas_id" >
                    <option value="">Selecione empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id}}"{{ old('empresas_id', $empresa->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
                    @endforeach
                </select>
                @error('empresas_id')
                <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>

   {{--         <div class="md:w-1/5 pr-4 pl-4">
                <label for="">Order Type</label>
                <select wire:model="filter.order_type" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>--}}


{{--             <div class="md:w-1/5 pr-4 pl-4">--}}
                <div class="form-input rounded-md shadow-sm mt-1 ml-6 block">
                    <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                        <option value="5">5 por pagina</option>
                        <option value="10">10 por pagina</option>
                        <option value="15">15 por pagina</option>
                        <option value="50">50 por pagina</option>
                        <option value="100">100 por pagina</option>
                    </select>
                </div>

{{--            </div>--}}

                <div>
                    @if($search !=='')
                        <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
                    @endif

                </div>
            {{--              <div  style="display: flex;align-items: flex-end;" >--}}
            {{--<button type="button" wire:click="loadList" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 mb-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-900" >Filtrar</button>--}}
            {{--            </div>--}}
            {{--        </div>--}}
    </div>

    <div class="block w-full overflow-auto scrolling-touch">
        <table class="border-collapse border-2 border-gray-500">
            <thead>
            <tr class="border border-gray-400 px-4 py-2 text-gray-800 text-xl">
                <th>Empresa</th>
                <th style="width: 60%">Titulo y detalle</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th >Accionesn</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($todos))
                @foreach($todos as $k => $v)
                    <tr  class="border border-gray-400 px-4 py-2">
                       <td>
                           {{$v->empresas->name_corto}}
                       </td>
                        <td>
                            <div>
                                <p class="text-xl"> <strong>Titulo: </strong> {{ $v["title"] }} </p>
                                <p>Detalle: {{ $v["desc"] }}</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p>Vencimiento: {{ $v->fevento }} </p>
                                <p>Modificado: {{ $v->updated_at }}</p>
                            </div>
                        </td>
                        <td>
                            @if($v["status"]=="pending")
                                Pendiente
                            @endif
                            @if($v["status"]=="accomplished")
                               Cumplido
                            @endif
                        </td>
                        <td>
                            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" wire:click="$emitTo('todo.form-component', 'edit', {{ $v['todo_id'] }})" >Editar</button>
                            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700" >Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center" >No Tasks found.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $todos->links() }}
        </div>
    </div>

</div>
