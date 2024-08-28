@session('success')
    <div class="bg-green-500 p-4 rounded mb-6 relative" x-data="{ show: true }" x-show="show">
        <button type="button" @click="show=false" class="font-bold">x</button>
        <p>
            {{ session('success') }}
        </p>
    </div>
@endsession
