<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Page;
use App\Mail\ContactFormSubmitted;
use App\Rules\Recaptcha;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        SEOMeta::setTitle('About Us');
        SEOMeta::setDescription('Learn about Shilpkala - empowering rural artisans and preserving India\'s rich handcraft traditions.');
        $page = Page::where('slug', 'about')->first();
        return view('pages.about', compact('page'));
    }

    public function contact()
    {
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription('Get in touch with Shilpkala. We\'d love to hear from you about orders, custom requests, or any questions.');
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ];

        if (config('services.recaptcha.site_key')) {
            $rules['g-recaptcha-response'] = ['required', new Recaptcha];
        }

        $validated = $request->validate($rules);

        $message = ContactMessage::create($validated);

        try {
            Mail::to(config('services.contact_form.mail_to', config('mail.from.address')))
                ->send(new ContactFormSubmitted($message));
        } catch (\Exception $e) {
            // Silently fail - message is still saved in DB
        }

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function faq()
    {
        $page = Page::where('slug', 'faq')->first();
        return view('pages.faq', compact('page'));
    }

    public function shippingReturns()
    {
        $page = Page::where('slug', 'shipping-returns')->first();
        return view('pages.shipping-returns', compact('page'));
    }

    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->first();
        return view('pages.privacy-policy', compact('page'));
    }

    public function termsOfService()
    {
        $page = Page::where('slug', 'terms-of-service')->first();
        return view('pages.terms-of-service', compact('page'));
    }
}
