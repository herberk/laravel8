<div>
    @if(session()->has('success'))
        <div class="border rounded bg-green-200 border-green-300 text-green-800  opacity-0 opacity-100 block">
{{--           <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert">×</button>--}}
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="border rounded bg-red-200 border-red-300 text-red-800  opacity-0 opacity-100 block">
{{--           <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert">×</button>--}}
            {{ session('error') }}
        </div>
    @endif
</div>
{{--relative px-3 py-3 mb-4--}}
