<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsAdminMail;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactUs;
use App\Models\Newsletter;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class PageController extends Controller
{
    public function lang($locale){
        if ($locale && in_array($locale,config('langauges.available_shortcode'))) {
            App::setLocale($locale);
            session()->put('lang', $locale);
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function home(){
        $latest_blogs=Blog::with('category','author')->latest()->take(3)->get();
        return view('pages.home',compact('latest_blogs'));
    }

    public function services(){
        return view('pages.services.index');
    }

    public function serviceDetail($slug){
        if(!Lang::has("services.$slug")){
            abort(404);
        }
        $services=[
            'skill-exchange'=>'service1-title',
            'messaging-system'=>'service2-title',
            'events-management'=>'service3-title',
            'community-forums'=>'service4-title',
            'skill-verification-process'=>'service5-title',
            'premium-features'=>'service6-title',
        ];
        $title=$services[$slug];
        return view('pages.services.single',compact('slug','title'));
    }

    public function faq(){
        return view('pages.faq');
    }

    public function pricing(){
        return view('pages.pricing');
    }

    public function aboutUs(){
        return view('pages.about-us');
    }

    public function contactUs(){
        return view('pages.contact-us');
    }

    public function blogs(){
        $latest_blogs=Blog::with('category','author')->latest()->take(3)->get();
        $blogs=Blog::with('category','author')->whereNotIn('id',$latest_blogs->pluck('id'))->latest()->paginate(6);
        return view('pages.blogs.index',compact('latest_blogs','blogs'));
    }

    public function blogDetail($slug){
        $blog=Blog::whereSlug($slug)->first();
        if($blog){
            $blog->increment('reads');
            return view('pages.blogs.single',compact('blog'));
        }
        abort(404);
    }

    public function blogCategories($slug){
        $category=BlogCategory::whereSlug($slug)->first();
        if($category){
            $latest_blogs=Blog::with('category','author')->latest()->take(2)->get();
            $blogs=Blog::with('category','author')->where('blog_category_id',$category->id)->latest()->paginate(4);
            $categories=BlogCategory::where('id','!=',$category->id)->get();
            $tags=Tag::all();
            return view('pages.blogs.categories',compact('category','blogs','categories','tags','latest_blogs'));
        }
        return redirect()->route('blogs');
    }

    public function requestDemo(){
        return view('pages.request-demo');
    }

    public function integration(){
        return view('pages.integration');
    }

    public function testimonial(){
        return view('pages.testimonials');
    }

    public function termsAndConditions(){
        return view('pages.terms-and-conditions');
    }

    public function privacyPolicy(){
        return view('pages.privacy-policy');
    }

    public function submitContactUs(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $data['ip_address']=$request->ip();
        ContactUs::create($data);
        $admin=config('mail.admin_mail');
        Mail::to($admin)->send(new ContactUsAdminMail($data));
        session()->put('query_submitted',1);
        return redirect()->back();
    }

    public function subscribeNewsletter(Request $request){
        $request->validate([
            'email'=>'required',
        ]);
        $newsletter=Newsletter::where('email',$request->email)->first();
        if($newsletter){
            return redirect()->back()->with('error','Already Subscribed');
        }
        Newsletter::create([
            'email'=>$request->email,
            'subscribed'=>true
        ]);
        return redirect()->back()->with('success','Subscribed to newsletter successfully. You will get latest updates.');
    }
}
