<script>
    export let styling;
</script>

<div class="w-full h-full overflow-x-auto">
    <div class="{ styling } bg-white rounded-lg mt-10">
        <div class="flex items-center w-full h-12 rounded">
            <ul class="w-full flex flex-row bg-gray-50 text-dark rounded-t-lg py-4 items-center uppercase text-xs font-bold">
                <slot name="thead"></slot>
            </ul>
        </div>
    
        <div class="flex flex-col space-y-3 items-center mt-5 w-full h-full">
            <slot></slot>
        </div>
    </div>
</div>