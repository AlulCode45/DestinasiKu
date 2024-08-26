<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>

<body>
    <nav class="shadow py-4 fixed top-0 bg-white w-full z-50">
        <div id="navbar" class="relative flex items-center justify-between container px-5 mx-auto">
            <div id="logo">
                <a href="/">
                    <img src="{{ asset('assets/icon.png') }}" alt="Logo" class="w-52" />
                </a>
            </div>
            <div id="menu-links" class="absolute left-1/2 transform -translate-x-1/2 flex gap-8">
                <a href="/" class="menu-item">Home</a>
                <a href="/destinations" class="menu-item">Destinations</a>
                <a href="/" class="menu-item">About</a>
            </div>
            <div id="auth-menu" class="flex items-center gap-1">
                <a href="/auth/login" class="bg-primary-home text-white font-semibold px-6 py-2 rounded-full">Sign
                    in</a>
                {{-- <button class="font-semibold px-6 py-2">Sign Up</button> --}}
            </div>
        </div>
    </nav>
    <div class="bg-gray-200 text-center py-3 flex justify-center items-center gap-3 mt-16">
        <svg fill="#000000" width="20px" height="20px" viewBox="-2 -4 24 24" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMinYMin" class="jam jam-box">
            <path
                d='M3 0h14a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm10.874 5a4.002 4.002 0 0 1-7.748 0H2V5h16v2h-4.126zm-2.142 0H8.268a2 2 0 0 0 3.464 0z' />
        </svg>
        <p class="font-semibold">Overseas trip? Get the latest information on travel guides</p>
        <button class="bg-white font-semibold px-3 py-1 rounded-full">More Info</button>
    </div>

    <div class="container mx-auto mt-10">
        <main class="mb-20">
            @if (!$destination)
                <p class="text-center mt-10">Dont show data because data not found!</p>
            @endif
            <div class="bg-gray-100 shadow rounded-md">
                <div class="container mx-auto px-4 py-8">
                    <div class="flex flex-wrap -mx-4">
                        <!-- Product Images -->
                        <div class="w-full md:w-1/2 px-4 mb-8">
                            @if (!empty($destination->images[0]))
                                <img src="{{ asset('storage/' . $destination->images[0]['image']) }}"
                                    alt="Default image" class="rounded z-1" alt="Product"
                                    class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
                            @else
                                <img src="{{ asset('assets/default-image.webp') }}" alt="Default image"
                                    class="rounded z-1" alt="Product" class="w-full h-auto rounded-lg shadow-md mb-4"
                                    id="mainImage">
                            @endif
                            <div class="flex gap-4 py-4 justify-center overflow-x-auto">
                                @foreach ($destination->images as $image)
                                    <img src="{{ asset("storage/$image->image") }}" alt="Default image"
                                        onclick="changeImage(this.src)"
                                        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300">
                                @endforeach
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="w-full md:w-1/2 px-4">
                            <h2 class="text-3xl font-bold mb-2">{{ $destination->name }}</h2>
                            <p class="text-gray-600 mb-4">{{ $destination->company->name }}</p>
                            <div class="mb-4">
                                <span class="text-2xl font-bold mr-2">${{ $destination->price }}</span>
                                <span class="text-gray-500 line-through">/night</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-yellow-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-gray-600">4.5 (120 reviews)</span>
                            </div>
                            <p class="text-gray-700 mb-6">{{ $destination->description }}</p>

                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2">Location:</h3>
                                <p class="text-gray-700"><b>Province</b> : {{ $destination->province->name }}</p>
                                <p class="text-gray-700"><b>Regency</b> : {{ $destination->regency->name }}</p>
                                <p class="text-gray-700"><b>District</b> : {{ $destination->district->name }}</p>
                                <p class="text-gray-700"><b>Village</b> : {{ $destination->village->name }}</p>
                            </div>

                            {{-- <div class="flex space-x-4 mb-6">
                                <button
                                    class="bg-primary-home flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-primary-home focus:outline-none focus:ring-2 focus:ring-primary-home focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                    Add to Cart
                                </button>
                                <button
                                    class="bg-gray-200 flex gap-2 items-center  text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                    Wishlist
                                </button>
                            </div> --}}

                            {{-- <div>
                                <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
                                <ul class="list-disc list-inside text-gray-700">
                                    <li>Industry-leading noise cancellation</li>
                                    <li>30-hour battery life</li>
                                    <li>Touch sensor controls</li>
                                    <li>Speak-to-chat technology</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <section class="bg-gray-100 py-8">
                <div class="container mx-auto px-4">
                    <h2 class="text-2xl font-bold mb-4">Customer Testemonial</h2>

                    <div class="space-y-4">
                        @foreach ($testemonial as $testi)
                            <!-- Comment 1 -->
                            <div class="bg-white p-4 rounded-lg shadow">
                                <div class="flex items-center mb-2">
                                    <img src="https://ui-avatars.com/api/?background=random&name={{ $testi->name }}"
                                        alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                                    <div>
                                        <h3 class="font-semibold">{{ $testi->name }}</h3>
                                        <p class="text-sm text-gray-500">
                                            {{ Carbon\Carbon::parse($testi->created_at)->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-700">{{ $testi->content }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Comment Form -->
                    <form class="mt-8 bg-white p-4 rounded-lg shadow" method="POST"
                        action="{{ route('store-testimony', $destination->id) }}">
                        <h3 class="text-lg font-semibold mb-2">Add a Testemonial</h3>
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-gray-700 font-medium mb-2">Comment</label>
                            <textarea id="comment" name="content" rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required></textarea>
                        </div>
                        <button type="submit"
                            class="bg-primary-home text-white px-4 py-2 rounded-md hover:bg-primary-home focus:outline-none focus:ring-2 focus:ring-primary-hbg-primary-home focus:ring-offset-2">
                            Post
                        </button>
                    </form>
                </div>
            </section>
        </main>

    </div>
    <footer>
        <div class="bg-primary-home w-full p-10 relative overflow-hidden h-[170px]">
            <b class="absolute -top-64 text-[430px] text-white transform rotate-12 font-semibold">D</b>
            <div class="flex ms-80 justify-between">
                <div class="promo text-white">
                    <h3 class="font-semibold text-xl">If you can save time and money, why not?</h3>
                    <p>Come on, register and we will send the best promo for you</p>
                </div>
                <div class="form-signup flex">
                    <div class="filter flex gap-4">
                        <div class="search relative">
                            <i data-feather="mail" class="absolute top-1/2 left-5 transform -translate-y-1/2 w-5"></i>
                            <input type="text" placeholder="Search destions"
                                class="px-12 rounded-full py-3 border">
                        </div>
                        <button class="bg-black px-5 py-2 rounded-full text-white">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <div class="grid grid-cols-2 gap-5 items-end justify-between container px-5 mx-auto py-16">
                <div class="about">
                    <img src="{{ asset('assets/logo-white.png') }}" alt="" class="w-72">
                    <p class="text-white text-sm w-3/4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, quos. Id, eos quo voluptate
                        deleniti
                        veritatis quidem minima sequi repellendus, cumque labore iusto ducimus quisquam et in quia optio
                        possimus.
                    </p>
                </div>
                <div class="flex sitemap justify-between text-white">
                    <div class="flex flex-col">
                        <h4 class="font-semibold mb-5">Explore</h4>
                        <ul class="text-sm flex flex-col gap-2">
                            <li>Hotel in Bekasi</li>
                            <li>Hotel in Jakarta</li>
                            <li>Hotel in Surabaya</li>
                        </ul>
                    </div>
                    <div class="flex flex-col">
                        <h4 class="font-semibold mb-5">Company</h4>
                        <ul class="text-sm flex flex-col gap-2">
                            <li>About us</li>
                            <li>Blog</li>
                            <li>Careers</li>
                            <li>Customer</li>
                        </ul>
                    </div>
                    <div class="flex flex-col">
                        <h4 class="font-semibold mb-5">Help</h4>
                        <ul class="text-sm flex flex-col gap-2">
                            <li>Support</li>
                            <li>Faq</li>
                            <li>Contact Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
        feather.replace();
    </script>
</body>

</html>
