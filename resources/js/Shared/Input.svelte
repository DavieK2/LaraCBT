<script>
    export let id;
    export let placeholder;
    export let label;
    export let value;
    export let showLabel;
    export let type;
    export let name;
    export let errors;
    export let style;
    

</script>


<div class="flex flex-col space-y-2">
    { #if showLabel}
        <label class="" for={ id }>{ label }<span class="text-red-500">*</span></label>   
    { /if }

    { #if type === 'text'}
        <input bind:value on:input class="p-2 border border-gray-300 rounded { style }" type="text" { id } { placeholder } { name } >
    { :else if type === 'number'}
        <input bind:value on:input class="p-2 border border-gray-300 rounded { style }" type="number" { id } { placeholder } { name } >
    { :else if type === 'select'}
        <div class="flex flex-row space-x-2">
            <select bind:value class="p-2 border border-gray-300 rounded { style }" type="text" { id } { name }>
                <slot></slot>
            </select>
        </div>
    {/if}
    { #if errors && errors[name] }
        <span class="text-xs text-red-500">{ errors[name] }</span>
    { /if }
</div>  

