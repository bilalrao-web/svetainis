<?php

namespace App\Livewire;

use Livewire\Component;

class ServiceDetail extends Component
{
    public $service;

    public $serviceDetails = [];
    private $servicesData = [
        'website-development' => [
            'title' => 'Website Development',
            'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?auto=format&fit=crop&w=800&q=80',
            'description' => 'Need something changed or is there something not quite working the way you envisaged? Is your Vana little old and tired and need refreshing? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
            'portfolio_project' => 'e-commerce-platform'
        ],
        'graphic-designing' => [
            'title' => 'Graphic Designing',
            'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=800&q=80',
            'description' => 'Our graphic design services help you create a strong visual identity. From logos to marketing materials, we design everything with creativity and precision to make your brand stand out.',
            'portfolio_project' => 'brand-identity-design'
        ],
        'digital-marketing' => [
            'title' => 'Digital Marketing',
            'image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=800&q=80',
            'description' => 'We offer a complete suite of digital marketing services. Our strategies are designed to increase your online visibility, drive traffic, and convert visitors into loyal customers.',
            'portfolio_project' => 'social-media-campaign'
        ],
         'seo-content-writing' => [
            'title' => 'SEO & Content Writing',
            'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?auto=format&fit=crop&w=800&q=80',
            'description' => 'Our SEO and content writing services will help you rank higher in search results. We create high-quality, engaging content that is optimized for search engines and your target audience.',
            'portfolio_project' => 'blog-content-strategy'
        ],
        'app-development' => [
            'title' => 'App Development',
            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=800&q=80',
            'description' => 'We build powerful and user-friendly mobile applications for iOS and Android. Our team works closely with you from idea to launch to create an app that meets your business goals.',
            'portfolio_project' => 'fitness-tracking-app'
        ],
        'ui-ux-designing' => [
            'title' => 'UI/UX Designing',
            'image' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?auto=format&fit=crop&w=800&q=80',
            'description' => 'We create intuitive and beautiful user interfaces that provide an exceptional user experience. Our design process is centered around the user to ensure a product that is both functional and delightful.',
            'portfolio_project' => 'banking-app-interface'
        ],
    ];

    public function mount($service)
    {
        $this->service = $service;
        if (isset($this->servicesData[$service])) {
            $this->serviceDetails = $this->servicesData[$service];
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.service-detail')
            ->layout('layouts.app');
    }
}
