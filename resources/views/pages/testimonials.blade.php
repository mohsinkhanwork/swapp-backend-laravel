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
        <p class="mb-4 font-medium uppercase"></p>
        <h1 class="max-lg:mb-10 mb-10">{{__('index.what-our-users-say')}}</h1>
      </div>
    </div>
  </section>



  <section class=" pb-25 relative">
    <div class="container relative">
      <div class="relative z-10">
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
        <div class=" grid grid-cols-3 max-md:grid-cols-1 max-lg:grid-cols-2 gap-11 ">
          <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav">
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
                  <h3 class="text-base font-semibold">Robert Frost</h3>
                  <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                    Lead Designer
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="300"
            data-aos-once="true"
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
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
                {{-- <i class="fa-solid fa-star text-[#A7A7B4] dark:text-[#646463]"></i> --}}
              </div>

              <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                <img
                  src="{{asset('assets/images/testimonial/avatar2.png')}}"
                  alt="avatar"
                  class="mr-4 rounded-full"
                />
                <div class="block">
                  <h3 class="text-base font-semibold">Guy Hawkins</h3>
                  <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">Developer</p>
                </div>
              </div>
            </div>
          </div>

          <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="600"
            data-aos-once="true"
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
                  <h3 class="text-base font-semibold">Cody Fisher</h3>
                  <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                    UI Designer
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="100"
            data-aos-once="true"
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
                  <h3 class="text-base font-semibold">Albert Flores</h3>
                  <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">
                    Sr. Developer
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="300"
            data-aos-once="true"
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
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
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

          <div
            class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav"
            data-aos="fade-up"
            data-aos-offset="200"
            data-aos-duration="1000"
            data-aos-delay="600"
            data-aos-once="true"
          >
            <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-7">
              <blockquote class="text-paragraph dark:text-white italic mb-5 leading-[1.75]">
                "SkillSwap has reignited my passion for learning and exploring new hobbies. I've connected with fellow hobbyists who share my interests and have been able to learn new skills in a fun and engaging way. SkillSwap has made learning feel like a community-driven adventure."
              </blockquote>
              <div class="mb-7">
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
                <i class="fa-solid fa-star text-paragraph dark:text-white"></i>
              </div>

              <div class="pt-7 flex items-center border-t border-dashed border-gray-100 dark:border-borderColour-dark">
                <img
                  src="{{asset('assets/images/testimonial/avatar6.png')}}"
                  alt="avatar"
                  class="mr-4 rounded-full"
                />
                <div class="block">
                  <h3 class="text-base font-semibold">Bessie Cooper</h3>
                  <p class="text-paragraph-light dark:text-[#A1A49D]  font-jakarta_sans text-sm font-medium">Manager</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="client bg-white dark:bg-dark-300">
    <div class="container  overflow-hidden max-lg:!px-0">
      <div
        class="relative after:absolute before:absolute after:w-[120px] after:h-[40px] after:bg-gradient-to-r after:from-white after:from-[37.5%]  after:top-1/2 after:-translate-y-1/2 after:left-0 after:z-10 before:w-[120px] before:h-[40px] before:bg-gradient-to-l before:from-white before:from-[37.5%] before:right-0  before:top-1/2 before:-translate-y-1/2  before:z-10 dark:after:from-dark-gradient dark:before:from-dark-gradient"
      >
        <div class="absolute left-0 -top-[1px] w-full max-lg:hidden">
          <img
            src="{{asset('assets/images/clients/client-border.svg')}}"
            alt="border"
            class="inline-block dark:hidden"
          />
          <img
            src="{{asset('assets/images/clients/client-border-dark.svg')}}"
            alt="border"
            class="hidden dark:inline-block"
          />
        </div>
        <div class="marquee marquee-items  ">
          <div
            class="  marquee-content flex items-center justify-between py-8 "
            id="clients"
          >
            <div class="marquee-content-list">
              <img
                src="{{asset('assets/images/clients/group.svg')}}"
                alt="group"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/group-dark.svg')}}"
                alt="group"
                class="hidden dark:inline-block"
              />
            </div>
            <div class="marquee-content-list ">
              <img
                src="{{asset('assets/images/clients/infinity.svg')}}"
                alt="infinity"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/infinity-dark.svg')}}"
                alt="infinity"
                class="hidden dark:inline-block"
              />
            </div>
            <div class="marquee-content-list ">
              <img
                src="{{asset('assets/images//clients/artifact.svg')}}"
                alt="artifact"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/artifact-dark.svg')}}"
                alt="caudile"
                class="hidden dark:inline-block"
              />
            </div>
            <div class="marquee-content-list ">
              <img
                src="{{asset('assets/images/clients/caudile.svg')}}"
                alt="caudile"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/caudile-dark.svg')}}"
                alt="caudile"
                class="hidden dark:inline-block"
              />
            </div>
            <div class="marquee-content-list ">
              <img
                src="{{asset('assets/images/clients/axeptio.svg')}}"
                alt="axeptio"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/axeptio-dark.svg')}}"
                alt="axeptio"
                class="hidden dark:inline-block"
              />
            </div>
            <div class="marquee-content-list ">
              <img
                src="{{asset('assets/images/clients/mfinity.svg')}}"
                alt="mfinity"
                class="inline-block dark:hidden"
              />
              <img
                src="{{asset('assets/images/clients/mfinity-dark.svg')}}"
                alt="mfinity"
                class="hidden dark:inline-block"
              />
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
