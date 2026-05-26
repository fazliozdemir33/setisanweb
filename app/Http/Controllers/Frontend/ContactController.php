<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactSettings = [
            'address'       => \App\Models\Setting::get('contact_address', 'Çobançeşme Mah. Sanayi Cad. Nish İstanbul B Blok Rezidans No: 44 İç Kapı No: 60 Bahçelievler / İstanbul'),
            'phone'         => \App\Models\Setting::get('contact_phone', '0212 603 65 18'),
            'email'         => \App\Models\Setting::get('contact_email', 'info@setisan.com'),
            'web'           => \App\Models\Setting::get('contact_web', 'www.setisan.com'),
            'working_hours' => \App\Models\Setting::get('contact_working_hours', 'Pzt – Cum: 08:30 – 18:00'),
            'map_embed'     => \App\Models\Setting::get('contact_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.6601449834244!2d28.825838076629906!3d40.98998197135314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa3167199bf51%3A0xe9665bc7c040d34c!2sNish%20%C4%B0stanbul!5e0!3m2!1str!2str!4v1716584283838!5m2!1str!2str'),
            'page_title_tr' => \App\Models\Setting::get('contact_page_title_tr', 'İletişime Geçin'),
            'page_title_en' => \App\Models\Setting::get('contact_page_title_en', 'Get in Touch'),
            'page_desc_tr'  => \App\Models\Setting::get('contact_page_desc_tr', 'Teknik gereksinimlerinizi paylaşın, ekibimiz en kısa sürede size ulaşsın.'),
            'page_desc_en'  => \App\Models\Setting::get('contact_page_desc_en', 'Share your technical requirements and our team will contact you shortly.'),
        ];

        return view('frontend.contact', compact('contactSettings'));
    }

    public function store(Request $request)
    {
        $locale = app()->getLocale();

        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',

            'website' => 'max:0',
        ]);

        ContactMessage::create([
            ...$validated,
            'locale'     => $locale,
            'ip_address' => $request->ip(),
        ]);

        try {
            \Illuminate\Support\Facades\Mail::to('info@setisan.com')->send(new \App\Mail\ContactFormMail($validated));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Contact mail send error: ' . $e->getMessage());
        }

        $successMsg = $locale === 'tr'
            ? 'Mesajınız alındı. En kısa sürede sizinle iletişime geçeceğiz.'
            : 'Your message has been received. We will get back to you shortly.';

        return back()->with('success', $successMsg);
    }
}
