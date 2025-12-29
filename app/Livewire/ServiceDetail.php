<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ServiceDetail extends Component
{
    public $service;
    public $serviceModel;

    public $serviceDetails = [];
    private $servicesData = [
        'website-development' => [
            'title' => 'Website Development',
            'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?auto=format&fit=crop&w=800&q=80',
            'description' => 'At UPLANCE, we build sleek and modern websites for your business. We focus on building websites that are fast, designed for mobile, and optimized to convert visitors into customers.',
            'intro' => 'Having a website is crucial for every business, and is important for building a trusted relationship for customers, as well as, showcasing the services provided and enhancing the online presence. The proper website is a game changer and allows a business to stay competitive and make more sales. Websites are extremely helpful for small and growing businesses to increase the value in digital space.',
            'services' => [
                'Website Design, Custom',
                'Site Development, Mobile Responsive',
                'Creation of Websites for E-Commerce',
                'Development of WordPress & Other CMS',
                'Revamp of Website',
                'Optimization of Speed and Performance',
                'Maintenance and Support, Ongoing'
            ],
            'closing' => 'We build websites that are user-friendly, focus on business growth and are aesthetically pleasing. Our agency offers modern designs, optimized websites, SEO friendly development and clean solutions for website development. We offer a host of updates, site fixes and improvements to ensure your website is always performing at its best.',
            'portfolio_project' => 'e-commerce-platform'
        ],
        'graphic-designing' => [
            'title' => 'Graphic Designing',
            'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=800&q=80',
            'description' => 'With UPLANCE, your brand will receive amazing graphic designs to increase visibility. We understand that good design goes beyond aesthetics; it is about effective communication.',
            'intro' => 'Our design team will ensure that your graphic designs capture the attention of your audience, inspire trust, and enable your brand to make a lasting impression. We will assist you in realizing your vision through creativity and quality, whether you are starting your brand from scratch or in the process of gaining a new identity.',
            'services' => [
                'Distinguishing yourself from competitors through a memorable and unique logo is the first step in establishing a successful brand, and we will make sure you\'re on the right path.',
                'We design captivating social media content and advertisements to facilitate audience engagement.',
                'We will design high-quality professional marketing materials that include flyers, brochures, posters, and business cards.',
                'Our team will provide a united virtual presence through seamless and professional visuals for ads, websites, and online campaigns.',
                'Our design team will enhance the visibility of your products through professional graphic design to ensure that the products are stands out on online platforms and on shelves.'
            ],
            'why_choose' => [
                'Unique graphic designs',
                'Timely completion of projects while maintaining quality',
                'Tailored services for your needs',
                'Design consistency with your business vision'
            ],
            'closing' => 'No matter the design need or tools that you prefer, we will enable your brand to capture audience attention with professional graphic design. Let\'s make a difference in your brand visibility today!',
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
            'description' => 'Local search engine optimization is elevating game for local small and mid-sized businesses. Especially in service-oriented industries where customers can choose from various service providers, and can easily pick the one that is closest to them.',
            'intro' => 'Now, when they easily choose the closest provider, it can significantly impact the service provider\'s lead generation potential. When businesses start dominating the local search results, customers tend to identify the business with the services they need and can easily perceive. At UPLANCE, we optimize SEO campaigns that help businesses to appear in search results in presence of their customers. Whether they service one city, or cover many, we increase their presence, attract qualified leads, optimize conversion of local searches to add revenue to the business.',
            'note' => 'In today\'s ultra competitive online platform, appearing in the first section and first page of search results is fundamental. If your website isn\'t appearing, your potential customers, and website visitors, are being captured by your competitors. We aim to resolve that by allowing business websites to become lead generation engines. We are aware that many digital marketing agencies tend to over complicate the process of SEO, we are confident that it is simply humanizing your website with our systematized strategic digital marketing process.',
            'services' => [
                [
                    'title' => 'Finding Keywords and Forming a Plan',
                    'description' => 'We find the profitable, low-competition, and high-intent keywords your customers are looking for so we can gain real value.'
                ],
                [
                    'title' => 'Optimizing Content On the Web',
                    'description' => 'We adjust each part of your website for search engines to better understand and rank the site\'s content.',
                    'sub_items' => [
                        'Meta Titles and Descriptions',
                        'Headings Structure',
                        'Image Optimizations',
                        'URL Changes',
                        'Site Speed Improvements'
                    ]
                ],
                [
                    'title' => 'Technical SEO',
                    'description' => 'Improvements to the site\'s infrastructure that enhance the website\'s overall performance and ranking ability.',
                    'sub_items' => [
                        'Full Site Back-End Audit',
                        'Website Indexing and Crawling Issues',
                        'Core Web Essentials'
                    ]
                ],
                [
                    'title' => 'Having a Local SEO Strategy',
                    'description' => 'Perfect for businesses looking to reach a specific city, region, or area of service.',
                    'sub_items' => [
                        'Better Google Business Profile',
                        'Local Citations',
                        'Local Keyword Optimizations',
                        'Reviews and Reputation Management'
                    ]
                ],
                [
                    'title' => 'Building Back Links and Off-Page SEO',
                    'description' => 'Work with SEO strategy that enhances and strengthens the website\'s domain, increasing its overall trust, through the creation of high-quality backlinks.',
                    'sub_items' => [
                        'Guest Blogging',
                        'Niche Revisions',
                        'Directory Submissions',
                        'Brand Mentions'
                    ]
                ],
                [
                    'title' => 'Monthly SEO Reporting & Analytics',
                    'description' => 'You will always know what to expect. Our reports are based on:',
                    'sub_items' => [
                        'Keyword Tracking',
                        'Growth of Website Traffic',
                        'Website Health',
                        'Completed Actions',
                        'Overall Development'
                    ]
                ]
            ],
            'benefits' => [
                'Enhanced website visibility',
                'Increased SEO traffic',
                'Improved credibility',
                'Increased likelihood of conversions',
                'Fostered sustained business expansion'
            ],
            'closing' => 'You will obtain enhanced website visibility, increased SEO traffic, and improved credibility. Our approach increases the likelihood of conversions and fosters sustained business expansion.',
            'portfolio_project' => 'blog-content-strategy'
        ],
        'app-development' => [
            'title' => 'App Development',
            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=800&q=80',
            'description' => 'Here, at Uplance, we create powerful, value-oriented, and user-friendly mobile applications so that your business can connect anytime and anywhere. We design apps that prioritize superior user experience, while keeping in mind the fast and secure methods needed for a seamless professional journey.',
            'intro' => 'We can convert your idea into a finished product! Would you like to launch your project on both Android and iOS apps? No problem at all!',
            'services' => [
                'We design fully tailored, first-rate, and technical Android apps.',
                'We design secure and seamless iOS applications tailored to offer the best software experience to Apple\'s user.',
                'We design a multifunctional app that operates on both Android and iOS.',
                'We deliver modern and intuitive software so that users enjoy and engage constantly.',
                'We offer frequent updates so that your app functions at the peak of its engineering.'
            ],
            'why_choose' => [
                'Tailored solutions that fit well within your company strategy',
                'Fast, secure and expandable',
                'We design with simplicity and fluidity in mind',
                'Extensible interfaces, and on-time launches',
                'Veteran teams using the latest tech to help you fast-track development'
            ],
            'note' => 'App engineering requires visualization and projection so that the app meets the required modern standards for a technologically advanced product.',
            'closing' => 'From tackling industry challenges to fostering digital innovation, we help brands create apps that engage users and promote business growth. We constructively fine-tune the proposition for a launch. Let\'s start to building your app!',
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
        
        // Try to fetch from database first
        $this->serviceModel = Service::where('slug', $service)->first();
        
        if (!$this->serviceModel && isset($this->servicesData[$service])) {
            // Fallback to hardcoded data
            $this->serviceDetails = $this->servicesData[$service];
        } elseif (!$this->serviceModel) {
            abort(404);
        }
    }

    public function render()
    {
        // Ensure locale is set from session
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        
        // If we have serviceModel, prepare translated data
        $translatedData = [];
        if ($this->serviceModel) {
            $locale = app()->getLocale();
            $translatedData = [
                'title' => $this->serviceModel->translated_title,
                'description' => $this->serviceModel->translated_description,
                'intro' => $this->serviceModel->translated_intro,
                'closing' => $this->serviceModel->translated_closing,
                'note' => $this->serviceModel->translated_note,
                'image' => $this->serviceModel->image,
                'services_list' => $this->serviceModel->translated_services_list,
                'why_choose' => $this->serviceModel->translated_why_choose,
                'benefits' => $this->serviceModel->translated_benefits,
                'service_details' => $this->serviceModel->translated_service_details,
                'portfolio_project' => $this->serviceModel->portfolio_project,
            ];
        }
        
        return view('livewire.service-detail', [
            'serviceModel' => $this->serviceModel,
            'serviceDetails' => $this->serviceDetails,
            'translatedData' => $translatedData
        ])->layout('layouts.app');
    }
}
