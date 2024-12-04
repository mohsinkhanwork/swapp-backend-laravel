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
        <p class="mb-4 font-medium uppercase">Blog Details</p>
        <h1 class="max-lg:mb-10 mb-10">Recent blogs created <br>  by aplio</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto"></p>
      </div>
    </div>
  </section>


  <article class="pb-150">
    <div class="container relative ">
      <div class="absolute left-1/2 top-20 -translate-x-1/2 -translate-y-1/2 flex -z-10">
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 blur-[145px]"></div>
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/25 -ml-[170px] blur-[145px]"></div>
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 -ml-[170px] blur-[145px]"></div>
      </div>

      <div class="p-2.5 bg-white dark:bg-dark-200 rounded-medium overflow-hidden shadow-box mb-16 max-md:h-[400px]">
        <img
          src="{{asset($blog->thumbnail)}}"
          alt="about images"
          class="rounded w-full  max-md:object-cover max-md:object-center max-md:h-full"
        />
      </div>
      <div class="blog-details">
        <h2>{{$blog->title}}</h2>
        <div class="flex gap-x-2 items-center mb-12 ">
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
      </div>
      <div class="blog-details-body">
        {!!$blog->content!!}
      </div>
    </div>
  </article>


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
