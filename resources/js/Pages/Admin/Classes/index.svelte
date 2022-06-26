<script>
    import Layout from '../../../Shared/Layout.svelte';
    import Table from '../../../Shared/Table.svelte';
    import Icon from '../../../Shared/Icon.svelte';
    import Input from '../../../Shared/Input.svelte';
    import Modal from '../../../Shared/Modal.svelte';
    import Illustrations from '../../../Shared/Illustrations.svelte';
    import Pagination from '../../../Shared/Pagination.svelte';
    import { page, useRemember  } from '@inertiajs/inertia-svelte'
    import { Inertia } from '@inertiajs/inertia';

    $: errors = $page.props.errors ;
    $: exams =  $page.props.exams ;
    $: grades = $page.props.grades.data ;
    $: links = $page.props.grades.links ;

    $: assignedExams = [];
    $: modalDisabledButton = className ? false : true; 
    let examId;
    let modal = false;
    let unassignModal = false;
    let className;
    let classId;
    let viewClassName = "";
    let edit = false;

    const showModal = () => {
        if(edit) edit = false;
        className = '';
        classId = '';
        modal = ! modal;
        
    }

    const showUnassignModal = (examID) => {
        examId = examID;
        unassignModal = true
    }

    const closeUnassignModal = () => {
        unassignModal = false;
    }
    
    const createClass = () => Inertia.visit('create/class', { 
        method: 'POST', 
        data: { className, classId }, 
        preserveState: false, 
        onBefore: visit => className = '', 
        onSuccess: visit => { modal = false;  edit = false; } 
    });
    
    const viewClass = (name, assignedExam, id) => {
        viewClassName = name;
        assignedExams = assignedExam;
        classId = id;
    }

    const editClass = (name, id) => {
        className = name;
        classId = id;
        edit = true
        modal = true;
    }

    const assignExam = () => {
       
        Inertia.visit('/class/assign-exam', { 
            method: 'POST', 
            data: { classId, examId },  
            onSuccess: visit =>  assignedExams = assignedExams.filter((value) => examId === value.id).length < 1 ? [...assignedExams, exams.filter((value) => examId === value.id)[0] ] : assignedExams,
            preserveState: true,
            preserveScroll: true
        });
    }

    const unassignExam = () => {
       
       Inertia.visit('/class/unassign-exam', { 
           method: 'POST', 
           data: { classId, examId },  
           onSuccess: visit =>{ 
               assignedExams =  assignedExams.filter((value) => examId !== value.id ); 
               unassignModal = false;
            },
           preserveState: true,
           preserveScroll: true
       });
    }

    $: disabled = viewClassName && assignedExams.length > 0 ? false : true;
</script>

<Layout>

    <div class="flex flex-col pb-10">
        <div class="flex flex-row items-center justify-between">
            <h4 class="font-bold text-[#20304C] text-2xl">Classes</h4>
            <button on:click={ showModal } class="bg-green-600 text-white px-5 py-3 rounded hover:bg-green-700 transition uppercase text-xs font-semibold">New Class</button>
        </div>
        <div class="flex w-full h-full">
            <div class="flex flex-col w-[40rem]">
                <div class="mt-8 flex items-center space-x-4 text-xs text-[#20304C]">
                    <div class="flex items-center shadow-sm rounded">
                        <span class="bg-white px-4 py-3 rounded-l">Show</span>
                        <select name="" id="" class="px-2 py-3 rounded focus:outline-none">
                            <option value="">10</option>
                            <option value="">20</option>
                        </select>
                        <span class="bg-white px-4 py-3 rounded-r">Entries</span>
                    </div>
                    <button class="group flex flex-row w-full space-x-2 items-center bg-white rounded px-3 shadow-sm focus:border focus:border-gray-400">
                        <Icon name="search" styling="h-4 w-4 stroke-current text-gray-400" />
                        <input class="focus:outline-none px-2 py-3" type="text" name="" id="" placeholder="Search Records">
                    </button>
                </div>

                <Table styling="min-w-60">
                    <div class="flex w-full" slot="thead">
                        <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                        <li class="pl-4 w-[10%]">S/N</li>
                        <li class="pl-4 w-[35%]">Class Name</li>
                        <li class="pl-4 w-[10%]">Exams</li>
                        <li class="pl-8 w-[20%]">Actions</li>
                    </div>
                    { #each grades as  { className, id, exams }, index ({id}) }
                        <ul class="w-full h-full flex flex-row items-center text-xs text-gray-500 py-6 bg-white shadow-lg rounded">
                            <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                            <li class="pl-4 w-[10%]">{ $page.props.grades.from + index  }</li>
                            <li class="pl-4 w-[35%]">{ className }</li>
                            <li class="pl-4 w-[10%]">{ exams.length }</li>
                            <li class="pl-8 w-[20%] flex flex-row space-x-3 items-center">
                                <button class="bg-yellow-100 flex items-center justify-center rounded h-7 w-9" on:click={ () => viewClass(className, exams, id) }><Icon name="view" styling="h-4 w-4 stroke-current text-yellow-500" /></button>
                                <button class="bg-blue-100 flex items-center justify-center rounded h-7 w-9" on:click={ () => editClass(className, id) }><Icon name="edit" styling="h-4 w-4 stroke-current text-blue-500" /></button>
                                <button class="bg-red-100 flex items-center justify-center rounded h-7 w-9"><Icon name="delete" styling="h-4 w-4 stroke-current text-red-500" /></button>
                            </li>
                        </ul>   
                    { /each }
                </Table>
                <Pagination { links } />
              
            </div>

            <div class="fixed right-9 mt-7 flex flex-col bg-white rounded-lg w-[22rem] h-[27.3rem] shadow-2xl overflow-y-auto">
                <div class="flex flex-col p-6">
                    <span class="font-bold text-dark pb-5 border-b border-gray-200">Class Details</span>
                    { #if viewClassName && assignedExams }
                        <div class="mt-5 text-xs text-gray-500 font-semibold w-full space-y-5">
                            <div class="flex flex-row items-center space-x-2">
                                <span>Class / Department:</span>
                                <span class="font-bold text-blue-500">{ viewClassName }</span>
                            </div>
                            <div>
                                <Input bind:value={ examId } type="select" style="w-full" name="exams" id="exams" showLabel="true" label="Available Exams">
                                    <option value="">Select Exam</option>
                                    { #each exams as { title, id }, index }
                                        <option value={ id }>{ title }</option>
                                    {/each}
                                </Input >
                                <button on:click={ assignExam } class="mt-2 bg-blue-500 text-white px-3 py-2 rounded disabled:bg-gray-200 disabled:cursor-not-allowed">Assign Exam</button>
                            </div>
                            
                            <div class="mt-3 flex flex-col">
                                <span class="font-bold">Assigned Exams</span>
                                <div class="mt-2 space-y-3">
                                    { #if assignedExams.length > 0 }
                                        { #each assignedExams as { title , id }, index }
                                            <div class="flex flex-row justify-between items-center bg-gray-100 rounded-lg p-3">
                                                <span class="font-normal">{ title }</span>
                                                <button on:click={ () => showUnassignModal(id) } class="flex items-center justify-center bg-red-500 h-4 w-4 rounded"><Icon on:click name="cross" styling="stroke-current text-white h-3 w-3 cursor-pointer" /></button>
                                            </div>
                                        {/each}
                                    { :else }
                                        <span class="font-normal">No exam has been assigned</span>
                                    { /if }
                                </div>
                            </div>
                        </div>
                    { :else }
                        <div class="flex flex-col ml-8 mt-10 h-56 w-56 items-center justify-center overflow-hidden">
                            <Illustrations name="no-data" />
                            <span class="text-gray-400 text-sm mt-5">Please select a class</span>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
       
   </div>
</Layout>

{ #if modal }
    <Modal title="{ edit ? "Edit Class Name" : "Create New Class"}" on:click={ showModal } actionLabel="{ edit ? "Update" : "Create"}" on:modal-action={ createClass }  disabled={ modalDisabledButton }>
        <Input { errors } bind:value={ className } showLabel="true" type="text" label="Enter Class Name"  placeholder="Enter class name" id="className" name="className" style="w-96" />
    </Modal>
{/if}

{ #if unassignModal }
    <Modal title="Unassign Exam"  actionLabel="Unassign" on:click={ closeUnassignModal } on:modal-action={ unassignExam } >
        <span>Are you sure you want unassigned this exam ?</span>
    </Modal>
{/if}