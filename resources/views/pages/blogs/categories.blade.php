@extends('layouts.app')
@section('content')
<section class="hero  overflow-hidden relative max-lg:pt-150 pt-[240px] pb-[60px]">
    <div class="container">
      <div
        class="max-w-[948px] mx-auto text-center"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      >
        <p class="mb-4 font-medium uppercase">Blog Categories</p>
        <h1 class="max-lg:mb-10 mb-10">{{$category->name}}</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto"></p>
      </div>
    </div>
  </section>


  <section class="mb-150">
    <div class="container relative">
      <div class="absolute left-1/2 top-20 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
        <div
          class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 blur-[145px]"
        ></div>
        <div
          class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/25 -ml-[170px] max-md:ml-0 blur-[145px]"
        ></div>
        <div
          class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 -ml-[170px] max-md:ml-0 blur-[145px]"
        ></div>
      </div>
      <div class="grid grid-cols-12 max-md:gap-y-25 md:gap-5 lg:gap-8">
        <div class="max-md:col-span-full max-lg:col-span-7 max-md:order-2 lg:col-span-8 [&>*:not(:last-child)]:mb-8">
            @foreach ($blogs as $blog)
                <article class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav">
                    <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-6 ">
                        <div class="grid grid-cols-2 max-lg:grid-cols-1 gap-12 items-center">
                            <img
                            src="{{asset($blog->thumbnail)}}"
                            alt="blog image"
                            class="w-full rounded-lg"
                            />
                            <div class="">
                            <a
                                href="{{route('blogs.categories',$blog->category->slug??'others')}}"
                                class="badge"
                            >
                                {{$blog->category->name??'Others'}}
                            </a>
                            <a href="{{route('blogs.show',$blog->slug)}}">
                                <h3 class="mb-1 font-semibold leading-[1.33]">
                                {{$blog->title}}
                                </h3>
                            </a>
                            <div class="flex gap-x-2 items-center mb-2">
                                <p>{{$blog->author->name}}</p>
                                <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="5"
                                    height="6"
                                    viewBox="0 0 5 6"
                                    fill="none"
                                >
                                    <circle
                                    cx="2.5"
                                    cy="3"
                                    r="2.5"
                                    fill=""
                                    class="fill-[#D8DBD0] dark:fill-[#3B3C39]"
                                    />
                                </svg>
                                </span>
                                <p>{{$blog->published_at->format('M d, Y')}}</p>
                            </div>
                            <p class="mb-4">
                                {!!strip_tags(substr($blog->summary, 0, 250))!!}...
                            </p>
                            <a
                                href="{{route('blogs.show',$blog->slug)}}"
                                class="btn-outline btn-sm"
                            >
                                Read More
                            </a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
          <div class="mt-16">
            @include('partials.custom-pagination', ['paginator' => $blogs])
          </div>
        </div>
        <div class="max-md:col-span-full max-lg:col-span-5 max-md:order-1 lg:col-span-4 self-start">
          <div class=" bg-white dark:bg-dark-200 rounded-medium p-2.5  shadow-nav">
            <div
              class=" bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark py-12 px-8   "
            >
              <div class="mb-12">
                <h3 class="mb-8">Search</h3>
                <label class="relative block">
                  <span class="sr-only">Search</span>
                  <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="20"
                      height="20"
                      viewBox="0 0 20 20"
                      fill="none"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.11278 0C14.1369 0 18.2245 4.08758 18.2245 9.11278C18.2245 11.2861 17.4592 13.5472 16.1845 14.8512L20 18.6667L18.6667 20L14.8512 16.1856C13.5667 17.4603 11.2861 18.2245 9.11278 18.2245C4.08758 18.2245 0 14.1369 0 9.11278C0 4.08758 4.08758 0 9.11278 0ZM9.11278 16.3395C13.0974 16.3395 16.3395 13.0974 16.3395 9.11278C16.3395 5.12818 13.0974 1.88608 9.11278 1.88608C5.12709 1.88608 1.88499 5.12818 1.88499 9.11278C1.88499 13.0974 5.12709 16.3395 9.11278 16.3395Z"
                        fill=""
                        class="fill-paragraph dark:fill-white"
                      />
                    </svg>
                  </span>
                  <input
                    class="w-full border dark:bg-transparent border-borderColour dark:border-borderColour-dark rounded-[60px] py-5 pl-12 pr-5 focus:outline-none placeholder:text-paragraph-light dark:text-paragraph-light font-jakarta_sans placeholder:font-jakarta_sans focus:border-primary duration-300 transition-all "
                    placeholder="Search..."
                    type="text"
                    name="search"
                  />
                </label>
              </div>
              <div class="mb-12">
                <h3 class="mb-3">Categories</h3>
                <div
                  class=" [&>*:not(:last-child)]:border-b [&>*:not(:last-child)]:border-dashed [&>*:not(:last-child)]:border-borderColour dark:[&>*:not(:last-child)]:border-borderColour-dark "
                >
                    @foreach ($categories as $cat)
                        <a
                        href="{{route('blogs.categories',$cat->slug)}}"
                        class=" font-jakarta_sans text-lg font-medium group flex items-center justify-between blogActive py-5 relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                        >
                        {{$cat->name}}
                        </a>
                    @endforeach
                </div>
              </div>

              <div class="mb-12">
                <h3 class="mb-8">Latest Articles</h3>
                <div class="[&>*:not(:last-child)]:mb-6">
                    @foreach ($latest_blogs as $blog)
                        <article class="grid grid-cols-12 gap-4">
                        <div class="col-span-4">
                            <img
                            src="{{asset($blog->thumbnail)}}"
                            alt="blog iamge"
                            class="rounded-lg"
                            />
                        </div>
                        <div class="col-span-8">
                            <a href="{{route('blogs.show',$blog->slug)}}"
                            ><h5 class="mb-2 text-xl">{{$blog->title}}</h5></a
                            >
                            <p>{{$blog->published_at->format('M d, Y')}}</p>
                        </div>
                        </article>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="relative  pb-25 max-md:pb-25">
    <div class="container relative max-md:text-center">
      <div class="absolute left-1/2 -bottom-[442px] -translate-x-1/2  flex max-md:flex-col -z-10">
        <div
          class="max-md:hidden max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 blur-[145px]"
        ></div>
        <div
          class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/25 -ml-[170px] max-md:ml-0 blur-[145px]"
        ></div>
        <div
          class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 -ml-[170px] max-md:ml-0 blur-[145px]"
        ></div>
      </div>
      <div>
        <div>
          <p class="section-tagline">Start Today</p>
        </div>
        <div class="grid grid-cols-12 grid-y-10 items-start">
          <div class="max-md:col-span-full md:col-span-6 lg:col-span-7">
            <h2 class="mb-5 text-[48px] font-semibold ">Start your free trial now!</h2>
            <p>By creating a custom Web design for your business, we can bring your vision to life.</p>
          </div>
          <div class="max-md:col-span-full md:col-span-6 lg:col-span-5 max-md:mt-5 ">
            <form>
              <div class="grid grid-cols-12 items-center max-lg:gap-y-5 lg:gap-x-6 ">
                <input
                  type="text"
                  placeholder="Enter your email"
                  class="bg-transparent placeholder:text-light dark:placeholder:text-[#A1A49D] text-[#A1A49D] text-light focus:outline-none  leading-[1.75] border rounded-[60px] bg-white dark:bg-dark-200 dark:border-[#31332F] border-borderColour max-lg:col-span-full lg:col-span-8 h-full ps-5 max-lg:py-5 focus:border-primary duration-300 transition-all outline-none"
                />
                <button class="btn max-lg:col-span-full lg:col-span-4">Get Started</button>
              </div>
            </form>
            <ul class=" flex max-md:flex-col max-lg:gap-y-2.5 items-center max-lg:justify-between lg:gap-5 mt-6 ">
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
                <p>No Credit Card Required</p>
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
                <p>Free For 30 Day Trial.</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
