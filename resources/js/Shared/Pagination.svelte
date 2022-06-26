<script>
    import { Link } from '@inertiajs/inertia-svelte';

    export let links = [];
</script>

<!-- dont render, if there's only 1 page (previous, 1, next) -->
{#if links && links.length !== 3}
    <div class="mt-6 -mb-1 flex flex-wrap">
        {#each links as { active, label, url } (label)}
            {#if url === null}
                <!-- Previous, if on first page -->
                <!-- Next, if on last page -->
                <!-- and dots, if exists (...) -->
                <!-- <div class="bg-white mr-1 mb-1 px-4 py-3 text-sm border rounded text-gray {label === 'Next' && 'ml-auto'}">{label}</div> -->
            {:else}
            <Link href='{ url }' preserveScroll preserveState >
                <button class:active={ active } class="bg-white mr-1 mb-1 px-4 py-3 border rounded text-sm hover:bg-white { label === 'Next' && 'ml-auto'}">
                    {label}
                </button>
            </Link>
            {/if}
        {/each}
    </div>
{/if}

<style>
    .active{
        background-color: #20304C;
        color: #ffffff

    }
</style>