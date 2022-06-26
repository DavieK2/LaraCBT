<svelte:options accessors />
<svelte:head>
    <link rel="stylesheet" href="/js/katex/katex.css">
    <script src="/js/katex/katex.js"></script>
</svelte:head>

<script>
    import('quill/dist/quill.snow.css');
    import Quill from 'quill/dist/quill';
   
    import { onMount } from "svelte";
    
    export let quill;
    export let showLabel;
    export let id;
    export let label;
    export let name;
    export let errors;

    onMount(() => {

       quill = new Quill('#editor-container', {
                modules: {
                    toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'formula'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ]
                },
                placeholder: 'Enter a question...',
                theme: 'snow'
                });
    });
    
</script>

<div class="flex flex-col space-y-2">
    { #if showLabel}
      <label class="font-medium" for={ id }>{ label }<span class="text-red-500">*</span></label>   
    { /if }
    <div id="editor-container">
        <slot></slot>
    </div>
    { #if errors[name] }
        <span class="text-xs text-red-500">{ errors[name] }</span>
    { /if }
</div>  


