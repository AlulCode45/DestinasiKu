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
                <button class="bg-primary-home text-white font-semibold px-6 py-2 rounded-full">Sign in</button>
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

    <div class="container mx-auto">

        <main class="mb-20">
            <div class="grid grid-cols-3 gap-7 mt-5">
                @foreach ($destinations as $destination)
                    <div class="card">
                        <div class="card-header">
                            @if (!empty($destination->images[0]))
                                <img src="{{ asset('storage/' . $destination->images[0]['image']) }}"
                                    alt="Default image" class="w-full rounded-xl h-[250px]">
                            @else
                                <img src="{{ asset('assets/default-image.webp') }}" alt="Default image"
                                    class="rounded z-1 h-[250px] w-full">
                            @endif

                            <h3 class="font-semibold text-md w-full line-clamp-2 my-3">{{ $destination->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="flex justify-between w-full">
                                <div class="rating flex text-gray-500 items-center gap-2">
                                    <i data-feather="star" class="w-4"></i>
                                    <span>4.5 Rating</span>
                                </div>
                                <div class="rating flex text-gray-500 items-center gap-2">
                                    <i data-feather="send" class="w-4"></i>
                                    <span>{{ $destination->province->name }}</span>
                                </div>
                                <div class="rating flex text-gray-500 items-center gap-2">
                                    <i data-feather="calendar" class="w-4"></i>
                                    <span>Jul 2 - 5 </span>
                                </div>
                            </div>

                            <div class="price-action flex justify-between mt-4">
                                <div class="price">
                                    <span class="text-gray-600">
                                        <b class="text-black text-3xl font-semibold">${{ $destination->price }}</b> /
                                        Night
                                    </span>
                                    <small class="block text-gray-600">Including taxes and fees</small>
                                </div>
                                <button class="bg-black py-3 rounded-full px-5 text-white">View Rooms</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
                            <input type="text" placeholder="Search destions" class="px-12 rounded-full py-3 border">
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
        feather.replace();
    </script>
</body>

</html>
