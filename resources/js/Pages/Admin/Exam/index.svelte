<script>
    import { page, inertia, Link } from '@inertiajs/inertia-svelte';
    import { Inertia  } from '@inertiajs/inertia';
    import { fly } from 'svelte/transition';
	import { quintOut } from 'svelte/easing';
    import Layout from '../../../Shared/Layout.svelte';
    import Table from '../../../Shared/Table.svelte';
    import Pagination from '../../../Shared/Pagination.svelte';
    import Icon from '../../../Shared/Icon.svelte';
    import CreateExamModal from '../../../Shared/CreateExamModal.svelte';
    import Modal from '../../../Shared/Modal.svelte';
    import Toggle from '../../../Shared/Toggle.svelte';

    let createExamModal = false;
    let modal = false;
    let edit = false;
    let rightSideBar = false;
    let title;
    let course;
    let instructions;
    let duration;
    let grade;
    let examId;
    let assignedClasses = [];
    let assignedClassesIndex;
    let publishStatus
    
    $: errors = $page.props.errors;
    $: exams = $page.props.exams.data;
    $: links = $page.props.exams.links;


    const showCreateExamModal = () => {

        reset();
        createExamModal = ! createExamModal;
    }

    const editCreateExamModal = (eExamId, eTitle, eInstructions, eDuration, eGrades, eCourse) => {
        
        reset();

        examId = eExamId;
        title = eTitle;
        instructions = eInstructions;
        duration = eDuration;
        course = eCourse;
        
        eGrades.forEach(eGrade => assignedClasses.push(eGrade.id))
        assignedClasses = assignedClasses

        edit = true;
        createExamModal = true;

    }

    const handlePublish = (id, status) => {

        examId = id;
        publishStatus = status;
        modal = true;
    }

    const publishExam = () => Inertia.visit('/publish/exam', { 
        method: 'POST',  
        data: { examId }, 
        onSuccess: visit =>  reset(), 
        preserveScroll: true,
        preserveState: true,
    })

    const showRightSideBar = (id, Title, grades) => {

        reset();

        examId = id;
        title = Title;
        assignedClasses = grades;

        rightSideBar = true;

    }

    const reset = () => {

        edit = false
        rightSideBar = false;
        modal = false;
        publishStatus = ''
        errors = {}
        title = '';
        instructions = '';
        duration = '';
        course = '';
        examId = '';
        assignedClasses = [];
        assignedClassesIndex = '';

    }

</script>

<Layout>
    <div class="pb-10">
        <div class="flex flex-row items-center justify-between">
            <h4 class="font-bold text-[#20304C] text-2xl">Exams</h4>
            <button on:click={ showCreateExamModal } class="bg-green-500 text-white px-4 py-3 rounded hover:bg-green-700 transition uppercase text-xs font-semibold">New Exam</button>
        </div>
        <div class="mt-8 flex items-center space-x-4 text-xs text-[#20304C]">
            <div class="flex items-center shadow-sm rounded">
                <span class="bg-white px-4 py-3 rounded-l">Show</span>
                <select name="" id="" class="px-2 py-3 rounded focus:outline-none">
                    <option value="">10</option>
                </select>
                <span class="bg-white px-4 py-3 rounded-r">Entries</span>
            </div>
            <button class="group flex flex-row space-x-2 items-center bg-white rounded px-3 shadow-sm focus:border focus:border-gray-400">
                <Icon name="search" styling="h-4 w-4 stroke-current text-gray-400" />
                <input class="focus:outline-none px-2 py-3" type="text" name="" id="" placeholder="Search Records">
            </button>
        </div>
    
        <Table>
            <div class="flex w-full items-center" slot="thead">
                <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                <li class="pl-4 w-[15%]">Exam Code</li>
                <li class="pl-4 w-[25%]">Title</li>
                <li class="pl-4 w-[15%]">Course</li>
                <li class="pl-4 w-[10%]">Duration</li>
                <li class="pl-4 w-[10%]">Status</li>
                <li class="pl-8 w-[25%]">Actions</li>
            </div>
                
            { #each exams as  { id, exam_code, title, status, instructions, duration, course, grades }, index }
                <ul class="w-full h-full flex flex-row items-center text-xs text-gray-500 py-6 bg-white shadow-lg rounded-lg">
                    <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                    <li class="pl-4 w-[15%]"><span class="font-medium text-blue-500 bg-blue-100 rounded px-2 py-1 border border-blue-200">{ exam_code }</span></li>
                    <li class="pl-4 w-[25%]">{ title }</li>
                    <li class="pl-4 w-[15%]">{ course }</li>
                    <li class="pl-4 w-[10%]">{ duration } Minutes</li>
                    <button on:click={ () => handlePublish(id, parseInt(status)) } class="pl-4 w-[10%]"><span class:red-button={ status == 0 } class="px-2 py-1 bg-green-100 text-green-500 border border-green-200 rounded text-[0.7rem]">{ status == 1 ? 'Published' : 'Unpublished'}</span></button>
                    <li class="pl-8 w-[25%] flex flex-row space-x-3 items-center">
                        <button on:click={ () => showRightSideBar(id, title, grades) }><Icon name="people" styling="h-5 w-5 stroke-current" /></button>
                        <button on:click={ () => editCreateExamModal(id, title, instructions, duration, grades, course) }><Icon name="edit" styling="h-5 w-5 stroke-current" /></button>
                        <Icon name="download" styling="h-5 w-5" />
                        <Icon name="print" styling="h-5 w-5" />
                        <Icon name="delete" styling="h-5 w-5 stroke-current text-red-500" />
                    </li>
                </ul>   
            { /each }
        </Table>
        <Pagination { links } />
    </div>
    
</Layout>

{ #if createExamModal }
    <CreateExamModal 
        on:click={ showCreateExamModal } 
        {title} 
        { course } 
        { instructions } 
        { duration } 
        { grade } 
        { assignedClasses } 
        { examId }
        { errors } 
        { edit } 
        buttonText={ edit ? 'Update & Go To Questions' : 'Save & Proceed'} 
        on:close-modal={ showCreateExamModal } 
    />
{/if}

{ #if modal }
    <Modal title={ publishStatus === 0 ? 'Publish Exam' : 'Unpublish Exam'} actionLabel={ publishStatus === 0 ? 'Publish' : 'Unpublish'} on:modal-action={ publishExam } on:click={ reset }>
        <span>{ publishStatus === 0 ? 'Are you sure you want to publish this exam?' : 'Are you sure you want to unpublish this exam?' }</span>
    </Modal>
{ /if }

{ #if rightSideBar }
    <div transition:fly="{{ delay: 300, duration: 600, x: 800, easing: quintOut, opacity: 1 }}" class="fixed isolate right-0 top-0 bottom-0 min-h-screen w-[30rem] p-6 bg-gray-50 shadow-2xl">
        <div class="mt-16 flex flex-col">
            <div class="py-4 border-b border-gray-300 flex items-center justify-between">
                <span class="font-bold text-sm text-dark">Exam: { title  }</span>
                <button on:click={ reset }> <Icon name="cross" styling="h-6 w-6 stroke-current text-gray-700" /></button>
            </div>
            <span class="mt-8 font-semibold uppercase text-[0.7rem] text-gray-600">Assigned Classes</span>
            <ul class="mt-5 flex flex-col text-xs space-y-3">
                { #each assignedClasses as { id, className }, index }
                    <li class="px-3 py-2 flex items-center justify-between bg-yellow-100 rounded-md z-50">
                        <span class="text-yellow-700 font-medium">{ className }</span>
                        <button on:click={ () => assignedClassesIndex === index ? assignedClassesIndex = '' : assignedClassesIndex = index } class="flex items-center justify-center bg-dark h-5 w-5 rounded">
                            { #if assignedClassesIndex === index }
                                <Icon name="up-arrow" styling="h-4 w-4 stroke-current text-white" />
                            { :else }
                                <Icon name="down-arrow" styling="h-4 w-4 stroke-current text-white" />
                            { /if }
                        </button>
                    </li>
                        <div class="{ assignedClassesIndex === index ? 'block' : 'hidden' } -mt-2 space-y-4 p-4 w-full h-full bg-yellow-50 rounded-md text-gray-400">
                            <div class="flex items-center justify-between">
                                <span>Active</span>
                                <Toggle id={ index } />
                            </div>
                            <div class="flex items-center space-x-1 justify-between">
                                <span class="mr-3">Schedule:</span>
                                <input class="border border-gray-300 px-2 py-1 rounded" type="date" >
                                <div class="flex space-x-1">
                                    <select class="border border-gray-300 px-2 py-1 rounded" name="" id="">
                                        <option value="">00</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                    </select>
                                    <span class="flex items-center font-bold">:</span>
                                    <select class="border border-gray-300 px-2 py-1 rounded" name="" id="">
                                        <option value="">01</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                        <option value="">01</option>
                                    </select>
                                </div>
                            </div>
                            <button class="mt-4 px-2 py-1 bg-green-500 text-white rounded">Update</button>
                        </div>
                {/each}
                
            </ul>
        </div>
    </div>
{/if}


<style>
    .red-button{
        background-color: rgb(254, 226, 226);
        border: 1px solid rgb(254, 202, 202);
        color: rgb(252, 165, 165);
    }
</style>
