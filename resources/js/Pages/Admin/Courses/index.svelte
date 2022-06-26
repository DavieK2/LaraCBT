<script>
    import Layout from '../../../Shared/Layout.svelte';
    import Table from '../../../Shared/Table.svelte';
    import Icon from '../../../Shared/Icon.svelte';
    import Input from '../../../Shared/Input.svelte';
    import Modal from '../../../Shared/Modal.svelte';
    import Pagination from '../../../Shared/Pagination.svelte';
    import { page } from '@inertiajs/inertia-svelte'
    import { Inertia } from '@inertiajs/inertia';

    $: errors = $page.props.errors;
    $: courses = $page.props.courses.data;
    $: links = $page.props.links;

    let modal = false;
    let name;

    const showModal = () => modal = ! modal

    const createCourse = () => Inertia.post('create/course', { name }, { preserveState: false });
</script>

<Layout>
    <div class="pb-10">
        <div class="flex flex-row items-center justify-between">
            <h4 class="font-bold text-[#20304C] text-2xl">Courses</h4>
            <button on:click={ showModal } class="bg-green-600 text-white px-5 py-3 rounded hover:bg-green-700 transition uppercase text-xs font-semibold">New Course</button>
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
            <div class="flex w-full" slot="thead">
                <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                <li class="pl-4 w-[5%]">S/N</li>
                <li class="pl-4 w-[25%]">Title</li>
                <li class="pl-8 w-[25%]">Actions</li>
            </div>
                
            { #each courses as  { name }, index }
                <ul class="w-full h-full flex flex-row items-center text-xs text-gray-500 py-6 bg-white shadow-lg rounded">
                    <li class="pl-4 w-[5%]"><input type="checkbox"></li>
                    <li class="pl-4 w-[5%]">{ ++index  }</li>
                    <li class="pl-4 w-[25%]">{ name }</li>
                    <li class="pl-8 w-[25%] flex flex-row space-x-3 items-center">
                        <Icon name="edit" styling="h-5 w-5 stroke-current" />
                        <Icon name="delete" styling="h-5 w-5 stroke-current text-red-500" />
                    </li>
                </ul>   
            { /each }
        </Table>
        <Pagination { links } />
   </div>
</Layout>

{ #if modal }
    <Modal title="Create New Course" on:click={ showModal } actionLabel="Create" on:modal-action={ createCourse } >
        <Input { errors } bind:value={ name } showLabel="true" type="text" label="Enter Course Name"  placeholder="Enter course name" id="name" name="name" style="w-96" />
    </Modal>
{/if}