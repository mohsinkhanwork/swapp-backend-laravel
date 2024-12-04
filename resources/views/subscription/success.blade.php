@extends('layouts.app')
@section('content')
<section class="pt-[200px] mb-150 max-md:mb-25">
    <div
      class="container relative"
      data-aos="fade-up"
      data-aos-offset="200"
      data-aos-duration="1000"
      data-aos-once="true"
    >
      <div class="relative z-10 max-w-[700px] mx-auto">
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex max-md:flex-col -z-10">
          <div
            class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/30 blur-[145px]"
          ></div>
          <div
            class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/50 -ml-[170px] max-md:ml-0 blur-[145px]"
          ></div>
          <div
            class="max-1xl:w-[335px] max-1xl:h-[335px]  1xl:w-[442px] 1xl:h-[442px]  rounded-full bg-primary-200/30 -ml-[170px] max-md:ml-0 blur-[145px]"
          ></div>
        </div>
        <div class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav">
          <div
            class="bg-white dark:bg-dark-200 border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-12 max-md:px-5 max-md:py-7"
          >
          @if ($payment_method)
            <h2 class="text-green text-center mb-4" style="color: green">
                Payment method updated successfully.
            </h2>
          @else
              <h2 class="text-green text-center mb-4" style="color: green">
                  Successfully subscribed to the premium plans.
              </h2>
              <p>
                  Enjoy exclusive benefits and unlock new opportunities to swap skills with others. Explore a world of endless learning possibilities and make the most out of your premium membership. Happy swapping!
              </p>
          @endif
            <h4 class="text-center mt-5">
                Redirecting in <span id="seconds">5</span> seconds
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@push('scripts')
    <script>
        let seconds=5;
        setInterval(() => {
            if(seconds>0){
                document.getElementById('seconds').innerHTML=--seconds;
            }
        }, 1000);
        setTimeout(() => {
            // redirect to the web app
            location.href="/";
        }, 5000);
    </script>
@endpush
