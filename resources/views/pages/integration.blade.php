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
        <p class="mb-4 font-medium uppercase">Integration</p>
        <h1 class="max-lg:mb-10 mb-10">Make productivity easier <br>  with 50+ integration</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto">Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin, though it looks like it</p>
      </div>
    </div>
  </section>


  <section class=" pb-150">
    <div class="container ">
      <div class="relative z-10 max-w-[850px] mx-auto">
        <div class="absolute left-1/2 top-150 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
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
        <div
          class=" grid grid-cols-2 max-md:grid-cols-1 gap-8"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-delay="200"
          data-aos-once="true"
        >
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center ">
              <img
                src="{{asset('assets/images/figma.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />
              <h3 class="mb-2.5">Figma</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>

          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center">
              <img
                src="{{asset('assets/images/dropbox.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />

              <h3 class="mb-2.5">Dropbox</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>

          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center">
              <img
                src="{{asset('assets/images/twitter.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />
              <h3 class="mb-2.5">Twitter/X</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center">
              <img
                src="{{asset('assets/images/slack.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />
              <h3 class="mb-2.5">Slack</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center">
              <img
                src="{{asset('assets/images/google-drive.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />
              <h3 class="mb-2.5">Google Drive</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center">
              <img
                src="{{asset('assets/images/asana.svg')}}"
                alt="value image"
                class="inline-block mb-8"
              />
              <h3 class="mb-2.5">Asana</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  @include('components.free-trial')

@endsection
