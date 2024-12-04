<article class="bg-white dark:bg-dark-200 rounded-medium p-2.5 shadow-nav">
    <div class="border border-dashed rounded border-gray-100 dark:border-borderColour-dark p-6 ">
        <img
        src="{{asset($blog->thumbnail)}}"
        alt="service logo"
        class="mb-6 w-full rounded-md"
        />
        <div>
        <a
            href="{{route('blogs.categories',$blog->category->slug??'others')}}"
            class="badge"
        >
            {{$blog->category->name??'Others'}}
        </a>
        <a href="{{route('blogs.show',$blog->slug)}}">
            <h3 class="mb-3 font-semibold leading-[1.33]">{{$blog->title}}</h3>
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
        <p>
            {!!substr(strip_tags($blog->summary), 0, 200)!!}...
        </p>
        </div>
    </div>
</article>
