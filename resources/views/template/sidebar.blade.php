<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-50 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="index.html">
            <img src="{{ asset('assets/logo-white.png') }}" alt="Logo" />
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: '{{ Request::segment(2) }}' }">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a href="/dashboard" @click="selected = 'dashboard'"
                            :class="{ 'bg-graydark dark:bg-meta-4': selected === 'dashboard' }"
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"><svg
                                class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                    fill="" />
                                <path
                                    d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                    fill="" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <!-- Menu Item Destinations -->
                    <li>
                        <a href="/dashboard/destinations" @click="selected = 'destinations'"
                            :class="{ 'bg-graydark dark:bg-meta-4': selected === 'destinations' }"
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            <svg fill="#fff" width="18px" height="18px" viewBox="0 0 0.54 0.54"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0.27 0.045c0.112 0 0.202 0.09 0.202 0.2 0 0.073 -0.061 0.151 -0.181 0.235L0.27 0.495l-0.013 -0.009C0.132 0.399 0.068 0.32 0.068 0.245 0.068 0.135 0.158 0.045 0.27 0.045m0 0.045c-0.087 0 -0.158 0.07 -0.158 0.156 0 0.054 0.052 0.12 0.158 0.195 0.106 -0.075 0.158 -0.141 0.158 -0.195 0 -0.086 -0.071 -0.156 -0.158 -0.156M0.27 0.135a0.09 0.09 0 1 1 0 0.18 0.09 0.09 0 0 1 0 -0.18m0 0.045a0.045 0.045 0 1 0 0 0.09 0.045 0.045 0 0 0 0 -0.09" />
                            </svg>
                            Destinations
                        </a>
                    </li>
                    <!-- Menu Item Vendor -->
                    <li>
                        <a href="/dashboard/vendor" @click="selected = 'vendor'"
                            :class="{ 'bg-graydark dark:bg-meta-4': selected === 'vendor' }"
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            <svg fill="#fff" width="18px" height="18px" viewBox="0 0 1000 1000"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M925 687q-31-8-52-19-35-18-35-42 0-6-5-10.5t-12-3.5q-29 4-62-31-20-22-37-53-1-3-4-3t-4 3q-17 31-37 53-33 35-62 31-7-1-12 3.5t-5 10.5q1 24-34 42-22 11-52 19-3 0-4 2.5t1 4.5q22 26 35 50 22 41 14 65-2 5 .5 10.5t7.5 7.5q18 8 25 42 5 21 5 47 0 3 2.5 4.5t4.5.5q26-13 50-16 37-6 54 15 4 5 11 5t11-5q17-21 55-15 23 3 49 15 3 2 5 .5t2-4.5q0-26 5-48 8-33 25-41 5-2 7.5-7t.5-10q-8-25 14-65 13-25 35-51 2-2 1-4.5t-3-2.5zm-97 34l-5 7q-33 42-32 95v4q0 4-3 6.5t-7 2.5h-2l-11-3q-50-15-100 0l-11 3h-2q-4 0-7-2.5t-3-6.5v-4q1-53-32-95l-5-7q-3-3-1.5-7.5t6.5-5.5q29-8 54-24t42-40l1-1q3-4 8-4t8 4l1 1q17 24 41.5 40t54.5 24q5 1 6.5 5.5T828 721zM533 885q-1-4-5-6-21-10-30.5-31.5T495 804q4-14-2-27-13-24-31-45-10-12-13.5-28t1-32 17-27.5 30-15.5 34.5-11q4-3 5-8 0-4-3-7l-34-52q-6-8-14-15-2-2-1.5-4t2.5-4q60-28 98-83 39-58 39-124 0-63-31-116t-84-84-115.5-31T277 121t-84 84-31 116q0 66 39 124 38 54 98 83 2 1 2 3.5t-1 4.5q-8 7-14 15-88 131-132 205-18 32-18 52 0 28 34.5 51.5t93.5 37T393 910q72 0 134-15 3-1 4.5-3.5t1.5-6.5z" />
                            </svg>
                            Vendor
                        </a>
                    </li>
                    <!-- Menu Item Testimonials -->
                    <li>
                        <a href="/dashboard/testimonials" @click="selected = 'testimonials'"
                            :class="{ 'bg-graydark dark:bg-meta-4': selected === 'testimonials' }"
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                            <svg width="18px" height="18px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                fill="#fff">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.16 3.5C4.73 5.06 3.55 6.67 3.55 9.36c.16-.05.3-.05.44-.05 1.27 0 2.5.86 2.5 2.41 0 1.61-1.03 2.61-2.5 2.61-1.9 0-2.99-1.52-2.99-4.25 0-3.8 1.75-6.53 5.02-8.42L7.16 3.5zm7 0c-2.43 1.56-3.61 3.17-3.61 5.86.16-.05.3-.05.44-.05 1.27 0 2.5.86 2.5 2.41 0 1.61-1.03 2.61-2.5 2.61-1.89 0-2.98-1.52-2.98-4.25 0-3.8 1.75-6.53 5.02-8.42l1.14 1.84h-.01z" />
                            </svg>
                            Testimonials
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
