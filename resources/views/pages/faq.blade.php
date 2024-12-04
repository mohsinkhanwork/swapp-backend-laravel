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
        <p class="mb-4 font-medium uppercase">Faq’s</p>
        <h1 class="max-lg:mb-10 mb-10">Frequently asked <br>  question</h1>
        <p class="max-lg:mb-10 mb-12 max-w-[590px] mx-auto">Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. It's not Latin, though it looks like it</p>
      </div>
    </div>
  </section>


  <section class=" pb-150">
    <div class="container relative z-10">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
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
        class="  max-w-[850px] mx-auto"
        data-aos="fade-up"
        data-aos-offset="200"
        data-aos-duration="1000"
        data-aos-once="true"
      >
        <ul
          class=" faq-tabs flex max-md:flex-col max-w-[530px] mx-auto items-center mb-15 border-b-2 border-white dark:border-borderColour-dark max-md:border-none"
        >
          <li class="group tabActive">
            <a
              class=" py-4 px-7 text-center text-xl font-medium relative after:absolute after:h-0.5 after:w-full after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:origin-right after:scale-x-0 after:bg-paragraph dark:after:bg-white  after:transition-transform after:duration-500 group-[.tabActive]:after:origin-left group-[.tabActive]:after:scale-x-100 -mb-0.5"
              href="#faq-1"
            >
              General
            </a>
          </li>
          <li class="group ">
            <a
              class=" py-4 px-7 text-center text-xl font-medium relative after:absolute after:h-0.5 after:w-full after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:origin-right after:scale-x-0 after:bg-paragraph dark:after:bg-white  after:transition-transform after:duration-500 group-[.tabActive]:after:origin-left group-[.tabActive]:after:scale-x-100 -mb-0.5"
              href="#faq-2"
            >
              Changelog
            </a>
          </li>
          <li class="group ">
            <a
              class=" py-4 px-7 text-center text-xl font-medium relative after:absolute after:h-0.5 after:w-full after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:origin-right after:scale-x-0 after:bg-paragraph dark:after:bg-white  after:transition-transform after:duration-500 group-[.tabActive]:after:origin-left group-[.tabActive]:after:scale-x-100 -mb-0.5"
              href="#faq-3"
            >
              Terms & Condition
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div
            class="tab-pane tabActive"
            id="faq-1"
          >
            <div class="[&>*:not(:last-child)]:mb-5">
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark  cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What is a business agency?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What services does a business agency provide?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How often should I update my website?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header py-3 px-5 flex items-center bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How do subscriptions work?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5  bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold ">Q. What other services are you compatible with?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane"
            id="faq-2"
          >
            <div class="[&>*:not(:last-child)]:mb-5">
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark  cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What is a Changelog?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What services does a business agency provide?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How often should I update my website?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header py-3 px-5 flex items-center bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How do subscriptions work?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5  bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold ">Q. What other services are you compatible with?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane"
            id="faq-3"
          >
            <div class="[&>*:not(:last-child)]:mb-5">
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark  cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What is a Terms And Condition ?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. What services does a business agency provide?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5 bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How often should I update my website?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header py-3 px-5 flex items-center bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold">Q. How do subscriptions work?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
              <div class="faq-item bg-white dark:bg-dark-200 p-2.5 rounded-medium">
                <div
                  class="faq-header flex items-center py-3 px-5  bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark cursor-pointer"
                >
                  <h3 class="text-xl font-semibold ">Q. What other services are you compatible with?</h3>
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
                    Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  @include('components.free-trial')


@endsection