<header
  class="fixed left-0 pt-8 z-[1000000000] duration-500  transition-all w-full bg-transparent"
  id="mainnavigationBar"
>
  <nav class="container flex  items-center ">
    <div class="nav-logo xl:min-w-[266px]">
      <a href="{{route('home')}}">
        <img
          src="{{asset('assets/images/logo.svg')}}"
          alt="logo"
          class="dark:hidden"
        />
        <img
          src="{{asset('assets/images/logo-light.svg')}}"
          alt="logo dark version"
          class="hidden dark:inline-block"
        />
      </a>
    </div>
    <ul
      class="nav-list hidden lg:flex mx-auto bg-white dark:bg-dark-200 p-2.5 shadow-nav rounded-large [&>*:not(:last-child)]:me-1"
    >
      <li>
        <a
          href="{{route('home')}}"
          class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
        dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
        >
          {{__('index.home')}}
        </a>
      </li>
      <li>
        <a
          href="{{route('about-us')}}"
          class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
        dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
        >
        {{__('index.about')}}
        </a>
      </li>
      <li>
        <a
            href="{{route('services')}}"
            class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
        dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
        >
        {{__('index.services')}}
      </a>
      </li>
      <li>
        <a
          href="{{route('blogs')}}"
          class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
        dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
        >
        {{__('index.blogs')}}
        </a>
      </li>
      <li>
        <a
          href="{{route('contact-us')}}"
          class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
        dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors  "
        >
        {{__('index.contact-us')}}
        </a>
      </li>
    </ul>

    <ul class="flex items-center max-lg:ml-auto  [&>*:not(:last-child)]:me-2.5">
        <li class="">
            <button
              class="bg-white dark:bg-dark-200 p-2.5 rounded-full hidden"
              id="open-btn"
            >
            </button>
        </li>
      <li class="relative group languages">
        <a href="javascript:void(0)" class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
          dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors ">
          @if (app()->getLocale()=='tr')
            <img src="{{asset('admin-assets/img/1x1/tr.svg')}}" class="w-10" alt="flag"> Turkish
          @else
            <img src="{{asset('admin-assets/img/1x1/us.svg')}}" class="w-10" alt="flag"> English
          @endif
            <i class="fa-solid fa-angle-down text-paragraph dark:text-white ml-1 group-hover:rotate-180 duration-500 mt-1"></i>
        </a>
        <ul class="absolute min-w-[250px] left-0 top-12  p-5   opacity-0 scale-y-0 origin-top duration-500 group-hover:scale-y-100 bg-white dark:bg-dark-200  group-hover:opacity-100 rounded-md [&amp;>*:not(:last-child)]:border-b [&amp;>*:not(:last-child)]:border-dashed [&amp;>*:not(:last-child)]:border-borderColour dark:[&amp;>*:not(:last-child)]:border-borderColour-dark [&amp;>*:not(:first-child)]:mt-2.5 z-10">
          <li class="relative overflow-hidden text-base capitalize text-paragraph pb-2.5 before:absolute before:bottom-0 before:left-0 before:h-[2px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100">
            <a href="{{url('language/en')}}" class="flex">
                <img src="{{asset('admin-assets/img/1x1/us.svg')}}" class="w-10" alt="flag"> English
            </a>
          </li>
          <li class="relative overflow-hidden text-base capitalize text-paragraph pb-2.5 before:absolute before:bottom-0 before:left-0 before:h-[2px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100">
            <a href="{{url('language/tr')}}" class="flex">
                <img src="{{asset('admin-assets/img/1x1/tr.svg')}}" class="w-10" alt="flag"> Turkish
            </a>
          </li>
        </ul>
      </li>
      <li class="max-lg:hidden">
        <a
          href="{{route('request-demo')}}"
          class="btn btn-navbar btn-sm"
        >
          {{__('index.register-now')}}
        </a>
      </li>
      <li class="max-lg:inline-block lg:hidden ">
        <button class="outline-none mobile-menu-button w-10 h-10 rounded-full bg-white dark:bg-dark-200 relative ">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="14"
            viewBox="0 0 22 14"
            fill="none"
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
          >
            <path
              d="M0 1C0 0.447715 0.447715 0 1 0H21C21.5523 0 22 0.447715 22 1C22 1.55228 21.5523 2 21 2H1C0.447716 2 0 1.55228 0 1Z"
              fill=""
              class="fill-paragraph dark:fill-white"
            />
            <path
              d="M8 7C8 6.44772 8.44772 6 9 6H21C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H9C8.44772 8 8 7.55228 8 7Z"
              fill=""
              class="fill-paragraph dark:fill-white"
            />
            <path
              d="M4 13C4 12.4477 4.44772 12 5 12H21C21.5523 12 22 12.4477 22 13C22 13.5523 21.5523 14 21 14H5C4.44772 14 4 13.5523 4 13Z"
              fill=""
              class="fill-paragraph dark:fill-white"
            />
          </svg>
        </button>
      </li>
    </ul>
    <div class="mobile-menu max-lg:overflow-y-auto">
      <button
        class=" outline-none navbar-toggle-close  w-10 h-10 rounded-full bg-white dark:bg-dark-200 absolute right-6 top-5 "
      >
        <i class="fa-solid fa-times"></i>
      </button>
      <ul class="nav-list flex flex-col gap-5">

        <li>
          <a
            href="{{route('home')}}"
            class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
            dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
          >
            {{__('index.home')}}
          </a>
        </li>
        <li>
            <a
              href="{{route('about-us')}}"
              class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
              dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors "
            >
              {{__('index.about')}}
            </a>
          </li>

        <li>
          <a
            href="{{route('services')}}"
            class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
            dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors  "
          >
            {{__('index.services')}}
          </a>
        </li>

        <li>
            <a
              href="{{route('blogs')}}"
              class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
              dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors  "
            >
              {{__('index.blogs')}}
            </a>
          </li>

        <li>
            <a
              href="{{route('contact-us')}}"
              class="font-Inter flex items-center text-base font-medium leading-8 text-paragraph dark:text-white py-[5px] px-5 lg:px-4 xl:px-5 border rounded-large border-transparent hover:bg-white hover:border-borderColour dark:hover:bg-dark-200
              dark:hover:border-borderColour/10 duration-500 hover:duration-500 transition-colors  "
            >
              {{__('index.contact-us')}}
            </a>
          </li>
        <li>
          <a
            href="{{route('request-demo')}}"
            class="btn btn-navbar btn-sm"
          >
            {{__('index.register-now')}}
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>
