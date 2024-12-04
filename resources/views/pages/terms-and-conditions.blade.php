@extends('layouts.app')
@section('content')
<section class="pb-150 pt-[250px]">
    <div
      class="container relative !max-w-[800px]"
      data-aos="fade-up"
      data-aos-offset="200"
      data-aos-duration="1000"
      data-aos-once="true"
    >
      <div class="absolute left-1/2 top-20 -translate-x-1/2 -translate-y-1/2 flex -z-10">
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 blur-[145px]"></div>
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/25 -ml-[170px] blur-[145px]"></div>
        <div class="w-[442px] h-[442px] rounded-full bg-primary-200/20 -ml-[170px] blur-[145px]"></div>
      </div>

      <div class="singlePage">
        <h2 class="mb-3 font-semibold leading-[1.33] max-w-[650px]">Terms & Conditions</h2>
      </div>

      <div class="singlePage">
        <p>
          At Aplio, we take your privacy seriously. This privacy policy explains how we collect, use, and protect your
          personal information.
        </p>
        <h3>Information We Collect</h3>
        <p>
          We collect personal information that you provide to us such as your name, email address, and phone number when
          you submit a contact form or sign up for our newsletter. We also collect information about your visit to our
          website, including your IP address, browser type, and the pages you visit.
        </p>
        <h3>Use of Information</h3>
        <p>
          We use the information we collect to provide you with our services, respond to your inquiries, and send you
          marketing communications. We may also use your information to improve our website and to comply with legal
          obligations.
        </p>
        <ul>
          <li>Manage your time so you’ll get more done in less time</li>
          <li class="flex items-center gap-x-2 ">Cut expenses without sacrificing quality</li>
          <li class="flex items-center gap-x-2 ">Attract and retain quality, high-paying customers</li>
        </ul>
        <h3>Protection of Information</h3>
        <p>
          We take appropriate measures to protect your personal information from unauthorized access, disclosure,
          alteration, or destruction. We use industry-standard security measures such as SSL encryption to protect your
          data during transmission.
        </p>

        <h3>Disclosure of Information</h3>
        <p>
          We do not share your personal information with third parties except as required by law or as necessary to
          provide our services. We may share your information with our trusted partners who assist us in operating our
          website or providing our services.
        </p>

        <h3>Cookies</h3>
        <p>
          We use cookies and other similar technologies to collect information about your visit to our website. You may
          disable cookies in your browser settings, but please note that some features of our website may not function
          properly without cookies.
        </p>

        <h3>Your Rights</h3>
        <p>
          You have the right to access, update, and delete your personal information. You may also object to our use of
          your personal information for marketing purposes. If you wish to exercise any of these rights, please contact us
          using the information below.
        </p>

        <h3>Updates to Privacy Policy</h3>
        <p>
          We may update this privacy policy from time to time. We will notify you of any changes by posting the new
          privacy policy on our website. You are advised to review this privacy policy periodically for any changes.
        </p>

        <h3>Contact Us</h3>
        <p>
          If you have any questions or concerns about this privacy policy or our use of your personal information, please
          contact us at hello@aplio.com.
        </p>
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
