<svelte:options accessors />

<script>
    import Tab from './Tab.svelte';
    import { createEventDispatcher } from "svelte";
    import { Inertia } from "@inertiajs/inertia";
    import { inertia, page } from '@inertiajs/inertia-svelte';
    
    export let questions;
    
    let dispatch = createEventDispatcher();
    let activeTab = 'Questions';
    $: $page.url.startsWith('/create/question-bank') ? activeTab = 'QuestionBank' : activeTab = activeTab;

    let questionTabs = [
        { title: 'Questions', url: `/create/question/${ $page.props.exam_code }` },
        { title: 'QuestionBank', url: `/create/question-bank/${ $page.props.exam_code }` },
    ];
    
    let questionIndex = 0;
    let questionsIndex = 0;
    let questionBankIndex = 0;


    const editQuestion = (id) => dispatch('edit-question', { id });

    const changeQuestion = (index) => {

        if(activeTab === 'Questions'){

            questionsIndex = index;
            questionIndex = questionsIndex;
        }
            
        if(activeTab === 'QuestionBank'){

            questionBankIndex = index;
            questionIndex = questionBankIndex;
        }
           
    }

    const changeTab = (title, url) => Inertia.visit( url, { 
        method: 'GET', 
        onSuccess: visit => { 
            activeTab = title;
            activeTab === 'Questions' ? questionIndex = questionsIndex : questionIndex = questionBankIndex;
        }, 
        preserveScroll: true, 
        preserveState: false 
    } );

</script>


<div class="m-6 min-h-[20rem] pb-8 flex-1 rounded-xl px-6">
   
    <ul class="flex flex-row items-center gap-8 -mt-3 text-gray-600">
        { #each questionTabs as { title , url }, index }
            <button on:click={ () => changeTab(title, url) } ><Tab { title } { activeTab } /></button>    
        {/each}
    </ul>
    
    { #if questions.length > 0 }

        <div class="p-6 border-gray-300 border-2 mt-5 rounded-xl">
            { #each questions as { question, questionType, answers, correctAnswer, marks, id }, index }
                { #if questionIndex === index }
                    <div class="flex flex-col w-full space-y-2">
                        <span class="text-base font-semibold">Question: ({ questionType })</span>
                        <span>{ @html question }</span>
                    </div>

                    { #if questionType === 'Multiple Choice Question' }
                        <div class="flex flex-col mt-6 space-y-2">
                            <span class="text-sm font-semibold">Choices:</span>
                            <ul class="flex flex-col space-y-1">
                                { #each answers as answer, answerIndex }
                                    <li class:bg-green-100={ parseInt(correctAnswer) === answerIndex } class="text-gray-400  bg-gray-100 px-3 py-2 rounded">{ answer }</li>
                                {/each}
                            </ul>
                        </div>
                    { /if }
                    <div class="flex mt-10 space-x-2 items-center">
                        <span class="text-sm font-semibold">Marks:</span>
                        <span class="text-sm font-semibold">{ marks }</span>
                    </div>
                    <div class="flex flex-row space-x-2 mt-8">
                        { #if activeTab === 'Questions' }
                            <button on:click={ () => editQuestion(id) } class="bg-blue-500 text-white text-xs px-3 py-2 rounded font-semibold uppercase">Edit</button>
                            <button use:inertia={{ href: '/delete/question', data: { id, examId: $page.props.exam_id }, method: 'POST', preserveScroll: true, preserveState: true  }} class="bg-red-500 text-white text-xs px-3 py-2 rounded font-semibold uppercase">Delete</button>
                        { /if }
                        { #if activeTab === 'QuestionBank' }
                            <button use:inertia={{ href: '/add/question', data: { id, examId: $page.props.exam_id }, method: 'POST', preserveScroll: true, preserveState: true  }} class="bg-green-500 text-white text-xs px-3 py-2 rounded font-semibold uppercase">Add Question</button>
                        {/if}
                    </div>
                { /if }
            { /each }
        </div>
       

    { :else }
        <div class="pl-6 text-gray-400 w-full flex py-8">No questions added yet</div>
    {/if}
        
    
    <div class="mt-8 pt-5 grid grid-cols-8 w-full min-h-[7rem] max-h-[20rem] gap-1 text-[0.6rem] overflow-y-auto border-t border-gray-300">
        { #each questions as { title }, index }
            <button on:click={ () => changeQuestion(index) } class:bg-green-500={ questionIndex === index } class="flex items-center bg-dark justify-center rounded text-white h-10 w-10 font-extrabold">{ index + 1 }</button>
        {/each}
    </div>
</div>