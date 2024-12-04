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
        <p class="mb-4 font-medium uppercase">about company</p>
        <h1 class="max-lg:mb-10 mb-10">The future of business is being shaped by aplio</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto">Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin, though it looks like it</p>
      </div>
    </div>
  </section>


  <section>
    <div class="container relative ">
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
      <div class="grid grid-cols-3 max-md:grid-cols-1 gap-10 items-center  max-md:mb-25 mb-[160px]">
        <div
          class="p-2.5 bg-white dark:bg-dark-200 rounded-medium overflow-hidden shadow-box"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/about/about1.png')}}"
            alt="about images"
            class="rounded w-full"
          />
        </div>
        <div
          class="p-2.5 bg-white dark:bg-dark-200 rounded-medium overflow-hidden shadow-box"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-delay="150"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/about/about2.png')}}"
            alt="about images"
            class="rounded w-full"
          />
        </div>
        <div
          class="p-2.5 bg-white dark:bg-dark-200 rounded-medium overflow-hidden shadow-box"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-delay="300"
          data-aos-once="true"
        >
          <img
            src="{{asset('assets/images/about/about3.png')}}"
            alt="about images"
            class="rounded w-full"
          />
        </div>
      </div>

      <div class="grid grid-cols-12">
        <div class="max-md:col-span-full md:col-span-6">
          <div class="max-w-[550px]">
            <p class="section-tagline">Numbers</p>
            <h2>More than 10 years experience in this industry</h2>
          </div>
        </div>
        <div class="max-md:col-span-full md:col-span-6 max-w-[590px] py-10">
          <p>
            Lorem ipsum dolor sit amet consectetur. Nulla lobortis lacus nunc pulvinar amet. Id dignissim ipsum quis
            varius. Accumsan ultricies dapibus rutrum parturient mauris at est habitasse.
            <br />
            <br />
            Risus egestas neque. Nunc diam arcu purus egestas at dignissim nunc. In nec donec sed pretium donec eros
            elementum. Nec bibendum vel odio convallis feugiat viverra rhoncus in risus. Pretium ante nibh morbi sed
            consequat sem quam pharetra. Et cursus mattis senectus aliquet.
          </p>
        </div>
      </div>
    </div>
  </section>


  <section class="  max-md:py-25 py-150 ">
    <div class="container ">
      <div class="mb-12 text-center max-w-[475px] mx-auto">
        <p class="section-tagline">Our Value</p>

        <h2>Our business is steered by our core values</h2>
      </div>

      <div class="relative z-10">
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
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
        <div class=" grid grid-cols-3 max-md:grid-cols-1 gap-8">
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
            <div
              class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center h-full"
            >
              <img
                src="{{asset('assets/images/about/passion.svg')}}"
                alt="value image"
                class="inline-block dark:hidden mb-6"
              />
              <img
                src="{{asset('assets/images/about/passion-dark.svg')}}"
                alt="value image"
                class="hidden dark:inline-block mb-6"
              />
              <h3 class="mb-2.5">Our Passion</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>

          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div
              class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center h-full"
            >
              <img
                src="{{asset('assets/images/about/transparency.svg')}}"
                alt="value image"
                class="inline-block dark:hidden mb-6"
              />
              <img
                src="{{asset('assets/images/about/transparency-dark.svg')}}"
                alt="value image"
                class="hidden dark:inline-block mb-6"
              />
              <h3 class="mb-2.5">Transparency</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>

          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5">
            <div
              class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-10 text-center h-full"
            >
              <img
                src="{{asset('assets/images/about/mission.svg')}}"
                alt="value image"
                class="inline-block dark:hidden mb-6"
              />
              <img
                src="{{asset('assets/images/about/mission-dark.svg')}}"
                alt="value image"
                class="hidden dark:inline-block mb-6"
              />
              <h3 class="mb-2.5">Our Mission</h3>
              <p>The prevailing view asumed lorem ipsum was born as nonsense text.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class=" overflow-hidden relative pb-150  max-md:pb-25 ">
    <div class="container relative z-10">
      <div class="grid grid-cols-2 max-md:grid-cols-1 gap-10 1xl:gap-x-24 items-center">
        <div class="relative flex max-md:justify-center justify-end items-center">
          <img
            src="{{asset('assets/images/about/onlinePayment.png')}}"
            alt="banking image"
            class="dark:hidden max-w-[250px] lg:max-w-[320px] xl:max-w-[420px]"
          />
          <img
            src="{{asset('assets/images/about/onlinePayment-dark.png')}}"
            alt="banking image"
            class="hidden dark:inline-block  max-w-[250px] lg:max-w-[320px] xl:max-w-[420px]"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-once="true"
          />
          <div
            class="absolute left-0 right-auto bottom-8 top-auto max-w-[180px] md:max-w-[250px] xl:max-w-[344px]"
            data-aos="fade-right"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-once="true"
          >
            <img
              src="{{asset('assets/images/about/onlinePayment-shape.png')}}"
              alt="banking image"
              class="dark:hidden"
            />
            <img
              src="{{asset('assets/images/about/onlinePayment-shape-dark.png')}}"
              alt="banking image"
              class="hidden dark:inline-block "
            />
          </div>

          <div class="absolute left-0 right-auto bottom-8 top-auto max-w-[180px] md:max-w-[250px] xl:max-w-[344px]"></div>
        </div>

        <div>
          <p class="section-tagline">Core Value</p>

          <h2 class="mb-8">The philosophy that underpins our organization.</h2>
          <p class="mb-11">
            Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text nothing Before & After
            magazine.
          </p>
          <ul class="mb-14 [&>*:not(:last-child)]:mb-6 ">
            <li class="flex items-center gap-x-2 ">
              <span
                class=" relative  rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center gap-6"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="30"
                  height="30"
                  viewBox="0 0 30 30"
                  fill="none"
                >
                  <circle
                    cx="15"
                    cy="15"
                    r="14"
                    fill=""
                    class="fill-[#E6FFB1] dark:fill-[#3B3C39]"
                  />
                  <path
                    d="M15 0C6.75 0 0 6.75 0 15C0 23.25 6.75 30 15 30C23.25 30 30 23.25 30 15C30 6.75 23.25 0 15 0ZM16.125 1.25C20.5 1.625 24.25 4 26.5 7.5H12.375L16.125 1.25ZM18.375 8.75L22.125 15L18.375 21.25H11.5L7.875 14.75L11.625 8.75H18.375ZM14.75 1.25L7.25 13.5L3.625 7.25C6.125 3.75 10.125 1.375 14.75 1.25ZM1.25 15C1.25 12.625 1.875 10.375 2.875 8.5L10.125 21.25H2.75C1.75 19.375 1.25 17.25 1.25 15ZM13.875 28.75C9.5 28.375 5.75 26 3.5 22.5H17.625L13.875 28.75ZM15.375 28.75L23 16.25L26.75 22.375C24.25 26.125 20.125 28.625 15.375 28.75ZM19.875 8.75H27.25C28.25 10.625 28.75 12.75 28.75 15C28.75 17.125 28.25 19.25 27.375 21L19.875 8.75Z"
                    fill=""
                    class="fill-paragraph dark:fill-primary"
                  />
                </svg>
              </span>
              <span class="dark:text-white"> Income and expenses tracker </span>
            </li>
            <li class="flex items-center gap-x-2">
              <span class=" relative  rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="28"
                  height="30"
                  viewBox="0 0 28 30"
                  fill="none"
                >
                  <path
                    d="M11 1.5C12.2 0.7 13.5 0.5 14 0.5C14.8 0.5 15.6667 0.833333 16 1C18 2.16667 22.5 4.8 24.5 6C26.5 7.2 27.3333 9.16667 27.5 10V19C27.5 21.4 26.1667 23 25.5 23.5C23.5 24.6667 19 27.3 17 28.5C15 29.7 12.8333 29.3333 12 29C9.33333 27.5 3.7 24.3 2.5 23.5C1.3 22.7 0.666667 20.5 0.5 19.5V10.5C0.5 8.9 1.83333 7.16667 2.5 6.5C4.83333 5.16667 9.8 2.3 11 1.5Z"
                    fill=""
                    class="fill-[#E6FFB1] dark:fill-[#3B3C39]"
                  />
                  <path
                    d="M25.095 5.53842L17.072 0.834716C15.1751 -0.278239 12.8189 -0.278239 10.922 0.834716L2.90499 5.53842C1.11547 6.5928 0 8.51411 0 10.5584V19.4445C0 21.4888 1.11547 23.4101 2.90499 24.4645L10.922 29.1682C11.8705 29.7247 12.9323 30 14 30C15.0677 30 16.1295 29.7188 17.078 29.1682L25.095 24.4645C26.8845 23.416 28 21.4888 28 19.4445V10.5584C27.994 8.51411 26.8845 6.5928 25.095 5.53842ZM3.55518 6.61037L11.5722 1.90667C13.0695 1.02802 14.9246 1.02802 16.4218 1.90667L24.4389 6.61037C24.9638 6.92082 25.4171 7.31914 25.775 7.78776L14 14.2839L2.219 7.79362C2.58287 7.325 3.03025 6.92082 3.55518 6.61037ZM3.55518 23.3867C2.14742 22.5608 1.27056 21.0495 1.27056 19.4445V10.5584C1.27056 9.97852 1.38389 9.41033 1.59864 8.88314L13.3617 15.3676V28.7055C12.7414 28.6235 12.1329 28.4184 11.5722 28.0904L3.55518 23.3867ZM26.7235 19.4445C26.7235 21.0495 25.8466 22.5608 24.4389 23.3867L16.4218 28.0904C15.8611 28.4184 15.2527 28.6235 14.6323 28.7055V15.3617L26.3954 8.87728C26.6101 9.40447 26.7235 9.97266 26.7235 10.5526V19.4445Z"
                    fill=""
                    class="fill-paragraph dark:fill-primary"
                  />
                </svg>
              </span>
              <span class="dark:text-white"> Automated invoicing </span>
            </li>
            <li class="flex items-center gap-x-2 ">
              <span class=" relative  rounded-full bg-white dark:bg-dark-200 shadow-icon flex item-center justify-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="28"
                  height="30"
                  viewBox="0 0 28 30"
                  fill="none"
                >
                  <path
                    d="M9.99965 3C11.5997 1 13.333 0.5 13.9997 0.5C15.5996 0.5 16.9997 1.83333 17.4998 2.5C19.8331 5 24.8998 10.6 26.4998 13C28.0998 15.4 27.1664 17.6667 26.4998 18.5C23.9998 21.1667 18.4998 26.9 16.4998 28.5C14.4998 30.1 12.6664 29.5 11.9998 29C9.16639 26.5 3.09965 20.9 1.49965 18.5C-0.100346 16.1 0.832987 13.8333 1.49965 13C3.66632 10.5 8.39965 5 9.99965 3Z"
                    fill=""
                    class="fill-[#E6FFB1] dark:fill-[#3B3C39]"
                  />
                  <path
                    d="M0.0068501 16.2598C0.0068501 16.2656 0.0068501 16.2715 0.0068501 16.2598V16.2598ZM27.9943 16.2363C27.8869 17.5078 27.3381 18.9609 26.3897 19.957L17.335 28.6289C16.4641 29.5078 15.283 30 14.0125 30C12.742 30 11.5549 29.5078 10.6781 28.6172L1.63527 19.9805C0.674921 18.9727 0.120184 17.5195 0.0068501 16.2422C-0.0587641 14.9063 0.346851 13.5469 1.22966 12.416L10.4156 1.66406C11.3044 0.603516 12.6107 0 14.0065 0C15.4083 0 16.7146 0.609375 17.6034 1.66992L26.7536 12.3984C27.6483 13.541 28.0539 14.9004 27.9943 16.2363ZM1.28931 15.5684L8.19073 14.4434L13.0521 1.38867C12.4079 1.57617 11.8353 1.94531 11.3999 2.46094L11.3939 2.4668L2.21984 13.2012C1.67106 13.9043 1.36089 14.7305 1.28931 15.5684ZM13.3742 19.2363L8.49494 15.6621L1.35492 16.8223C1.51598 17.6484 1.91563 18.4453 2.54194 19.1074L11.5728 27.7324C12.0739 28.2363 12.6942 28.5645 13.3742 28.6934V19.2363ZM18.5876 14.7773L14.0125 2.44336L9.4195 14.7715L14.0125 18.1348L18.5876 14.7773ZM26.6522 16.8223L19.5121 15.6563L14.6507 19.2305V28.6875C15.3307 28.5586 15.9511 28.2363 16.4402 27.7383L25.489 19.0781C26.1034 18.4336 26.4911 17.6484 26.6522 16.8223ZM26.7118 15.5684C26.6343 14.7246 26.3241 13.8984 25.7634 13.1777L16.6251 2.4668C16.1897 1.94531 15.6111 1.57031 14.9669 1.38867L19.8104 14.4434L26.7118 15.5684ZM27.9943 16.2363C28.0002 16.2246 28.0002 16.2949 27.9943 16.2363V16.2363Z"
                    fill=""
                    class="fill-paragraph dark:fill-primary"
                  />
                </svg>
              </span>

              <span class="dark:text-white"> Crypto connection </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <section class=" pb-150   relative @@topSpacing ">
    <div class="container relative">
      <div class="text-center max-w-[550px] mx-auto ">
        <p class="section-tagline">Testimonials</p>
        <h2>What our customer’s say about our company</h2>
      </div>
      <div class="relative z-10">
        <div class="absolute left-1/2 top-[37%] -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
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
          class=" !py-16 !px-6 swiper "
          id="testionial"
        >
          <div class="swiper-wrapper">
            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
              <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
                <img
                  src="{{asset('assets/images/testimonial/bodygroup.svg')}}"
                  alt="service logo"
                  class="inline-block dark:hidden mb-6"
                />
                <img
                  src="{{asset('assets/images/testimonial/bodygroup-dark.svg')}}"
                  alt="service logo"
                  class="hidden dark:inline-block mb-6"
                />
                <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                  “Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin
                  though it looks like it, and it actually says nothing.”
                </blockquote>
                <div class="mb-7">
                  <i class="fa-solid fa-star text-paragraph dark:!text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
                </div>

                <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                  <img
                    src="{{asset('assets/images/testimonial/avatar1.png')}}"
                    alt="avatar"
                    class="mr-4 rounded-full"
                  />
                  <div class="block">
                    <h3 class="text-base font-semibold">Robert Frost</h3>
                    <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                      Lead Designer
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
              <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
                <img
                  src="{{asset('assets/images/testimonial/caudile.svg')}}"
                  alt="service logo"
                  class="inline-block dark:hidden mb-6"
                />
                <img
                  src="{{asset('assets/images/testimonial/caudile-dark.svg')}}"
                  alt="service logo"
                  class="hidden dark:inline-block mb-6"
                />
                <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                  “Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin
                  though it looks like it, and it actually says nothing.”
                </blockquote>
                <div class="mb-7">
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
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
                    <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                      Developer
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
              <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
                <img
                  src="{{asset('assets/images/testimonial/axeptio.svg')}}"
                  alt="service logo"
                  class="inline-block dark:hidden mb-6"
                />
                <img
                  src="{{asset('assets/images/testimonial/axeptio-dark.svg')}}"
                  alt="service logo"
                  class="hidden dark:inline-block mb-6"
                />
                <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                  “Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin
                  though it looks like it, and it actually says nothing.”
                </blockquote>
                <div class="mb-7">
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
                </div>

                <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                  <img
                    src="{{asset('assets/images/testimonial/avatar3.png')}}"
                    alt="avatar"
                    class="mr-4 rounded-full"
                  />
                  <div class="block">
                    <h3 class="text-base font-semibold">Cody Fisher</h3>
                    <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                      UI Designer
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
              <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7 ">
                <img
                  src="{{asset('assets/images/testimonial/infinity.svg')}}"
                  alt="service logo"
                  class="inline-block dark:hidden mb-6"
                />
                <img
                  src="{{asset('assets/images/testimonial/infinity-dark.svg')}}"
                  alt="service logo"
                  class="hidden dark:inline-block mb-6"
                />
                <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                  “Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin
                  though it looks like it, and it actually says nothing.”
                </blockquote>
                <div class="mb-7">
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
                </div>

                <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                  <img
                    src="{{asset('assets/images/testimonial/avatar4.png')}}"
                    alt="avatar"
                    class="mr-4 rounded-full"
                  />
                  <div class="block">
                    <h3 class="text-base font-semibold">Albert Flores</h3>
                    <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">Officer</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 swiper-slide shadow-nav">
              <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7">
                <img
                  src="{{asset('assets/images/testimonial/mfinity.svg')}}"
                  alt="service logo"
                  class="inline-block dark:hidden mb-6"
                />
                <img
                  src="{{asset('assets/images/testimonial/mfinity-dark.svg')}}"
                  alt="service logo"
                  class="hidden dark:inline-block mb-6"
                />
                <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                  “Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin
                  though it looks like it, and it actually says nothing.”
                </blockquote>
                <div class="mb-7">
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-paragraph dark:text-rating"></i>
                  <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i>
                </div>

                <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                  <img
                    src="{{asset('assets/images/testimonial/avatar5.png')}}"
                    alt="avatar"
                    class="mr-4 rounded-full"
                  />
                  <div class="block">
                    <h3 class="text-base font-semibold">Floyed Miles</h3>
                    <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                      Junior Designer
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
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
                data-value="60"
              >
              </span
              ><span class="percent">%</span>
            </h2>
            <p class="font-jakarta_sans text-light">Project Completed</p>
          </div>
          <div class="flex flex-col items-center justify-center relative">
            <h2 class="text-[48px]">
              <span
                class="counter"
                data-value="30"
              >
              </span
              ><span class="percent">+</span>
            </h2>
            <p class="font-jakarta_sans text-light">Team Members</p>
          </div>
          <div class="flex flex-col items-center justify-center relative">
            <h2 class="text-[48px]">
              <span
                class="counter"
                data-value="40"
              >
              </span
              ><span class="percent">K</span>
            </h2>
            <p class="font-jakarta_sans text-light">Satisfied Clients</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="bg-white dark:bg-dark-300 pb-[170px] pt-150 max-md:pb-25 max-md:pt-25 ">
    <div class="container">
      <div class="mb-12 text-center max-w-[475px] mx-auto">
        <p class="section-tagline">Our Team</p>

        <h2>Our leading, strong and creative team</h2>
      </div>

      <div class="relative z-10">
        <div
          class="absolute left-1/2 max-md:top-0 md:top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10"
        >
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
        <div class=" grid grid-cols-3 max-md:grid-cols-1 gap-8">
          <div class="group/image">
            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 mb-6">
              <div class=" rounded bg-gray-100 dark:bg-[#30302F] overflow-hidden">
                <img
                  src="{{asset('assets/images/team/team1.png')}}"
                  alt="team member image"
                  class="grayscale group-hover/image:grayscale-0 duration-300 transition-all"
                />
              </div>
            </div>
            <div class="text-center">
              <a href="team-single.html"><h3 class="mb-2">Kristin Watson</h3></a>
              <p class="text-sm font-medium leading-[1.5] mb-6">Project Manager</p>
              <ul class="flex items-center gap-x-2.5 justify-center">
                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke="#464745"
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M28.75 20.0535C28.75 15.1914 24.8325 11.25 20 11.25C15.1675 11.25 11.25 15.1914 11.25 20.0535C11.25 24.4475 14.4497 28.0896 18.6328 28.75V22.5982H16.4111V20.0535H18.6328V18.114C18.6328 15.9076 19.9392 14.6889 21.9378 14.6889C22.8948 14.6889 23.8965 14.8608 23.8965 14.8608V17.0273H22.7932C21.7063 17.0273 21.3672 17.7059 21.3672 18.4028V20.0535H23.7939L23.406 22.5982H21.3672V28.75C25.5503 28.0896 28.75 24.4475 28.75 20.0535Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M20 11.25C15.1695 11.25 11.25 15.1695 11.25 20C11.25 24.8305 15.1695 28.75 20 28.75C24.821 28.75 28.75 24.8305 28.75 20C28.75 15.1695 24.821 11.25 20 11.25ZM25.7795 15.2834C26.8235 16.555 27.4499 18.1779 27.4688 19.9336C27.2221 19.8861 24.7546 19.3831 22.2682 19.6963C22.2112 19.5729 22.1638 19.4401 22.1068 19.3072C21.955 18.9466 21.7842 18.5765 21.6133 18.2253C24.3655 17.1055 25.6182 15.4921 25.7795 15.2834ZM20 12.5407C21.898 12.5407 23.6347 13.2524 24.9539 14.4197C24.821 14.6095 23.6917 16.1185 21.0344 17.115C19.8102 14.8658 18.4531 13.0247 18.2443 12.74C18.8042 12.6071 19.3926 12.5407 20 12.5407ZM16.8208 13.2429C17.0201 13.5087 18.3487 15.3593 19.5919 17.561C16.0995 18.4911 13.0152 18.4721 12.683 18.4721C13.167 16.1565 14.7329 14.2299 16.8208 13.2429ZM12.5217 20.0095C12.5217 19.9336 12.5217 19.8576 12.5217 19.7817C12.8444 19.7912 16.4696 19.8387 20.1993 18.7188C20.4176 19.1364 20.6169 19.5634 20.8067 19.9905C20.7118 20.019 20.6074 20.0475 20.5125 20.0759C16.6594 21.3191 14.6095 24.7166 14.4387 25.0013C13.2524 23.6822 12.5217 21.9265 12.5217 20.0095ZM20 27.4783C18.2727 27.4783 16.6784 26.8899 15.4162 25.9029C15.5491 25.6277 17.0675 22.7047 21.2812 21.2338C21.3001 21.2242 21.3097 21.2242 21.3286 21.2148C22.382 23.9384 22.8091 26.2256 22.923 26.8804C22.0214 27.2695 21.0344 27.4783 20 27.4783ZM24.1662 26.1971C24.0903 25.7416 23.6917 23.5588 22.7142 20.8731C25.0583 20.503 27.1082 21.1104 27.3644 21.1958C27.0418 23.2741 25.846 25.0678 24.1662 26.1971Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M20 11.25C15.1656 11.25 11.25 15.1656 11.25 20C11.25 23.8719 13.7547 27.1422 17.2328 28.3016C17.6703 28.3781 17.8344 28.1156 17.8344 27.8859C17.8344 27.6781 17.8234 26.9891 17.8234 26.2563C15.625 26.6609 15.0562 25.7203 14.8812 25.2281C14.7828 24.9766 14.3563 24.2 13.9844 23.9922C13.6781 23.8281 13.2406 23.4234 13.9734 23.4125C14.6625 23.4016 15.1547 24.0469 15.3187 24.3094C16.1063 25.6328 17.3641 25.2609 17.8672 25.0312C17.9438 24.4625 18.1734 24.0797 18.425 23.8609C16.4781 23.6422 14.4438 22.8875 14.4438 19.5406C14.4438 18.5891 14.7828 17.8016 15.3406 17.1891C15.2531 16.9703 14.9469 16.0734 15.4281 14.8703C15.4281 14.8703 16.1609 14.6406 17.8344 15.7672C18.5344 15.5703 19.2781 15.4719 20.0219 15.4719C20.7656 15.4719 21.5094 15.5703 22.2094 15.7672C23.8828 14.6297 24.6156 14.8703 24.6156 14.8703C25.0969 16.0734 24.7906 16.9703 24.7031 17.1891C25.2609 17.8016 25.6 18.5781 25.6 19.5406C25.6 22.8984 23.5547 23.6422 21.6078 23.8609C21.925 24.1344 22.1984 24.6594 22.1984 25.4797C22.1984 26.65 22.1875 27.5906 22.1875 27.8859C22.1875 28.1156 22.3516 28.3891 22.7891 28.3016C24.5261 27.7152 26.0355 26.5988 27.1048 25.1096C28.1741 23.6204 28.7495 21.8333 28.75 20C28.75 15.1656 24.8344 11.25 20 11.25Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M19.9997 11C16.3576 11 13.0763 13.1938 11.6841 16.5547C10.2919 19.9156 11.0607 23.7875 13.6341 26.3609C16.2076 28.9344 20.0794 29.7031 23.4404 28.3109C26.806 26.9234 28.9997 23.6422 28.9997 20C28.9997 15.0312 24.9685 11 19.9997 11ZM17.3841 24.7391H15.4201V18.4109H17.3841V24.7391ZM16.3997 17.5484C15.9357 17.5484 15.5185 17.2719 15.3404 16.8453C15.1622 16.4187 15.256 15.9266 15.5841 15.5984C15.9076 15.2703 16.3997 15.1719 16.8263 15.3453C17.2529 15.5187 17.5341 15.9359 17.5388 16.3953C17.5388 17.0328 17.0326 17.5437 16.3997 17.5484ZM24.7388 24.7391H22.7747V21.6594C22.7747 20.9234 22.7607 19.9859 21.7529 19.9859C20.7451 19.9859 20.5669 20.7828 20.5669 21.6078V24.7391H18.6122V18.4109H20.4966V19.2734H20.5247C20.7872 18.7766 21.4247 18.2516 22.381 18.2516C24.3685 18.2516 24.7341 19.5594 24.7341 21.2609V24.7391H24.7388Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="group/image">
            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 mb-6">
              <div class=" rounded bg-gray-100 dark:bg-[#30302F] overflow-hidden">
                <img
                  src="{{asset('assets/images/team/team2.png')}}"
                  alt="team member image"
                  class="grayscale group-hover/image:grayscale-0 duration-300 transition-all"
                />
              </div>
            </div>
            <div class="text-center">
              <a href="team-single.html"><h3 class="mb-2">Cody Fisher</h3></a>
              <p class="text-sm font-medium leading-[1.5] mb-6">Art Director</p>
              <ul class="flex items-center gap-x-2.5 justify-center">
                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke="#464745"
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M28.75 20.0535C28.75 15.1914 24.8325 11.25 20 11.25C15.1675 11.25 11.25 15.1914 11.25 20.0535C11.25 24.4475 14.4497 28.0896 18.6328 28.75V22.5982H16.4111V20.0535H18.6328V18.114C18.6328 15.9076 19.9392 14.6889 21.9378 14.6889C22.8948 14.6889 23.8965 14.8608 23.8965 14.8608V17.0273H22.7932C21.7063 17.0273 21.3672 17.7059 21.3672 18.4028V20.0535H23.7939L23.406 22.5982H21.3672V28.75C25.5503 28.0896 28.75 24.4475 28.75 20.0535Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M20 11.25C15.1695 11.25 11.25 15.1695 11.25 20C11.25 24.8305 15.1695 28.75 20 28.75C24.821 28.75 28.75 24.8305 28.75 20C28.75 15.1695 24.821 11.25 20 11.25ZM25.7795 15.2834C26.8235 16.555 27.4499 18.1779 27.4688 19.9336C27.2221 19.8861 24.7546 19.3831 22.2682 19.6963C22.2112 19.5729 22.1638 19.4401 22.1068 19.3072C21.955 18.9466 21.7842 18.5765 21.6133 18.2253C24.3655 17.1055 25.6182 15.4921 25.7795 15.2834ZM20 12.5407C21.898 12.5407 23.6347 13.2524 24.9539 14.4197C24.821 14.6095 23.6917 16.1185 21.0344 17.115C19.8102 14.8658 18.4531 13.0247 18.2443 12.74C18.8042 12.6071 19.3926 12.5407 20 12.5407ZM16.8208 13.2429C17.0201 13.5087 18.3487 15.3593 19.5919 17.561C16.0995 18.4911 13.0152 18.4721 12.683 18.4721C13.167 16.1565 14.7329 14.2299 16.8208 13.2429ZM12.5217 20.0095C12.5217 19.9336 12.5217 19.8576 12.5217 19.7817C12.8444 19.7912 16.4696 19.8387 20.1993 18.7188C20.4176 19.1364 20.6169 19.5634 20.8067 19.9905C20.7118 20.019 20.6074 20.0475 20.5125 20.0759C16.6594 21.3191 14.6095 24.7166 14.4387 25.0013C13.2524 23.6822 12.5217 21.9265 12.5217 20.0095ZM20 27.4783C18.2727 27.4783 16.6784 26.8899 15.4162 25.9029C15.5491 25.6277 17.0675 22.7047 21.2812 21.2338C21.3001 21.2242 21.3097 21.2242 21.3286 21.2148C22.382 23.9384 22.8091 26.2256 22.923 26.8804C22.0214 27.2695 21.0344 27.4783 20 27.4783ZM24.1662 26.1971C24.0903 25.7416 23.6917 23.5588 22.7142 20.8731C25.0583 20.503 27.1082 21.1104 27.3644 21.1958C27.0418 23.2741 25.846 25.0678 24.1662 26.1971Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M20 11.25C15.1656 11.25 11.25 15.1656 11.25 20C11.25 23.8719 13.7547 27.1422 17.2328 28.3016C17.6703 28.3781 17.8344 28.1156 17.8344 27.8859C17.8344 27.6781 17.8234 26.9891 17.8234 26.2563C15.625 26.6609 15.0562 25.7203 14.8812 25.2281C14.7828 24.9766 14.3563 24.2 13.9844 23.9922C13.6781 23.8281 13.2406 23.4234 13.9734 23.4125C14.6625 23.4016 15.1547 24.0469 15.3187 24.3094C16.1063 25.6328 17.3641 25.2609 17.8672 25.0312C17.9438 24.4625 18.1734 24.0797 18.425 23.8609C16.4781 23.6422 14.4438 22.8875 14.4438 19.5406C14.4438 18.5891 14.7828 17.8016 15.3406 17.1891C15.2531 16.9703 14.9469 16.0734 15.4281 14.8703C15.4281 14.8703 16.1609 14.6406 17.8344 15.7672C18.5344 15.5703 19.2781 15.4719 20.0219 15.4719C20.7656 15.4719 21.5094 15.5703 22.2094 15.7672C23.8828 14.6297 24.6156 14.8703 24.6156 14.8703C25.0969 16.0734 24.7906 16.9703 24.7031 17.1891C25.2609 17.8016 25.6 18.5781 25.6 19.5406C25.6 22.8984 23.5547 23.6422 21.6078 23.8609C21.925 24.1344 22.1984 24.6594 22.1984 25.4797C22.1984 26.65 22.1875 27.5906 22.1875 27.8859C22.1875 28.1156 22.3516 28.3891 22.7891 28.3016C24.5261 27.7152 26.0355 26.5988 27.1048 25.1096C28.1741 23.6204 28.7495 21.8333 28.75 20C28.75 15.1656 24.8344 11.25 20 11.25Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M19.9997 11C16.3576 11 13.0763 13.1938 11.6841 16.5547C10.2919 19.9156 11.0607 23.7875 13.6341 26.3609C16.2076 28.9344 20.0794 29.7031 23.4404 28.3109C26.806 26.9234 28.9997 23.6422 28.9997 20C28.9997 15.0312 24.9685 11 19.9997 11ZM17.3841 24.7391H15.4201V18.4109H17.3841V24.7391ZM16.3997 17.5484C15.9357 17.5484 15.5185 17.2719 15.3404 16.8453C15.1622 16.4187 15.256 15.9266 15.5841 15.5984C15.9076 15.2703 16.3997 15.1719 16.8263 15.3453C17.2529 15.5187 17.5341 15.9359 17.5388 16.3953C17.5388 17.0328 17.0326 17.5437 16.3997 17.5484ZM24.7388 24.7391H22.7747V21.6594C22.7747 20.9234 22.7607 19.9859 21.7529 19.9859C20.7451 19.9859 20.5669 20.7828 20.5669 21.6078V24.7391H18.6122V18.4109H20.4966V19.2734H20.5247C20.7872 18.7766 21.4247 18.2516 22.381 18.2516C24.3685 18.2516 24.7341 19.5594 24.7341 21.2609V24.7391H24.7388Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="group/image">
            <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 mb-6">
              <div class=" rounded bg-gray-100 dark:bg-[#30302F] overflow-hidden">
                <img
                  src="{{asset('assets/images/team/team3.png')}}"
                  alt="team member image"
                  class="grayscale group-hover/image:grayscale-0 duration-300 transition-all"
                />
              </div>
            </div>
            <div class="text-center">
              <a href="team-single.html"><h3 class="mb-2">Guy Hawkins</h3></a>
              <p class="text-sm font-medium leading-[1.5] mb-6">Lead Designer</p>
              <ul class="flex items-center gap-x-2.5 justify-center">
                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke="#464745"
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M28.75 20.0535C28.75 15.1914 24.8325 11.25 20 11.25C15.1675 11.25 11.25 15.1914 11.25 20.0535C11.25 24.4475 14.4497 28.0896 18.6328 28.75V22.5982H16.4111V20.0535H18.6328V18.114C18.6328 15.9076 19.9392 14.6889 21.9378 14.6889C22.8948 14.6889 23.8965 14.8608 23.8965 14.8608V17.0273H22.7932C21.7063 17.0273 21.3672 17.7059 21.3672 18.4028V20.0535H23.7939L23.406 22.5982H21.3672V28.75C25.5503 28.0896 28.75 24.4475 28.75 20.0535Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M20 11.25C15.1695 11.25 11.25 15.1695 11.25 20C11.25 24.8305 15.1695 28.75 20 28.75C24.821 28.75 28.75 24.8305 28.75 20C28.75 15.1695 24.821 11.25 20 11.25ZM25.7795 15.2834C26.8235 16.555 27.4499 18.1779 27.4688 19.9336C27.2221 19.8861 24.7546 19.3831 22.2682 19.6963C22.2112 19.5729 22.1638 19.4401 22.1068 19.3072C21.955 18.9466 21.7842 18.5765 21.6133 18.2253C24.3655 17.1055 25.6182 15.4921 25.7795 15.2834ZM20 12.5407C21.898 12.5407 23.6347 13.2524 24.9539 14.4197C24.821 14.6095 23.6917 16.1185 21.0344 17.115C19.8102 14.8658 18.4531 13.0247 18.2443 12.74C18.8042 12.6071 19.3926 12.5407 20 12.5407ZM16.8208 13.2429C17.0201 13.5087 18.3487 15.3593 19.5919 17.561C16.0995 18.4911 13.0152 18.4721 12.683 18.4721C13.167 16.1565 14.7329 14.2299 16.8208 13.2429ZM12.5217 20.0095C12.5217 19.9336 12.5217 19.8576 12.5217 19.7817C12.8444 19.7912 16.4696 19.8387 20.1993 18.7188C20.4176 19.1364 20.6169 19.5634 20.8067 19.9905C20.7118 20.019 20.6074 20.0475 20.5125 20.0759C16.6594 21.3191 14.6095 24.7166 14.4387 25.0013C13.2524 23.6822 12.5217 21.9265 12.5217 20.0095ZM20 27.4783C18.2727 27.4783 16.6784 26.8899 15.4162 25.9029C15.5491 25.6277 17.0675 22.7047 21.2812 21.2338C21.3001 21.2242 21.3097 21.2242 21.3286 21.2148C22.382 23.9384 22.8091 26.2256 22.923 26.8804C22.0214 27.2695 21.0344 27.4783 20 27.4783ZM24.1662 26.1971C24.0903 25.7416 23.6917 23.5588 22.7142 20.8731C25.0583 20.503 27.1082 21.1104 27.3644 21.1958C27.0418 23.2741 25.846 25.0678 24.1662 26.1971Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M20 11.25C15.1656 11.25 11.25 15.1656 11.25 20C11.25 23.8719 13.7547 27.1422 17.2328 28.3016C17.6703 28.3781 17.8344 28.1156 17.8344 27.8859C17.8344 27.6781 17.8234 26.9891 17.8234 26.2563C15.625 26.6609 15.0562 25.7203 14.8812 25.2281C14.7828 24.9766 14.3563 24.2 13.9844 23.9922C13.6781 23.8281 13.2406 23.4234 13.9734 23.4125C14.6625 23.4016 15.1547 24.0469 15.3187 24.3094C16.1063 25.6328 17.3641 25.2609 17.8672 25.0312C17.9438 24.4625 18.1734 24.0797 18.425 23.8609C16.4781 23.6422 14.4438 22.8875 14.4438 19.5406C14.4438 18.5891 14.7828 17.8016 15.3406 17.1891C15.2531 16.9703 14.9469 16.0734 15.4281 14.8703C15.4281 14.8703 16.1609 14.6406 17.8344 15.7672C18.5344 15.5703 19.2781 15.4719 20.0219 15.4719C20.7656 15.4719 21.5094 15.5703 22.2094 15.7672C23.8828 14.6297 24.6156 14.8703 24.6156 14.8703C25.0969 16.0734 24.7906 16.9703 24.7031 17.1891C25.2609 17.8016 25.6 18.5781 25.6 19.5406C25.6 22.8984 23.5547 23.6422 21.6078 23.8609C21.925 24.1344 22.1984 24.6594 22.1984 25.4797C22.1984 26.65 22.1875 27.5906 22.1875 27.8859C22.1875 28.1156 22.3516 28.3891 22.7891 28.3016C24.5261 27.7152 26.0355 26.5988 27.1048 25.1096C28.1741 23.6204 28.7495 21.8333 28.75 20C28.75 15.1656 24.8344 11.25 20 11.25Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>

                <li>
                  <a
                    href="#"
                    class="group duration-500 transition-colors hover:transition-colors hover:duration-500"
                  >
                    <svg
                      width="40"
                      height="40"
                      viewBox="0 0 40 40"
                      fill=""
                      xmlns="http://www.w3.org/2000/svg"
                      class="fill-transparent group-hover:fill-primary  duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors"
                    >
                      <rect
                        x="0.5"
                        y="0.5"
                        width="39"
                        height="39"
                        rx="19.5"
                        stroke=""
                        class="stroke-gray-100 dark:stroke-[#464745] "
                      />
                      <path
                        d="M19.9997 11C16.3576 11 13.0763 13.1938 11.6841 16.5547C10.2919 19.9156 11.0607 23.7875 13.6341 26.3609C16.2076 28.9344 20.0794 29.7031 23.4404 28.3109C26.806 26.9234 28.9997 23.6422 28.9997 20C28.9997 15.0312 24.9685 11 19.9997 11ZM17.3841 24.7391H15.4201V18.4109H17.3841V24.7391ZM16.3997 17.5484C15.9357 17.5484 15.5185 17.2719 15.3404 16.8453C15.1622 16.4187 15.256 15.9266 15.5841 15.5984C15.9076 15.2703 16.3997 15.1719 16.8263 15.3453C17.2529 15.5187 17.5341 15.9359 17.5388 16.3953C17.5388 17.0328 17.0326 17.5437 16.3997 17.5484ZM24.7388 24.7391H22.7747V21.6594C22.7747 20.9234 22.7607 19.9859 21.7529 19.9859C20.7451 19.9859 20.5669 20.7828 20.5669 21.6078V24.7391H18.6122V18.4109H20.4966V19.2734H20.5247C20.7872 18.7766 21.4247 18.2516 22.381 18.2516C24.3685 18.2516 24.7341 19.5594 24.7341 21.2609V24.7391H24.7388Z"
                        fill=""
                        class="fill-paragraph dark:fill-[#7D807B] dark:group-hover:fill-paragraph duration-500 group-hover:duration-500 transition-colors group-hover:transition-colors "
                      />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="relative  pb-20 max-md:pb-25">
    <div class="container relative ">
      <div class="absolute left-1/2 -bottom-[442px] -translate-x-1/2  flex max-md:flex-col -z-10">
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
      <div class=" text-center mx-auto">
        <h2 class="mb-5 text-[48px] font-semibold ">
          Start your best payment <br />
          experience now!
        </h2>
        <p class="mb-12 max-w-[400px] mx-auto">
          By creating a custom Web design for your business, we can bring your vision to life.
        </p>
        <a
          href="contact.html"
          class="btn"
        >
          Get Started Today
        </a>
        <ul class=" flex max-lg:flex-col max-lg:gap-5  items-center justify-between mt-20 max-w-[815px] mx-auto">
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
            <p>Money Back Guarente.</p>
          </li>
        </ul>
      </div>
    </div>
  </section>

@endsection
