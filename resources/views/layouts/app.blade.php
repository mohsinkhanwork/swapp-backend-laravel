<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <title>SkillSwap</title>

  <!--Meta tags-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SkillSwap">
    <meta name="twitter:description" content="Formlarınızı Back-End oluşturmadan hızlıca yönetin.">
    <meta name="twitter:image" content="https://pestform.com/images/logo-PestForm-og.png">
    <meta property="og:title" content="SkillSwap">
    <meta property="og:description" content="Formlarınızı Back-End Oluşturmadan Hızlıca Yönetin">
    <meta property="og:image" content="https://pestform.com/images/logo-PestForm-og.png">
    <meta name="description" content="Çevrimiçi form oluşturucumuzla profesyonel web formlarını zahmetsizce oluşturun. Web siteniz için kolayca özel e-posta formları ve iletişim formları tasarlayın. Bugün form oluşturmaya başlayın!">
    <meta name="publisher" content="SkillSwap">
    <meta name="copyright" content="SkillSwap">
    <meta name="audience" content="Everyone">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="noindex, Nofollow, Noimageindex">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Stylesheets -->

  <link href="{{asset('assets/vendor/fontawesome/all.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/vendor/fancybox/fancybox.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/vendor/swiper/swiper.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!--Favicon-->
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/images/favicons/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/images/favicons/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/favicons/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/images/favicons/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/favicons/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/images/favicons/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/images/favicons/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/images/favicons/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicons/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/images/favicons/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicons/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/images/favicons/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicons/favicon-16x16.png')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicons/favicon.ico')}}" type="image/x-icon" />
  <link rel="icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon" />

  @stack('styles')
</head>

<body class="relative overflow-x-hidden  text-base antialiased bg-white dark:bg-dark-300 font-Inter">
  <div class="toggle-button fixed right-5 max-lg:bottom-2.5 lg:top-1/3 z-[10000000000]">
    <button
      id="theme-toggle"
      type="button"
      class="text-paragraph dark:text-white focus:outline-none focus:ring-0 focus:ring-gray-200 w-10 h-10 border rounded-md border-paragraph/25 dark:border-borderColour-dark flex justify-center items-center"
    >
      <svg
        id="theme-toggle-dark-icon"
        class="hidden w-5 h-5 ml-1 -mt-[1px]"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
      </svg>
      <svg
        id="theme-toggle-light-icon"
        class="hidden w-5 h-5"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
          fill-rule="evenodd"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
  </div>


    {{-- header --}}
    @include('partials.header')
    {{-- header --}}


    @yield('content')

    {{-- footer --}}
    @include('partials.footer')
    {{-- footer --}}

<!---Modal -->
<div
  aria-hidden="false"
  class="fixed z-[99999999990] hidden inset-0 top-0 items-start justify-center  bg-metal-900 bg-dark-200/25"
  onclick="javascript.void(0)"
  id="modal"
  role="dialog"
>
  <div class="relative w-full p-4 h-auto animate-keep-bounce max-w-xl">
    <div class="relative bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
      <div class=" border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
        <div
          class="flex items-center justify-between bg border-b border-dashed border-b-borderColour dark:border-borderColour-dark pb-5"
        >
          <h3 class="text-paragraph dark:text-white">Search</h3>
          <button
            class="text-paragraph dark:text-white"
            id="ok-btn"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              viewBox="0 0 256 256"
            >
              <rect
                width="256"
                height="256"
                fill="none"
              ></rect>
              <circle
                cx="128"
                cy="128"
                r="96"
                fill="none"
                stroke="currentColor"
                stroke-miterlimit="10"
                stroke-width="16"
              ></circle>
              <line
                x1="160"
                y1="96"
                x2="96"
                y2="160"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="16"
              ></line>
              <line
                x1="160"
                y1="160"
                x2="96"
                y2="96"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="16"
              ></line>
            </svg>
          </button>
        </div>
        <form class="mt-5">
          <div>
            <div class="flex">
              <div class="relative w-full">
                <input
                  class="block w-full focus:outline-none focus:ring-0 text-paragraph border-borderColour py-2.5 px-5  border border- rounded-medium bg-transparent placeholder:text-metal-400 placeholder:text-paragraph dark:placeholder:text-white outline-none focus:border-primary duration-300 transition-all"
                  id="#id-10"
                  placeholder="Search Component"
                  type="text"
                  value=""
                />
              </div>
            </div>
          </div>
        </form>
        <p class="pt-5 font-medium mb-12 hidden"><span>No recent searches</span></p>
        <div class="pt-5">
          <h3 class="mb-1">Search Result</h3>
          <ul
            class="[&>*:not(:last-child)]:border-dashed [&>*:not(:last-child)]:border-gray-100  dark:[&>*:not(:last-child)]:border-borderColour-dark  [&>*:not(:last-child)]:border-b"
          >
            <li class="group ">
              <a
                class="  flex items-center justify-between py-5 font-medium"
                href="services-single.html"
              >
                Investment Banks
                <i class="fa-solid fa-angle-right"></i>
              </a>
            </li>
            <li class="group">
              <a
                href="services-single.html"
                class="  flex items-center justify-between py-5 font-medium"
              >
                Financial Analysis <i class="fa-solid fa-angle-right"></i>
              </a>
            </li>
            <li class="group">
              <a
                href="services-single.html"
                class="  flex items-center justify-between py-5 font-medium"
              >
                Sales & Trading <i class="fa-solid fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Mark up for Script Section-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('assets/vendor/fancybox/fancybox.js')}}"></script>
<script src="{{asset('assets/vendor/gsap/gsap.min.js')}}"></script>
<script src="{{asset('assets/vendor/gsap/motionpath.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (Session::has('success'))
<script>
    toastr.success("{{Session::get('success')}}")
</script>
@endif
@if (Session::has('error'))
<script>
    toastr.error("{{Session::get('error')}}")
</script>
@endif
@stack('scripts')

</body>

</html>
