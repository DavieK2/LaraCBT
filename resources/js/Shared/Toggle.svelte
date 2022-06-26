<script>
    export let id;
</script>

<div class="flex items-center justify-center">
    <label for={ id } class="flex items-center cursor-pointer">
      <div class="relative">
        <input type="checkbox" id={ id } class="sr-only">
        <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
        <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
      </div>
    </label>
</div>



<style>
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }

    /* Toggle B */
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }   
</style>