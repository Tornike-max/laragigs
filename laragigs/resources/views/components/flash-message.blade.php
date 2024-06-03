@if (session('message'))
    <div 
        x-data="{show: true}" 
        x-init="setTimeout(()=>show = false, 3000)" 
        x-show="show" 
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-600 text-white py-2 px-4 rounded-md text-center"
        style="margin-top: 10px;"
    >
        {{ session('message') }}
    </div>
@endif