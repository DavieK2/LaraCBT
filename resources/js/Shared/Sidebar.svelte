<script>    
    import Icon from '../Shared/Icon.svelte';
    import { Link } from '@inertiajs/inertia-svelte';
</script>

<aside class="fixed min-h-screen w-60 bg-[#0C1A32] z-50">
    <div class="w-full h-16 bg-[#0C1A32]">

    </div>
    <div class="pl-8 text-gray-100 py-5 border-t border-b border-white border-opacity-10">
        <p class="uppercase text-[0.6rem] text-gray-300 tracking-wider">Administrator</p>
    </div>
    <div class="py-12 px-4">
        <div class="pl-4 uppercase text-[0.7rem] text-blue-300 py-2 tracking-widest font-bold">Main</div>
        <div>
            <ul class="text-blue-200 text-sm font-normal">
                <li class="flex flex-row items-center space-x-3 pl-4 py-5 border-b border-white border-opacity-10 hover:text-blue-100 hover:translate-x-1 transition transform">
                    <Icon name="home" styling="h-5 w-5" />
                    <Link href="/dashboard">Dashboard</Link>
                </li>
                <li class="flex flex-row items-center space-x-3 pl-4 py-5 border-b border-white border-opacity-10 hover:text-blue-100 hover:translate-x-1 transition transform">
                    <Icon name="exam" styling="h-5 w-5" />
                    <Link href="/exams">Online Exams</Link>
                </li>
                <li class="flex flex-row items-center space-x-3 pl-4 py-5 border-b border-white border-opacity-10 hover:text-blue-100 hover:translate-x-1 transition transform">
                    <Icon name="result" styling="h-5 w-5" />
                    <Link href="/results">Exam Results</Link>
                </li>
                <li class="flex flex-row items-center space-x-3 pl-4 py-5 border-b border-white border-opacity-10 hover:text-blue-100 hover:translate-x-1 transition transform">
                    <Icon name="people" styling="h-5 w-5" />
                    <Link href="/classes">Classes</Link>
                </li>
                <li class="flex flex-row items-center space-x-3 pl-4 py-5 border-b border-white border-opacity-10 hover:text-blue-100 hover:translate-x-1 transition transform">
                    <Icon name="book" styling="h-5 w-5" />
                    <Link href="/courses">Courses</Link>
                </li>
            </ul>
        </div>
    </div>
</aside>