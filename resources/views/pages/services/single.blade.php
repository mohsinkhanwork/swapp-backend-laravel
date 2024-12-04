@extends('layouts.app')
@section('content')
    <section class=" pt-[200px] pb-150">
        <div class="container relative z-10">
        <div class="absolute left-1/2 top-52 -translate-x-1/2 flex max-md:flex-col -z-10">
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

        <div class="grid grid-cols-12 gap-y-15 md:gap-8 lg:gap-16 auto-rows-max">
            <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav max-md:col-span-full md:col-span-6 lg:col-span-4 self-start md:sticky md:top-20 max-md:static"
            >
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark pt-9 px-10 pb-7 ">
                <h3 class="mb-3">{{__('index.services')}}</h3>
                <ul
                class="[&>*:not(:last-child)]:border-dashed [&>*:not(:last-child)]:border-gray-100  dark:[&>*:not(:last-child)]:border-borderColour-dark  [&>*:not(:last-child)]:border-b"
                >
                <li class="group {{$slug=='skill-exchange'?'tabActive':''}}">
                    <a
                    class="flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    href="{{route('services.show','skill-exchange')}}"
                    >
                    {{__('index.service1-title')}}
                    <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                <li class="group {{$slug=='messaging-system'?'tabActive':''}}">
                    <a
                    href="{{route('services.show','messaging-system')}}"
                    class="  flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    >
                    {{__('index.service2-title')}} <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                <li class="group {{$slug=='events-management'?'tabActive':''}}">
                    <a
                    href="{{route('services.show','events-management')}}"
                    class="  flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    >
                    {{__('index.service3-title')}} <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                <li class="group {{$slug=='community-forums'?'tabActive':''}}">
                    <a
                    href="{{route('services.show','community-forums')}}"
                    class="  flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    >
                    {{__('index.service4-title')}} <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                <li class="group {{$slug=='skill-verification-process'?'tabActive':''}}">
                    <a
                    href="{{route('services.show','skill-verification-process')}}"
                    class="  flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    >
                    {{__('index.service5-title')}} <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                <li class="group {{$slug=='premium-features'?'tabActive':''}}">
                    <a
                    href="{{route('services.show','premium-features')}}"
                    class=" flex items-center justify-between py-5 font-medium relative before:absolute before:bottom-0 before:left-0 before:h-[1px] before:w-full before:origin-right before:scale-x-0 before:bg-paragraph dark:before:bg-white  before:transition-transform before:duration-500 before:content-[''] before:hover:origin-left before:hover:scale-x-100"
                    >
                    {{__('index.service6-title')}} <i class="fa-solid fa-angle-right hidden group-[.tabActive]:block"></i>
                    </a>
                </li>
                </ul>
            </div>
            </div>

            <div class="relative max-md:col-span-full md:col-span-6 lg:col-span-8">
                <div class="relative singlePage">
                    <h2>{{__("index.$title")}}</h2>
                    <p>
                        {!!__("services.$slug")!!}
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>


    <section id="counter_trusted">
    <div class="container relative">
    <div
        class="grid grid-cols-12 py-10 gap-x-5 gap-y-5 relative after:absolute after:w-full after:h-0.5 after:bg-[url('../images/payment/member-border.svg')] dark:after:bg-[url('../images/payment/member-border-dark.svg')] after:bg-no-repeat after:cover after:bottom-0 after:left-1/2 after:-translate-x-1/2 before:absolute before:w-full before:h-0.5 before:bg-[url('../images/payment/member-border.svg')] dark:before:bg-[url('../images/payment/member-border-dark.svg')] before:bg-no-repeat before:bg-cover before:top-0 before:left-1/2 before:-translate-x-1/2 before:bg-center after:bg-center max-md:before:hidden"
    >
        <div class="max-lg:col-span-full lg:col-span-6">
        <div class="max-w-[550px]">
            <p class="section-tagline">Numbers</p>
            <h2>More than 10 years experience in this industry</h2>
        </div>
        </div>
        <div class="max-md:col-span-full md:col-span-6 lg:col-span-3 py-5">
        <div class="flex items-center">
            <div class="p-2.5 shadow-nav rounded-full w-[110px] h-[110px] bg-white dark:bg-dark-200 mr-6">
            <div
                class=" flex items-center justify-center border border-dashed rounded-full w-[90px] h-[90px] border-gray-100 dark:border-borderColour-dark"
            >
                <h3 class="text-primary dark:text-primary leading-none text-[28px]">
                <span
                    class="text-primary dark:text-primary leading-none text-[28px] counterTrusted"
                    data-value="85"
                ></span
                >%
                </h3>
            </div>
            </div>
            <h3 class="leading-8 ">
            Trusted <br />
            by companies
            </h3>
        </div>
        </div>
        <div class="max-md:col-span-full md:col-span-6 lg:col-span-3 py-5 ">
        <div class="flex items-center">
            <div class="p-2.5 shadow-nav rounded-full w-[110px] h-[110px] bg-white dark:bg-dark-200 mr-6">
            <div
                class=" flex items-center justify-center border border-dashed rounded-full w-[90px] h-[90px] border-gray-100 dark:border-borderColour-dark"
            >
                <h3 class="text-primary dark:text-primary leading-none text-[28px]">
                <span
                    class="text-primary dark:text-primary leading-none text-[28px] counterTrusted"
                    data-value="22"
                ></span
                >M
                </h3>
            </div>
            </div>
            <h3 class="leading-8 ">
            People <br />
            of aplio bank
            </h3>
        </div>
        </div>
    </div>
    </div>
    </section>


    <section class="bg-white dark:bg-dark-300 pt-150 mb-150 ">
    <div class="container ">
    <div class="mb-12 text-center max-w-[475px] mx-auto">
        <div class="sectionHide">
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