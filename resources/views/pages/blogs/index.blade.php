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
        <p class="mb-4 font-medium uppercase">Blog Grid</p>
        <h1 class="max-lg:mb-10 mb-10">Recent blogs created <br>  by SwapSkill</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto"></p>
      </div>
    </div>
  </section>


  <div class="relative">
    <div
      class="container pb-150 max-md:pb-10 relative after:absolute  after:bottom-0  after:content-[url('../images/blog/blog-seperator.svg')] dark:after:content-[url('../images/blog/blog-seperator-dark.svg')] after:left-1/2  after:-translate-x-1/2 max-md:after:hidden"
    >
      <div class="relative z-10">
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex -z-10">
          <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 blur-[145px]"></div>
          <div class="w-[442px] h-[442px] rounded-full bg-primary-200/25 -ml-[170px] blur-[145px]"></div>
          <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 -ml-[170px] blur-[145px]"></div>
        </div>
        <div
          class=" !pb-20 md:!px-6 swiper "
          id="blog-feature"
        >
          <div class="swiper-wrapper">
            @foreach ($latest_blogs as $blog)
                <article class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
                <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-6 ">
                    <div class="grid grid-cols-2 max-md:grid-cols-1 max-md:gap-y-5 gap-12 items-center">
                    <img
                        src="{{asset($blog->thumbnail)}}"
                        alt="blog image"
                        class="w-full rounded-lg max-md:object-cover max-md:object-center max-md:h-[350px]"
                    />
                    <div class="">
                        <a
                        href="{{route('blogs.categories',$blog->category->slug??'others')}}"
                        class="badge"
                        >
                        {{$blog->category->name??'Others'}}
                        </a>
                        <a href="{{route('blogs.show',$blog->slug)}}" class="block">
                            <h3 class="mb-3 font-semibold leading-[1.33]">
                                    {{$blog->title}}
                            </h3>
                        </a>
                        <div class="flex gap-x-2 items-center mb-4 ">
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
                        <p class="mb-6">
                            {!!$blog->summary!!}
                        </p>
                    </div>
                    </div>
                </div>
                </article>
            @endforeach
          </div>
          <div class="swiper-pagination mt-12"></div>
        </div>
      </div>
    </div>
  </div>


  <section class="py-150 max-md:py-20 relative">
    <div class="container relative mb-16">
      <div class="text-center max-w-[550px] mx-auto mb-16">
        <p class="section-tagline">Tips and Tricks</p>
        <h2>Our recent news & insights</h2>
      </div>
      <div class="relative z-10">
        <div class="absolute left-1/2 top-60 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
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
        <div class=" grid grid-cols-3 max-md:grid-cols-1 max-lg:grid-cols-2 gap-8">
            @foreach ($blogs as $blog)
                @include('components.single-blog',['blog'=>$blog])
            @endforeach
        </div>
      </div>
    </div>
    <div class="container">
        @include('partials.custom-pagination', ['paginator' => $blogs])
    </div>
  </section>


@include('components.free-trial')

@endsection
