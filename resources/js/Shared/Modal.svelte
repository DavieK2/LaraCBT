<script>
    import Icon from './Icon.svelte';
    import { createEventDispatcher } from "svelte";
    import { onMount } from 'svelte';
    import { onDestroy } from 'svelte';

    onMount(() => document.body.style.overflow = 'hidden');
    onDestroy(() => document.body.style.overflow = '');
    
    let dispatch = createEventDispatcher();

    const modalAction = () => dispatch('modal-action');

    export let title;
    export let actionLabel;
    export let disabled;
</script>

<div class="fixed flex items-center justify-center inset-0 min-h-screen bg-dark bg-opacity-70 p-16 overflow-y-auto">
    <div class="relative ml-60 p-6  bg-white rounded text-sm mt-16">
        <div class="flex items-center justify-between pb-3 border-b border-gray-200">
            <span class="text-xl font-bold text-dark">{ title }</span>

            <button on:click>
                <Icon name="cross" styling="h-6 w-6 cursor-pointer" />
            </button>
        </div>
        <div class="relative flex flex-col w-full h-full mt-5">
           <slot></slot>
            <div class="mt-5 lex flex-row space-x-3">
                <button on:click|self class="bg-gray-400 text-sm text-white px-3 py-2 rounded">Cancel</button>
                <button { disabled } on:click={ modalAction } class="bg-green-500 text-sm text-white px-3 py-2 rounded disabled:bg-green-100 disabled:cursor-not-allowed">{ actionLabel }</button>
            </div>
        </div>
    </div>
</div>