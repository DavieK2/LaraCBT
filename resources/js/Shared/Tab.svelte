<script>
    export let title;
    export let activeTab;
</script>


<li class="px-6 py-2 bg-white group ease-linear transition-all duration-150 flex flex-col justify-between pt-3 rounded-full font-normal cursor-pointer">
    <span class:text-dark={ title === activeTab }  class="group-hover:text-dark">{ title }</span>
    <div class:bg-gray-900={ title === activeTab } class="w-full h-1 group-hover:bg-dark rounded-full bg-gray-300"></div>
</li>