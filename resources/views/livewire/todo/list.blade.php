<div class="list-container">

    <div wire:loading wire:init="loadList" >
        {{ $loading_message }}
    </div>

    <div class="filter-container">
        <p class="text-2xl">Filtros</p>
        <div class="flex flex-wrap ">
            <div class="md:w-1/4 pr-4 pl-4">
                <label for="">Search Title</label>
                <input type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="filter.search"  >
            </div>

            <div class="md:w-1/5 pr-4 pl-4">
                <label for="">Status</label>
                <select wire:model="filter.status" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="pending">Task Pending</option>
                    <option value="accomplished">Task Accomplished</option>
                </select>
            </div>

            <div class="md:w-1/4 pr-4 pl-4">
                <label for="">Order Field</label>
                <select wire:model="filter.order_field" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="title">Task Title</option>
                    <option value="status">Task Status</option>
                </select>
            </div>

            <div class="md:w-1/5 pr-4 pl-4">
                <label for="">Order Type</label>
                <select wire:model="filter.order_type" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" >
                    <option value="">Choose One</option>
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>

            <div  style="display: flex;align-items: flex-end;" >
                <div>
                    <button type="button" wire:click="loadList" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" >Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="block w-full overflow-auto scrolling-touch">
        <table class="w-full max-w-full mb-4 bg-transparent table-hover table-bordered">
            <thead>
            <tr>
                <th style="width:70%;">Titulo</th>
                <th style="width:10%;">Estado</th>
                <th style="width:20%;">Accionesn</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($todos))
                @foreach($todos as $k => $v)
                    <tr>
                        <td>
                            <div>
                                <p class="text-xl"> <strong>Titulo: </strong> {{ $v["title"] }} </p>
                                <p>Descripcion: {{ $v["desc"] }}</p>
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
