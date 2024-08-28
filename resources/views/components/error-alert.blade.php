@if ($errors->any())
    <div class="bg-red-500 p-4 rounded mb-6 relative" x-data="{ show: true }" x-show="show">
        <button type="button" @click="show=false" class="font-bold">x</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
