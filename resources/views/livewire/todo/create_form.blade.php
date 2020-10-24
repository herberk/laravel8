<div class="form-container ">
    <form wire:submit.prevent="save" method="post">
        <div class="flex flex-wrap">
            <div class="md:w-full text-center mb-6 pb-4">
                 <p class="text-2xl" > {{ $submit_btn_title }}</p>
            </div>
            <div class="md:w-full pr-4 pl-4">
                <input type="hidden" wire:model="form.todo_id" >
                <label for="">Titulo</label>
                <input type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.title" >
                @error('title')
                <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <br>
        <div class="flex flex-wrap ">
            <div class="md:w-full pr-4 pl-4">
                <label for="">Descripcion</label>
                <textarea rows="3" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.desc" ></textarea>
                @error('desc')
                <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <br>
        <div class="flex flex-wrap ">
          <div class="md:w-full pr-4 pl-4">
                <label for="">Estado de Tarea</label>
                <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.status" >
                    <option value="">Choose One</option>
                    <option value="pending">Pendiente</option>
                    <option value="accomplished">Completada</option>
                </select>
                @error('status')
                <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>

            <div class="md:w-full pr-4 pl-4">
                <label for="">Empresas</label>
                    <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.empresas_id" >
                     <option value="">Selecione</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id}}"{{ old('empresas_id', $empresa->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
                    @endforeach
                 </select>
                @error('empresas_id')
                   <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>

            <div class="md:w-full pr-4 pl-4">
                <label for="">Vencimiento</label>
                <input type="date" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" wire:model="form.fevento" >
                @error('fevento')
                  <label class="error text-sm text-red-600">{{ $message }}</label>
                @enderror
            </div>

        </div>
        <br>
        <div class="flex flex-wrap ">
            <div class="md:w-full mb-6 pr-4 pl-4">
                <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 btn-md" >{{ $submit_btn_title }}</button>
            </div>
        </div>
    </form>
</div>
