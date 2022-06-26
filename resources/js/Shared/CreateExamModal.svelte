<script>
    import Icon from './Icon.svelte';
    import Input from './Input.svelte';
    import { onMount } from 'svelte';
    import { createEventDispatcher } from 'svelte';
    import { onDestroy } from 'svelte';
    import { Inertia } from "@inertiajs/inertia";
    import { page } from '@inertiajs/inertia-svelte';

    
    export let errors;
    export let edit
    export let buttonText;
    export let examId;
    export let title;
    export let course;
    export let instructions;
    export let duration;
    export let grade;
    export let assignedClasses = [];
    
    let dispatch = createEventDispatcher();
    let courses = $page.props.courses;
    let classes = $page.props.classes;

    onMount(() => document.body.style.overflow = 'hidden');
    onDestroy(() => document.body.style.overflow = '');

    const createExam = (closeModal) => {

        let data = { title, instructions, duration, assignedClasses, course, examId, closeModal };

        Inertia.visit('/create/exam', {
            method: 'POST',
            data,
            onSuccess: visit => dispatch('close-modal'),
            preserveScroll: true,
            preserveState: true,
        });

    }

    const assignClass = () => {

        if( !assignedClasses.includes(grade) ) {
            assignedClasses.push(grade);
            assignedClasses = assignedClasses;
        }
    }

    const removeAssignedClass = (index) => assignedClasses = assignedClasses.filter((assignedClass, assignedClassIndex) => assignedClassIndex !== index );

</script>


<div class="fixed flex items-center inset-0 min-h-screen bg-dark bg-opacity-70 p-16 overflow-y-auto">
    <div class="relative ml-60 p-6 w-full min-h-full bg-white rounded text-sm mt-16">
        <div class="flex items-center justify-between pb-3 border-b border-gray-200">
            <span class="text-xl font-bold text-dark">Exam Details</span>

            <button on:click>
                <Icon name="cross" styling="h-6 w-6 cursor-pointer" />
            </button>
        </div>
        <div class="relative flex flex-row w-full space-x-4 mt-5">
            <div class="w-1/2 pr-12 space-y-5 border-r border-gray-100 text-dark text-sm">
                <Input { errors } bind:value={ title } type="text" showLabel="true" placeholder="Enter a title" label="Enter exam Title" id="title" name="title" /> 
                <Input { errors } bind:value={ course } type="select" showLabel="true" label="Select a Subject/ Course" id="course" name="course" style="w-full">
                    <option value="" selected disabled>Select a Subject</option>
                    { #each courses as { name } }
                        <option value={ name }>{ name }</option>
                    {/each}
                </Input > 
                <div class="flex flex-col space-y-2">
                    <label class="font-medium" for="instructions">Instructions <span class="text-red-500">*</span></label>
                    <textarea bind:value={ instructions } class="w-full h-28 border border-gray-300 rounded p-2 resize-none" maxlength="500" id="instructions" name="instructions" placeholder="Please enter instructions (Max of 500 characters)"></textarea>
                    { #if errors.instructions }
                        <span class="text-xs text-red-500">{  errors.instructions }</span>
                    { /if }
                </div>
                <Input { errors } bind:value={ duration } type="number" showLabel="true" placeholder="Enter duration in minutes" label="Duration (In Minutes)" id="duration" name="duration" /> 
            </div>
            <div class="relative px-4 h-full">
                <div class="flex flex-col space-y-2">
                    <label class="font-medium" for="assign">Assign To <span class="text-red-500">*</span></label>
                    <div class="flex flex-row space-x-2">
                        <select bind:value={ grade } class="p-2 border border-gray-300 rounded w-full" type="text" id="assignedClasses" name="assignedClasses">
                            <option selected disabled>Select a Class / Department</option>
                            { #each classes as grade }
                                <option value={ grade.id }>{ grade.className }</option>
                            {/each}
                        </select>
                        <button on:click={ assignClass } class="bg-dark text-white px-3 p-2 text-xs rounded">Assign</button>
                    </div>
                    { #if errors.assignedClasses }
                        <div class="text-xs text-red-500">{  errors.assignedClasses }</div>
                    { /if }
                </div>
                <div class="mt-10 flex flex-col space-y-2">
                    <label class="font-medium" for="assigned">Assigned Classes / Department</label>

                    <div class="flex flex-col space-y-1 text-xs text-gray-400">
                        { #if assignedClasses.length > 0 }
                            { #each assignedClasses as assignedClass, index }
                                <div class="flex flex-row space-x-4 items-center">
                                    <span>{ classes.filter( value  => assignedClass == value.id )[0].className }</span>
                                    <Icon on:click={ () => removeAssignedClass(index) } name="cross" styling="stroke-current text-red-500 h-3 w-3 cursor-pointer" />
                                </div>
                            {/each}
                        { :else }
                            No Department has been assigned
                        { /if }
                        
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 flex flex-row space-x-3">
                { #if edit }
                    <button on:click={ () => createExam(true) } class="bg-gray-400 text-sm text-white px-3 py-2 rounded">Update & Close</button>
                { :else } 
                    <button on:click|self class="bg-gray-400 text-sm text-white px-3 py-2 rounded">Close</button>
                {/if}
                <button on:click={ createExam } class="bg-green-500 text-sm text-white px-3 py-2 rounded">{ buttonText }</button>
            </div>
        </div>
    </div>
</div>
