@extends('layouts.app')
@section('content')
<section
class="hero bg-gray dark:bg-dark overflow-hidden relative pt-[230px] pb-[140px] max-mb:pb-[70px]"
id="scene"
>
    @include('components.homepage.hero-svg')
<div class="container">
  <div
    class="grid grid-cols-12 items-center relative  z-10 max-lg:gap-y-10"
    data-aos="fade-up"
    data-aos-offset="200"
    data-aos-duration="1000"
    data-aos-once="true"
  >
    <div class="col-span-12 md:col-span-6 ">
      <p class=" mb-8 font-medium uppercase">10k+ {{__('index.verified-users')}}</p>
      <h2 class="mb-12 max-md:mb-8">
        {{__('index.banner-title')}}
      </h2>
      <p class="mb-12 max-md:mb-8 max-w-[590px]">
        {{__('index.banner-description')}}
      </p>
      <form action="{{route('newsletter.subscribe')}}" method="POST">
        @csrf
        <div
          class="grid  grid-cols-12 items-center border rounded-[60px] bg-white dark:bg-dark-200 dark:border-[#31332F] border-borderColour pl-3 sm:pl-5 pe-1 pt-1 pb-1 max-w-[520px] w-full"
        >
          <input
            type="email"
            name="email"
            placeholder="Enter your email"
            required
            class=" col-span-7 xs:col-span-8 bg-transparent outline-none placeholder:text-light dark:placeholder:text-[#A1A49D] text-[#A1A49D] text-light focus:outline-none  leading-[1.75] focus:border-primary duration-300 transition-all "
          />
          <button class="btn col-span-5 xs:col-span-4 max-xs:px-5">{{__('index.get-started')}}</button>
        </div>
      </form>
    </div>
    <div class="col-span-12 md:col-span-6 ">
      <div class="relative w-full min-h-[530px] max-md:min-h-[400px] lg:ml-15">
        <div class="absolute  !left-1/2 !top-1/2 -translate-x-1/2 -translate-y-1/2">
          <img
            src="{{asset('assets/images/hero/hero-circle.png')}}"
            alt="hero Image"
            class="inline-block dark:hidden"
          />
          <img
            src="{{asset('assets/images/hero/hero-circle-dark.png')}}"
            alt="hero Image"
            class="hidden dark:inline-block"
          />
        </div>
        <div
          class="absolute max-lg:w-[220px] max-lg:aspect-video max-lg:!left-0 max-md:!top-5 !top-15 !-left-[40px] lg:!-top-[20px] parallax-effect"
          parallax-value="-1"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/hero/hero-policy.png')}}"
            alt="hero Image"
            class="inline-block dark:hidden"
          />
          <img
            src="{{asset('assets/images/hero/hero-policy-dark.png')}}"
            alt="hero Image"
            class="hidden dark:inline-block"
          />
        </div>
        <div
          class="absolute max-lg:w-28 max-lg:aspect-square max-md:!left-[50px] max-md:!bottom-[70px] !bottom-[150px] !left-[50px] lg:!bottom-0  lg:!left-[45px] xl:!left-[85px] parallax-effect"
          parallax-value="1"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/hero/hero-rating.png')}}"
            alt="hero Image"
            class="inline-block dark:hidden"
          />
          <img
            src="{{asset('assets/images/hero/hero-rating-dark.png')}}"
            alt="hero Image"
            class="hidden dark:inline-block"
          />
        </div>
        <div
          class="absolute max-lg:w-[196px] !-right-5 !-bottom-0 max-md:!-bottom-5 max-md:!-right-5 lg:!not-sr-only-bottom-[45px] lg:right-0 xl:right-[30px] parallax-effect"
          parallax-value="2"
          data-aos="fade-left"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/hero/hero-chart.png')}}"
            alt="hero Image"
            class="inline-block dark:hidden"
          />
          <img
            src="{{asset('assets/images/hero/hero-chart-dark.png')}}"
            alt="hero Image"
            class="hidden dark:inline-block"
          />
        </div>
      </div>
    </div>
  </div>
</div>
</section>



<section class="bg-white dark:bg-dark-300 pt-[140px] pb-[145px]">
<div class="container ">
  <div class="mb-12">
    <p class="section-tagline max-lg:text-center">{{__('index.our-services')}}</p>
    <div class="block max-lg:text-center lg:flex  ">
      <h2 class=" max-lg:mb-5">
        {!!__('index.our-services-title')!!}
      </h2>
      <p class="max-w-[520px] ml-auto">
        {{__('index.our-services-description')}}
      </p>
    </div>
  </div>

  <div class="relative z-10">
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex  max-lg:hidden -z-10">
      <div
        class="lg:w-[330px] lg:h-[330px] xl:w-[442px] xl:h-[442px] blur-[145px] rounded-full bg-primary-200/20 "
      ></div>
      <div
        class="lg:w-[330px] lg:h-[330px] xl:w-[442px] xl:h-[442px] blur-[145px] rounded-full bg-primary-200/25 lg:-ml-[170px]"
      ></div>
      <div
        class="lg:w-[330px] lg:h-[330px] xl:w-[442px] xl:h-[442px] blur-[145px] rounded-full bg-primary-200/20 lg-ml-[170px]"
      ></div>
    </div>
    <div class=" grid grid-cols-3  max-sm:grid-cols-1 max-lg:grid-cols-2 gap-8">
      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/exchange.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/exchange-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','skill-exchange')}}"
            class="block"
          >
            <h3 class="mb-2.5">{{__('index.service1-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service1-description')}}</p>
          <a
            href="{{route('services.show','skill-exchange')}}"
            class="btn-outline btn-sm"
          >
            {{__('index.read-more')}}
          </a>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/chat.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/chat-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','messaging-system')}}"
            class="block"
          >
            <h3 class="mb-2.5">{{__('index.service2-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service2-description')}}</p>
          <a
            href="{{route('services.show','messaging-system')}}"
            class="btn-outline btn-sm"
          >
          {{__('index.read-more')}}
          </a>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/events.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/events-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','events-management')}}"
            class="block"
          >
          <h3 class="mb-2.5">{{__('index.service3-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service3-description')}}</p>
          <a
            href="{{route('services.show','events-management')}}"
            class="btn-outline btn-sm"
            >
            {{__('index.read-more')}}
            </a
          >
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/community.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/community-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','community-forums')}}"
            class="block"
          >
          <h3 class="mb-2.5">{{__('index.service4-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service4-description')}}</p>
          <a
            href="{{route('services.show','community-forums')}}"
            class="btn-outline btn-sm"
            >{{__('index.read-more')}}</a>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/verification.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/verification-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','skill-verification-process')}}"
            class="block"
          >
          <h3 class="mb-2.5">{{__('index.service5-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service5-description')}}</p>
          <a
            href="{{route('services.show','skill-verification-process')}}"
            class="btn-outline btn-sm"
            > {{__('index.read-more')}}</a>
        </div>
      </div>
      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 ">
          <img
            src="{{asset('assets/images/services/premium.svg')}}"
            alt="service logo"
            class="inline-block dark:hidden mb-6 h-10"
          />
          <img
            src="{{asset('assets/images/services/premium-dark.svg')}}"
            alt="service logo"
            class="hidden dark:inline-block mb-6 h-10"
          />
          <a
            href="{{route('services.show','premium-features')}}"
            class="block"
          >
          <h3 class="mb-2.5">{{__('index.service6-title')}}</h3>
          </a>
          <p class="mb-6">{{__('index.service6-description')}}</p>
          <a
            href="{{route('services.show','premium-features')}}"
            class="btn-outline btn-sm"
          >
          {{__('index.read-more')}}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<section class="relative z-10">
<div class="container">
  <div class=" bg-white dark:bg-dark-200 rounded-medium p-2.5 max-w-[850px] mx-auto shadow-nav">
    <div
      class=" bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark py-10 grid grid-cols-3 max-md:grid-cols-1  max-md:gap-y-10 items-center  [&>*:not(:last-child)]:after:absolute  md:[&>*:not(:last-child)]:after:right-0 md:[&>*:not(:last-child)]:after:w-[1px] md:[&>*:not(:last-child)]:after:h-[60px] md:[&>*:not(:last-child)]:after:content-[url('../images/clients/client-item-border.svg')] md:[&>*:not(:last-child)]:after:top-1/2 md:[&>*:not(:last-child)]:after:-translate-y-1/2 md:dark:[&>*:not(:last-child)]:after:content-[url('../images/clients/client-item-border-dark.svg')]  max-md:[&>*:not(:last-child)]:after:h-[1px] max-md:[&>*:not(:last-child)]:after:w-[270px] max-md:[&>*:not(:last-child)]:after:-bottom-5 max-md:[&>*:not(:last-child)]:after:left-1/2 max-md:[&>*:not(:last-child)]:after:-translate-x-1/2  max-md:[&>*:not(:last-child)]:after:content-[url('../images/clients/client-item-border-mobile.svg')] max-md:dark:[&>*:not(:last-child)]:after:content-[url('../images/clients/client-item-border-mobile-dark.svg')] "
      id="counter"
    >
      <div class="flex flex-col items-center justify-center relative">
        <h2 class="text-[48px]">
          <span
            class="counter"
            data-value="20"
          >
          </span
          ><span class="percent">K</span>
        </h2>
        <p class="font-jakarta_sans text-light">{{__('index.registered-users')}}</p>
      </div>
      <div class="flex flex-col items-center justify-center relative">
        <h2 class="text-[48px]">
          <span
            class="counter"
            data-value="10"
          >
          </span
          ><span class="percent">K</span>
        </h2>
        <p class="font-jakarta_sans text-light">{{__('index.skill-exchanges')}}</p>
      </div>
      <div class="flex flex-col items-center justify-center relative">
        <h2 class="text-[48px]">
          <span
            class="counter"
            data-value="100"
          >
          </span
          ><span class="percent">+</span>
        </h2>
        <p class="font-jakarta_sans text-light">{{__('index.events-organized')}}</p>
      </div>
    </div>
  </div>
</div>
</section>


<section
class=" bg-gray dark:bg-dark overflow-hidden relative pt-[300px] pb-150 max-md:pb-20 -mt-24 max-md:pt-[320px] max-md:-mt-60 dark:-mt-20"
>
    @include('components.homepage.integration-svg')
<div class="container relative z-10">
  <div class="grid grid-cols-2 max-md:grid-cols-1 gap-10 1xl:gap-x-24 items-end">
    <div>
      <h2 class="mb-8">{{__('index.why-skillswap')}}</h2>
      <p class="mb-11">
        {{__('index.why-skillswap-description')}}
      </p>
      <ul class="mb-14 [&>*:not(:last-child)]:mb-6 ">
        <li class="flex items-center gap-x-2 ">
          <span
            class=" relative w-7 h-7 rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center"
          >
            <i
              class="fa-solid fa-check text-paragraph dark:text-primary absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 "
            ></i>
          </span>
          <span class="dark:text-white font-jakarta_sans font-medium">{{__('index.seamless-skill-exchange')}}</span>
        </li>
        <li class="flex items-center gap-x-2">
          <span
            class=" relative w-7 h-7 rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center"
          >
            <i
              class="fa-solid fa-check text-paragraph dark:text-primary absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 "
            ></i>
          </span>
          <span class="dark:text-white font-jakarta_sans font-medium">{{__('index.engage-in-vibrant-community')}}</span>
        </li>
        <li class="flex items-center gap-x-2 ">
          <span
            class=" relative w-7 h-7 rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center"
          >
            <i
              class="fa-solid fa-check text-paragraph dark:text-primary absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 "
            ></i>
          </span>

          <span class="dark:text-white font-jakarta_sans font-medium">{{__('index.discover-exciting-events')}}</span>
        </li>
      </ul>
      <a
        href="contact.html"
        class="btn"
      >
        {{__('index.start-your-journey')}}
      </a>
    </div>
    <div class="relative  max-md:mt-150">
      <img
        src="{{asset('assets/images/vision/vision-image.png')}}"
        alt="vision image"
        class="w-[180px]  md:w-[200px] xl:w-[310px] dark:hidden"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      />
      <img
        src="{{asset('assets/images/vision/vision-image-dark.png')}}"
        alt="vision image"
        class="w-[180px]  md:w-[200px] xl:w-[310px] hidden dark:inline-block"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      />
      <div
        class="absolute -top-25 left-40 md:-top-12 xl:-top-[150px] md:left-[190px] xl:left-[290px] w-[180px]  md:w-[200px] xl:w-[310px]"
        data-aos="fade-left"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      >
        <img
          src="{{asset('assets/images/vision/vision-image-1.png')}}"
          alt="vision image shape"
          class="w-full full dark:hidden"
        />
        <img
          src="{{asset('assets/images/vision/vision-image-dark-1.png')}}"
          alt="vision image shape"
          class="w-full full hidden dark:inline-block"
        />
      </div>
      <div
        class="absolute bottom-5 left-20 md:bottom-0 xl:bottom-8 md:left-[100px] xl:left-150 w-[180px] md:w-[200px] xl:w-[350px]"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      >
        <img
          src="{{asset('assets/images/vision/vision-image-2.png')}}"
          alt="vision image shape"
          class="w-full h-full dark:hidden"
        />
        <img
          src="{{asset('assets/images/vision/vision-image-dark-2.png')}}"
          alt="vision image shape"
          class="w-full h-full hidden dark:inline-block"
        />
      </div>
    </div>
  </div>
</div>
</section>


<section class=" bg-white dark:bg-dark-300 overflow-hidden relative pt-[160px] pb-150 lg:pb-15 max-md:py-20 ">
<div class="container ">
  <div class="grid grid-cols-2 max-md:grid-cols-1 gap-10 1xl:gap-x-24 items-center">
    <div class="max-md:order-2">
      <div class="relative pt-[200px] lg:py-150 lg:px-150">
        <div class="w-[250px] lg:w-[300px] aspect-video relative mx-auto">
          <img
            src="{{asset('assets/images/solution/solution.png')}}"
            alt="vision image"
            class="dark:hidden"
          />
          <img
            src="{{asset('assets/images/solution/solution-dark.png')}}"
            alt="vision image"
            class="hidden dark:inline-block"
          />
          <div
            class="absolute left-10 -top-[130px] lg:-top-[185px] lg:left-15 right-auto bottom-auto w-[250px] h-[150px] lg:w-[280px] lg:h-[180px] xl:w-[320px] xl:h-[230px]"
            data-aos="fade-left"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-once="true"
          >
            <img
              src="{{asset('assets/images/solution/solution-shape1.png')}}"
              alt="vision image"
              class="dark:hidden  w-full"
            />
            <img
              src="{{asset('assets/images/solution/solution-shape1-dark.png')}}"
              alt="vision image"
              class="hidden dark:inline-block w-full"
            />
          </div>
          <div
            class="absolute right-12 top-12 lg:right-20 left-auto bottom-auto w-[280px] h-[190px] lg:w-[320px] lg:h-[230px] xl:w-[368px] xl:h-[280px]"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="100"
            data-aos-once="true"
          >
            <img
              src="{{asset('assets/images/solution/solution-shape2.png')}}"
              alt="vision image"
              class="dark:hidden  w-full"
            />
            <img
              src="{{asset('assets/images/solution/solution-shape2-dark.png')}}"
              alt="vision image"
              class="hidden dark:inline-block w-full"
            />
          </div>
          <div
            class="absolute left-[175px] -bottom-[70px] lg:-bottom-[86px] lg:left-[200px] right-auto top-auto w-[150px] lg:w-[170px] aspect-video"
            data-aos="fade-left"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="200"
            data-aos-once="true"
          >
            <img
              src="{{asset('assets/images/solution/solution-shape3.png')}}"
              alt="vision image"
              class="dark:hidden  w-full"
            />
            <img
              src="{{asset('assets/images/solution/solution-shape3-dark.png')}}"
              alt="vision image"
              class="hidden dark:inline-block w-full"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="max-md:order-1 -mt-15">
      <h2 class="mb-8">{{__('index.unlock-your-potential')}}</h2>
      <p class="mb-11">
        {{__('index.unlock-your-potential-description')}}
      </p>
      <ul class="mb-14 flex max-md:flex-col max-md:gap-y-5 lg:items-center lg:[&>*:not(:last-child)]:mr-10 ">
        <li class="relative flex items-center gap-x-2 ">
          <i class="fa-solid fa-check text-paragraph dark:text-primary"></i>
          <span class="dark:text-white font-jakarta_sans font-medium">{{__('index.skill-based-community')}}</span>
        </li>
        <li class="relative flex items-center gap-x-2 ">
          <i class="fa-solid fa-check text-paragraph dark:text-primary"></i>
          <span class="dark:text-white font-jakarta_sans font-medium">{{__('index.interactive-learning-resources')}}</span>
        </li>
      </ul>
      <a
        href="contact.html"
        class="btn-outline"
      >
        {{__('index.start-your-journey')}}
      </a>
    </div>
  </div>
</div>
</section>


<section class="bg-white dark:bg-dark-300  pb-150 max-md:pb-20">
<div class="container relative z-10">
  <div class="text-center max-w-[620px] mx-auto">
    <p class="section-tagline">{{__('index.top-features')}}</p>

    <h2 class="mb-8">{{__('index.experience-comprehensive-functionality')}}</h2>
    <p class="mb-10">
        {{__('index.top-features-description')}}
    </p>

    <a
      href="contact.html"
      class="btn-outline"
    >
      {{__('index.start-your-journey')}}
    </a>
  </div>
  <div class="max-w-[1068px] mx-auto -mt-15 max-md:hidden relative -z-10">
    <div class="relative max-lg:py-25 max-xl:py-150 py-[175px] w-full z-10">
      <div
        class="relative flex flex-row align-center justify-center mx-auto w-150 h-150 rounded-full bg-white dark:bg-dark-200 shadow-nav"
      >
        <div
          class="flex flex-row align-center justify-center mx-auto absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2  w-[122px] h-[122px] rounded-full bg-primary-100 dark:bg-[#2B2D2A]"
        >
          <span class="inline-block text-primary text-[30px] font-semibold py-[46px] px-[25px] leading-none">
            Swap
          </span>
        </div>
      </div>
      <div class="w-1/2 h-full block absolute top-0 left-0 bottom-auto right-auto">
        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-0 left-0 right-auto bottom-auto"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/business.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div
          class="w-auto leading-0 absolute max-lg:top-5 max-xl:top-[42px] top-[58px] bottom-auto left-25 right-auto -z-10"
        >
          <svg
            width="100%"
            height="193"
            viewBox="0 0 437 193"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path"
              d="M0 1H122.022C130.298 1 137.01 7.70248 137.022 15.9782L137.175 122.029C137.187 130.302 143.895 137.003 152.168 137.007L275.007 137.066C283.289 137.07 290 143.785 290 152.066V177C290 185.284 296.716 192 305 192H437"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>

        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-1/2 -translate-y-1/2 left-10 bottom-auto right-auto"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/science.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div class="w-auto leading-0 absolute top-1/2 -translate-y-1/2 bottom-auto left-25 right-auto  -z-10">
          <svg
            width="100%"
            height="2"
            viewBox="0 0 373 2"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path-2"
              d="M0 1H373"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect-2"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>

        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-auto left-0 bottom-0 right-auto"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/education.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div
          class="w-auto leading-0 absolute top-auto -translate-y-1/2 max-lg:-bottom-[76px] max-xl:-bottom-[54px] -bottom-[38px] left-25 right-auto  -z-10"
        >
          <svg
            width="100%"
            height="193"
            viewBox="0 0 437 193"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path-3"
              d="M0 192H122.022C130.298 192 137.01 185.298 137.022 177.022L137.175 70.971C137.187 62.6981 143.906 55.9968 152.179 55.9928C198.05 55.9707 229.13 55.9557 274.996 55.9336C283.278 55.9296 290 49.215 290 40.9336V16C290 7.7157 296.716 0.999985 305 0.999985H437"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect-3"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>
      </div>
      <div class="w-1/2 h-full block absolute top-0 left-auto bottom-auto right-0">
        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-0 left-auto right-0 bottom-auto"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/software.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div
          class="w-auto leading-0 absolute max-lg:top-5 max-xl:top-[42px] top-[58px] bottom-auto right-25 left-auto -z-10"
        >
          <svg
            width="100%"
            height="193"
            viewBox="0 0 437 193"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path-4"
              d="M437 1H314.978C306.702 1 299.99 7.70248 299.978 15.9782L299.825 122.029C299.813 130.302 293.105 137.003 284.832 137.007L161.993 137.066C153.711 137.07 147 143.785 147 152.066V177C147 185.284 140.284 192 132 192H0"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect-4"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>

        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-1/2 -translate-y-1/2 left-auto bottom-auto right-10"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/graphic.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div class="w-auto leading-0 absolute top-1/2 -translate-y-1/2 bottom-auto right-25 left-auto -z-10">
          <svg
            width="100%"
            height="2"
            viewBox="0 0 373 2"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path-5"
              d="M373 1H0"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect-5"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>

        <div
          class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 xl:w-[120px] aspect-square rounded-full absolute top-auto left-auto bottom-0 right-0"
        >
          <div
            class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full 1xl:p-2.5"
          >
            <img
              src="{{asset('assets/images/professions/health.svg')}}"
              alt="value image"
              class="inline-block"
            />
          </div>
        </div>
        <div
          class="w-auto leading-0 absolute top-auto -translate-y-1/2 max-lg:-bottom-[76px] max-xl:-bottom-[54px] -bottom-[38px] left-auto right-25 -z-10"
        >
          <svg
            width="100%"
            height="193"
            viewBox="0 0 437 193"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="overflow-visible"
          >
            <path
              id="path-6"
              d="M437 192H314.978C306.702 192 299.99 185.298 299.978 177.022L299.825 70.971C299.813 62.6981 293.105 55.9968 284.832 55.9928L161.993 55.9336C153.711 55.9296 147 49.215 147 40.9336V16C147 7.7157 140.284 0.999985 132 0.999985H0"
              stroke="#DCE0D3"
              stroke-dasharray="5 3"
            />
            <g
              id="rect-6"
              data-svg-origin="25.5 25.5"
              transform="matrix(1,0,0,1,255.40852,119.431)"
            >
              <g filter="url(#filter0_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="7.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
              <g filter="url(#filter1_f_283_246)">
                <circle
                  cx="25.5"
                  cy="25.5"
                  r="5.5"
                  fill=""
                  class="fill-primary"
                ></circle>
              </g>
            </g>
            <defs>
              <filter
                id="filter0_f_283_246"
                x="0"
                y="0"
                width="51"
                height="51"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="9"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
              <filter
                id="filter1_f_283_246"
                x="13"
                y="13"
                width="25"
                height="25"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood
                  flood-opacity="0"
                  result="BackgroundImageFix"
                ></feFlood>
                <feBlend
                  mode="normal"
                  in="SourceGraphic"
                  in2="BackgroundImageFix"
                  result="shape"
                ></feBlend>
                <feGaussianBlur
                  stdDeviation="3.5"
                  result="effect1_foregroundBlur_283_246"
                ></feGaussianBlur>
              </filter>
            </defs>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class=" grid grid-cols-2 gap-8 md:hidden mt-10">
    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/figma.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>

    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/dropbox.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>

    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/twitter.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>
    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/slack.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>
    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/google-drive.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>
    <div class="bg-white dark:bg-dark-200 shadow-box  p-2.5 w-25 aspect-square rounded-full mx-auto">
      <div
        class="flex items-center justify-center border border-dashed  border-gray-100 dark:border-borderColour-dark text-center aspect-square rounded-full "
      >
        <img
          src="{{asset('assets/images/asana.svg')}}"
          alt="value image"
          class="inline-block"
        />
      </div>
    </div>
  </div>
</div>
</section>


<section class=" bg-gray dark:bg-dark overflow-hidden relative pt-150 pb-[130px] max-md:py-20">
    @include('components.homepage.faq-svg')
<div class="container relative z-10">
  <div class="grid grid-cols-2 max-lg:grid-cols-1 gap-10 1xl:gap-x-24 ">
    <div>
      <p class="section-tagline">Faq’s</p>

      <h2 class="mb-8">
        {!!__('index.frequently-asked-question')!!}
      </h2>
      <p>
        {{__('index.faq-description')}}
      </p>
    </div>
    <div class="[&>*:not(:last-child)]:mb-5">
      <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
        <div
          class="faq-header flex items-center max-md:gap-x-2.5 py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark  cursor-pointer"
        >
          <h3 class="text-xl font-semibold">{{__('faq.question1')}}</h3>
          <span class="shrink-0 ml-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class="plus"
            >
              <path
                d="M6.25 10H13.75M10 6.25V13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class=" minus"
            >
              <path
                d="M6.25 10H13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
          </span>
        </div>
        <div class="faq-body close">
          <div class="text-paragraph-light pt-6 px-6 pb-3.5 dark:text-[#A1A49D]">
            {{__('faq.answer1')}}
          </div>
        </div>
      </div>
      <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
        <div
          class="faq-header flex items-center  max-md:gap-x-2.5 py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
        >
          <h3 class="text-xl font-semibold">{{__('faq.question2')}}</h3>
          <span class="shrink-0 ml-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class="plus"
            >
              <path
                d="M6.25 10H13.75M10 6.25V13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class=" minus"
            >
              <path
                d="M6.25 10H13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
          </span>
        </div>
        <div class="faq-body close ">
          <div class="text-paragraph-light pt-6 px-6 pb-3.5 dark:text-[#A1A49D]">
            {{__('faq.answer2')}}
          </div>
        </div>
      </div>
      <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
        <div
          class="faq-header flex items-center  max-md:gap-x-2.5 py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
        >
          <h3 class="text-xl font-semibold">{{__('faq.question3')}}</h3>
          <span class="shrink-0 ml-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class="plus"
            >
              <path
                d="M6.25 10H13.75M10 6.25V13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class=" minus"
            >
              <path
                d="M6.25 10H13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
          </span>
        </div>
        <div class="faq-body close ">
          <div class="text-paragraph-light pt-6 px-6 pb-3.5 dark:text-[#A1A49D]">
            {{__('faq.answer3')}}
          </div>
        </div>
      </div>
      <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
        <div
          class="faq-header py-3 px-5 flex items-center  max-md:gap-x-2.5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
        >
          <h3 class="text-xl font-semibold">{{__('faq.question4')}}</h3>
          <span class="shrink-0 ml-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class="plus"
            >
              <path
                d="M6.25 10H13.75M10 6.25V13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class=" minus"
            >
              <path
                d="M6.25 10H13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
          </span>
        </div>
        <div class="faq-body close ">
          <div class="text-paragraph-light pt-6 px-6 pb-3.5 dark:text-[#A1A49D]">
            {{__('faq.answer4')}}
          </div>
        </div>
      </div>
      <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
        <div
          class="faq-header flex items-center  max-md:gap-x-2.5 py-3 px-5  bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
        >
          <h3 class="text-xl font-semibold ">{{__('faq.question5')}}</h3>
          <span class="shrink-0 ml-auto">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class="plus"
            >
              <path
                d="M6.25 10H13.75M10 6.25V13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              class=" minus"
            >
              <path
                d="M6.25 10H13.75M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
                stroke=""
                stroke-width="1.5"
                stroke-linecap="round"
                class="stroke-paragraph dark:stroke-primary"
              />
            </svg>
          </span>
        </div>
        <div class="faq-body close ">
          <div class="text-paragraph-light pt-6 px-6 pb-3.5 dark:text-[#A1A49D]">
            {{__('faq.answer5')}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<section class="bg-white dark:bg-dark-300  pb-150 max-md:py-20 pt-150 relative">
<div class="container relative">
  <div class="text-center max-w-[550px] mx-auto mb-16">
    <p class="section-tagline">{{__('index.testimonials')}}</p>
    <h2>{{__('index.what-our-users-say')}}</h2>
  </div>
  <div class="relative z-10">
    <div
      class="absolute left-1/2 top-[37%] -translate-x-1/2 -translate-y-1/2 flex max-lg:flex-col max-lg:item-center -z-10"
    >
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/20 "
      ></div>
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/25 lg:-ml-[170px]"
      ></div>
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/20 lg:-ml-[170px] "
      ></div>
    </div>
    <div class=" flex flex-wrap max-md:flex-col gap-6 gap-y-8 justify-center mb-12">
      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5  md:w-[calc(50%_-_20px)] lg:w-[calc(33.33%_-_20px)] shadow-nav"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
          <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
            “SkillSwap has been a game-changer for me. I've been able to connect with other designers and exchange skills in a way that's truly valuable. The platform is easy to use, and the community is incredibly supportive.”
          </blockquote>
          <div class="mb-7">
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
          </div>

          <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
            <img
              src="{{asset('assets/images/testimonial/avatar1.png')}}"
              alt="avatar"
              class="mr-4 rounded-full"
            />
            <div class="block">
              <h3 class="text-base font-semibold">Alice W.</h3>
              <p class="text-paragraph-light dark:text-[#A1A49D] font-jakarta_sans text-sm font-medium">
                Graphic Designer
              </p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5  md:w-[calc(50%_-_20px)] lg:w-[calc(33.33%_-_20px)] shadow-nav"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
          <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
            “I've learned so much through SkillSwap. Being able to connect with experts in my field and exchange knowledge has helped me level up my skills faster than I ever thought possible. Highly recommended!”
          </blockquote>
          <div class="mb-7">
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
          </div>

          <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
            <img
              src="{{asset('assets/images/testimonial/avatar2.png')}}"
              alt="avatar"
              class="mr-4 rounded-full"
            />
            <div class="block">
              <h3 class="text-base font-semibold">Guy Hawkins</h3>
              <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">Programmer</p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 md:w-[calc(50%_-_20px)] lg:w-[calc(33.33%_-_20px)] shadow-nav"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
          <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
            “As someone who loves learning languages, SkillSwap has been a godsend. I've been able to practice speaking with native speakers and get personalized feedback on my progress. It's made learning a new language so much more enjoyable.”
          </blockquote>
          <div class="mb-7">
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
          </div>

          <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
            <img
              src="{{asset('assets/images/testimonial/avatar3.png')}}"
              alt="avatar"
              class="mr-4 rounded-full"
            />
            <div class="block">
              <h3 class="text-base font-semibold">Sarah</h3>
              <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                Langauge Learner
              </p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5  md:w-[calc(50%_-_20px)] lg:w-[calc(33.33%_-_20px)] shadow-nav"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
          <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
            “As a student, SkillSwap has been incredibly helpful in supplementing my education. I've been able to learn practical skills and gain real-world experience through skill exchanges with professionals in my field. It's been a game-changer for my academic journey.”
          </blockquote>
          <div class="mb-7">
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
          </div>

          <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
            <img
              src="{{asset('assets/images/testimonial/avatar4.png')}}"
              alt="avatar"
              class="mr-4 rounded-full"
            />
            <div class="block">
              <h3 class="text-base font-semibold">Rachel</h3>
              <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                Student
              </p>
            </div>
          </div>
        </div>
      </div>

      <div
        class="bg-white dark:bg-dark-200 rounded-medium p-2.5 md:w-[calc(50%_-_20px)] lg:w-[calc(33.33%_-_20px)] shadow-nav"
      >
        <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7">
          <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
            “SkillSwap has allowed me to diversify my skill set and expand my client base. I've been able to connect with clients who are looking for specific skills that I possess, while also learning new skills from others. It's been a win-win for my freelance career.”
          </blockquote>
          <div class="mb-7">
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
            <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
          </div>

          <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
            <img
              src="{{asset('assets/images/testimonial/avatar5.png')}}"
              alt="avatar"
              class="mr-4 rounded-full"
            />
            <div class="block">
              <h3 class="text-base font-semibold">Brian Jr.</h3>
              <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">Freelancer</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex items-center justify-center">
      <a
        href="contact.html"
        class="btn-outline"
      >
        {{__('index.start-your-journey')}}
      </a>
    </div>
  </div>
  <div
    class="w-full h-[450px] absolute bottom-15 left-0 z-10 bg-gradient-to-b  from-transparent  to-white dark:to-dark-300 to-100%"
  ></div>
</div>
</section>


<section class="bg-white dark:bg-dark-300  pb-150 relative max-md:pb-20">
<div class="container relative">
  <div class="text-center max-w-[550px] mx-auto mb-16">
    <h2>{{__('index.blogs')}}</h2>
  </div>
  <div class="relative z-10">
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-lg:flex-col -z-10">
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/20 "
      ></div>
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/25 lg:-ml-[170px]"
      ></div>
      <div
        class="w-[350px] h-[350px] lg:w-[442px] lg:h-[442px] blur-[80px] lg:blur-[145px] rounded-full bg-primary-200/20 lg:-ml-[170px]"
      ></div>
    </div>
    <div class=" grid grid-cols-3 max-md:grid-cols-1 max-lg:grid-cols-2 gap-8">
        @foreach ($latest_blogs as $blog)
            @include('components.single-blog',['blog'=>$blog])
        @endforeach
    </div>
  </div>
</div>
</section>


<section class="bg-gray dark:bg-dark overflow-hidden relative pt-[135px] pb-[145px] max-md:py-20">
    @include('components.homepage.trial-svg')
<div class="container relative z-10">
  <div class=" text-center   mx-auto">
    <h2 class="mb-5 text-[48px] font-semibold">
        {{__('index.join-skillswap-today')}}
    </h2>
    <p class="mb-12 max-w-[600px] mx-auto">
        {{__('index.join-skillswap-description')}}
    </p>
    <a
      href="contact.html"
      class="btn"
    >
      {{__('index.get-started')}}
    </a>
    <ul class=" flex max-md:flex-col max-md:gap-5 items-center justify-between mt-20 max-w-[815px] mx-auto">
      <li class="flex items-center">
        <svg
          width="20"
          height="20"
          viewBox="0 0 20 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="mr-3"
        >
          <path
            d="M14.125 7.75L8.62497 13L5.875 10.375M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
            stroke=""
            class="stroke-paragraph dark:stroke-primary"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        <p>{{__('index.accelerate-growth')}}</p>
      </li>
      <li class="flex items-center">
        <svg
          width="20"
          height="20"
          viewBox="0 0 20 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="mr-3"
        >
          <path
            d="M14.125 7.75L8.62497 13L5.875 10.375M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
            stroke=""
            class="stroke-paragraph dark:stroke-primary"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        <p>{{__('index.exclusive-events-and-workshops')}}</p>
      </li>
      <li class="flex items-center">
        <svg
          width="20"
          height="20"
          viewBox="0 0 20 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="mr-3"
        >
          <path
            d="M14.125 7.75L8.62497 13L5.875 10.375M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z"
            stroke=""
            class="stroke-paragraph dark:stroke-primary"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        <p>{{__('index.supportive-community')}}</p>
      </li>
    </ul>
  </div>
</div>
</section>

@endsection
