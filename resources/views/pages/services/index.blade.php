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
        <p class="mb-4 font-medium uppercase">Our Services</p>
        <h1 class="max-lg:mb-10 mb-10">The world’s best companies trust aplio</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto">Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin, though it looks like it</p>
      </div>
    </div>
  </section>


  <section class="bg-white dark:bg-dark-300 pb-150">
    <div class="container ">
      <div class="relative z-10">
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
          <div
            class="  max-md:h-[750px] max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 blur-[145px]"
          ></div>
          <div
            class=" max-md:h-[750px] max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/25 -ml-[170px] max-md:ml-0 blur-[145px]"
          ></div>
          <div
            class=" max-md:h-[750px] max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/20 -ml-[170px] max-md:ml-0 blur-[145px]"
          ></div>
        </div>
        <div
          class=" grid grid-cols-3 max-md:grid-cols-1 max-lg:grid-cols-2  gap-8"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="1000"
          data-aos-once="true"
        >
        <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav relative max-lg:after:absolute  max-lg:after:h-full max-lg:after:w-full max-lg:after:blur-[80px]  max-lg:after:rounded-full max-lg:after:bg-primary-200/20 max-lg:after:top-0 max-lg:after:left-0 max-lg:after:-z-10 scale-100 hover:scale-105 transition-transform duration-500 hover:transition-transform hover:duration-500">
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


  <section class="bg-white dark:bg-dark-300 pt-150 mb-150 ">
    <div class="container ">
      <div class="mb-12 text-center max-w-[475px] mx-auto">
        <div class="@@sectionHide">
          <p class="section-tagline ">Our Pricing</p>
          <h2>Choose the right plan for your business</h2>
        </div>

        <div class="pricing mt-8">
          <label class="relative inline-flex items-center cursor-pointer z-[110]">
            <span class="mr-2.5 text-base font-semibold text-paragraph dark:text-white">Monthly</span>
            <input
              type="checkbox"
              id="priceCheck"
              class="sr-only peer"
            />
            <div
              class=" relative w-15 h-[34px] bg-paragraph rounded-[20px] peer-checked:after:translate-x-full  after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:start-[5px] peer-checked:after:start-[7px] after:bg-primary  after:rounded-full after:h-6 after:w-6 after:transition-all before:absolute before:content-[''] before:border before:border-dashed before:w-[calc(100%-10px)] before:h-[calc(100%-10px)] before:rounded-[20px] before:top-1/2 before:-translate-y-1/2 before:left-1/2 before:-translate-x-1/2 before:border-white/40 "
            ></div>
            <span class="ms-2.5 text-base font-semibold text-paragraph dark:text-white">Yearly</span>
          </label>
        </div>
      </div>

      <div class="relative z-10">
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
        <div class=" flex max-lg:flex-col items-center gap-8">
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-8  ">
              <h3 class="mb-2">Basic</h3>
              <p class="mb-6">The prevailing view assumed lorem ipsum was born as a nonsense text.</p>
              <div class="price-month mb-16">
                <h2>$<span>19.00</span></h2>
                <p>Per Month</p>
              </div>
              <div class="price-year mb-16">
                <h2>$<span>230.00</span></h2>
                <p>Per Year</p>
              </div>

              <ul
                class=" relative after:absolute after:-top-12 hafter-h-0.5 after:w-full   after:content-[url('../images/banking/border.svg')] dark:after:content-[url('../images/banking/border-dark.svg')] after:bg-center "
              >
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>

                  <span>Track income & expenses</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Send custom invoices & quotes</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Connect your bank</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Insights & reports</span>
                </li>
              </ul>

              <a
                href="contact.html"
                class="btn-outline dark:bg-transparent text-center py-3 w-full"
              >
                Start Free Trial
              </a>
            </div>
          </div>
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div
              class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-8 lg:px-8 lg:pt-3 lg:pb-15  "
            >
              <div class="flex justify-end mb-2.5">
                <span class=" -mr-4 bg-primary text-paragraph py-1.5 px-3 rounded-full font-medium"> Save 40% </span>
              </div>
              <h3 class="mb-2">Standard</h3>
              <p class="mb-6">The prevailing view assumed lorem ipsum was born as a nonsense text.</p>
              <div class="price-month mb-16">
                <h2>$<span>32.00</span></h2>
                <p>Per Month</p>
              </div>
              <div class="price-year mb-16">
                <h2>$<span>300.00</span></h2>
                <p>Per Year</p>
              </div>

              <ul
                class=" relative after:absolute after:-top-12 hafter-h-0.5 after:w-full   after:content-[url('../images/banking/border.svg')] dark:after:content-[url('../images/banking/border-dark.svg')] after:bg-center "
              >
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Track income & expenses</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Send custom invoices & quotes</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Connect your bank</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Insights & reports</span>
                </li>
              </ul>

              <a
                href="#"
                class="btn  text-center py-3 w-full "
              >
                Get Started Now
              </a>
            </div>
          </div>
          <div class="bg-white dark:bg-dark-200 shadow-box rounded-medium p-2.5 ">
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-8  ">
              <h3 class="mb-2">Premium</h3>
              <p class="mb-6">The prevailing view assumed lorem ipsum was born as a nonsense text.</p>
              <div class="price-month mb-16">
                <h2>$<span>48.00</span></h2>
                <p>Per Month</p>
              </div>
              <div class="price-year mb-16">
                <h2>$<span>500.00</span></h2>
                <p>Per Year</p>
              </div>

              <ul
                class=" relative after:absolute after:-top-12 hafter-h-0.5 after:w-full   after:content-[url('../images/banking/border.svg')] dark:after:content-[url('../images/banking/border-dark.svg')] after:bg-center "
              >
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Track income & expenses</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Send custom invoices & quotes</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Connect your bank</span>
                </li>
                <li class="mb-6 flex items-center gap-3.5">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <rect
                      width="20"
                      height="20"
                      rx="10"
                      fill=""
                      class="fill-primary"
                    />
                    <path
                      d="M9.31661 13.7561L14.7491 8.42144C15.0836 8.0959 15.0836 7.5697 14.7491 7.24416C14.4145 6.91861 13.8736 6.91861 13.539 7.24416L8.7116 11.9901L6.46096 9.78807C6.12636 9.46253 5.58554 9.46253 5.25095 9.78807C4.91635 10.1136 4.91635 10.6398 5.25095 10.9654L8.1066 13.7561C8.27347 13.9184 8.49253 14 8.7116 14C8.93067 14 9.14974 13.9184 9.31661 13.7561Z"
                      fill=""
                      class="fill-paragraph"
                    />
                  </svg>
                  <span>Insights & reports</span>
                </li>
              </ul>

              <a
                href="contact.html"
                class="btn-outline dark:bg-transparent text-center py-3 w-full"
              >
                Get Started Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  @include('components.free-trial')



@endsection
