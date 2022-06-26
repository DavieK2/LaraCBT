<script>
    import Sidebar from './Sidebar.svelte';
    import MobileSidebar from './MobileSidebar.svelte';
    import TopBar from './TopBar.svelte';
</script>


<div class="relative min-h-screen">
    <Sidebar />
    <TopBar />
    <div class="flex flex-col mx-auto pt-24 pl-[15rem] h-full container">
        <slot></slot>
    </div>
</div>




