<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\MenuItem;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@uplance.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Create default settings
        Setting::set('site_name', 'UPLANCE');
        Setting::set('site_title', 'UPLANCE Web Agency');
        Setting::set('logo', 'images/logo.png');
        Setting::set('footer_text', '© 2024 UPLANCE. All rights reserved.');
        Setting::set('contact_email', 'info@uplance.com');
        Setting::set('contact_phone', '+1 234 567 8900');
        Setting::set('address', '123 Business Street, City, Country');
        Setting::set('about_text', 'UPLANCE is a leading web agency providing innovative digital solutions and services. We are committed to delivering excellence and being "The Place 2 Be" for our clients, partners, and team members.');
        
        // Social Media Links
        Setting::set('instagram_url', 'https://instagram.com/uplance');
        Setting::set('tiktok_url', 'https://tiktok.com/@uplance');
        Setting::set('linkedin_url', 'https://linkedin.com/company/uplance');
        Setting::set('facebook_url', 'https://facebook.com/uplance');
        Setting::set('youtube_url', 'https://youtube.com/@uplance');

        // Create default menu items for header
        $headerMenuItems = [
            ['label' => 'Home', 'route' => 'landing', 'location' => 'header', 'order' => 1],
            ['label' => 'Services', 'route' => 'services', 'location' => 'header', 'order' => 2],
            ['label' => 'Portfolio', 'route' => 'portfolio', 'location' => 'header', 'order' => 3],
            ['label' => 'Contact Us', 'route' => 'contact', 'location' => 'header', 'order' => 4],
        ];

        foreach ($headerMenuItems as $item) {
            $menuItem = MenuItem::firstOrCreate(
                ['label' => $item['label'], 'location' => $item['location']],
                $item
            );
            
            // Add Lithuanian translations
            $translations = [
                'Home' => 'Pagrindinis',
                'Services' => 'Paslaugos',
                'Portfolio' => 'Portfelis',
                'Contact Us' => 'Susisiekite su mumis',
            ];
            
            if (isset($translations[$item['label']])) {
                $menuItem->update([
                    'label_translations' => [
                        'en' => $item['label'],
                        'lt' => $translations[$item['label']]
                    ]
                ]);
            }
        }

        // Create default menu items for footer
        $footerMenuItems = [
            ['label' => 'Home', 'route' => 'landing', 'location' => 'footer', 'order' => 1],
            ['label' => 'Services', 'route' => 'services', 'location' => 'footer', 'order' => 2],
            ['label' => 'Portfolio', 'route' => 'portfolio', 'location' => 'footer', 'order' => 3],
            ['label' => 'Contact Us', 'route' => 'contact', 'location' => 'footer', 'order' => 4],
        ];

        foreach ($footerMenuItems as $item) {
            $menuItem = MenuItem::firstOrCreate(
                ['label' => $item['label'], 'location' => $item['location']],
                $item
            );
            
            // Add Lithuanian translations
            $translations = [
                'Home' => 'Pagrindinis',
                'Services' => 'Paslaugos',
                'Portfolio' => 'Portfelis',
                'Contact Us' => 'Susisiekite su mumis',
            ];
            
            if (isset($translations[$item['label']])) {
                $menuItem->update([
                    'label_translations' => [
                        'en' => $item['label'],
                        'lt' => $translations[$item['label']]
                    ]
                ]);
            }
        }

        // Seed Services
        $servicesData = [
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
                'portfolio_project' => 'e-commerce-platform',
                'order' => 1
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
                'portfolio_project' => 'brand-identity-design',
                'order' => 2
            ],
            'digital-marketing' => [
                'title' => 'Digital Marketing',
                'image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=800&q=80',
                'description' => 'We offer a complete suite of digital marketing services. Our strategies are designed to increase your online visibility, drive traffic, and convert visitors into loyal customers.',
                'portfolio_project' => 'social-media-campaign',
                'order' => 3
            ],
            'seo-content-writing' => [
                'title' => 'SEO & Content Writing',
                'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?auto=format&fit=crop&w=800&q=80',
                'description' => 'Local search engine optimization is elevating game for local small and mid-sized businesses. Especially in service-oriented industries where customers can choose from various service providers, and can easily pick the one that is closest to them.',
                'intro' => 'Now, when they easily choose the closest provider, it can significantly impact the service provider\'s lead generation potential. When businesses start dominating the local search results, customers tend to identify the business with the services they need and can easily perceive. At UPLANCE, we optimize SEO campaigns that help businesses to appear in search results in presence of their customers. Whether they service one city, or cover many, we increase their presence, attract qualified leads, optimize conversion of local searches to add revenue to the business.',
                'note' => 'In today\'s ultra competitive online platform, appearing in the first section and first page of search results is fundamental. If your website isn\'t appearing, your potential customers, and website visitors, are being captured by your competitors. We aim to resolve that by allowing business websites to become lead generation engines. We are aware that many digital marketing agencies tend to over complicate the process of SEO, we are confident that it is simply humanizing your website with our systematized strategic digital marketing process.',
                'service_details' => [
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
                'portfolio_project' => 'blog-content-strategy',
                'order' => 4
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
                'portfolio_project' => 'fitness-tracking-app',
                'order' => 5
            ],
            'ui-ux-designing' => [
                'title' => 'UI/UX Designing',
                'image' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?auto=format&fit=crop&w=800&q=80',
                'description' => 'We create intuitive and beautiful user interfaces that provide an exceptional user experience. Our design process is centered around the user to ensure a product that is both functional and delightful.',
                'portfolio_project' => 'banking-app-interface',
                'order' => 6
            ],
        ];

        // Service translations mapping
        $serviceTranslations = [
            'Website Development' => [
                'title' => 'Svetainės kūrimas',
                'description' => 'UPLANCE mes kuriate elegantiškas ir šiuolaikiškas svetaines jūsų verslui. Mes sutelkiame dėmesį į greitų, mobiliesiems pritaikytų ir optimizuotų svetainių kūrimą, kad lankytojai taptų klientais.',
            ],
            'Graphic Designing' => [
                'title' => 'Grafikos dizainas',
                'description' => 'Su UPLANCE jūsų prekės ženklas gaus nuostabius grafinius dizainus, kad padidintų matomumą. Suprantame, kad geras dizainas yra daugiau nei estetika; tai efektyvus komunikavimas.',
            ],
            'Digital Marketing' => [
                'title' => 'Skaitmeninis marketingas',
                'description' => 'Siūlome visą skaitmeninio marketingo paslaugų komplektą. Mūsų strategijos sukurtos padidinti jūsų internetinį matomumą, pritraukti srautą ir paversti lankytojus ištikimais klientais.',
            ],
            'SEO & Content Writing' => [
                'title' => 'SEO ir turinio kūrimas',
                'description' => 'Vietinė paieškos sistemų optimizacija kelia žaidimą vietiniams mažiesiems ir vidutinio dydžio verslams. Ypač paslaugų sektoriuose, kur klientai gali rinktis iš įvairių paslaugų teikėjų.',
            ],
            'App Development' => [
                'title' => 'Programų kūrimas',
                'description' => 'Čia, Uplance, mes kuriate galingas, vertės orientuotas ir patogias mobiliąsias programas, kad jūsų verslas galėtų susisiekti bet kada ir bet kur. Mes kuriate programas, kurios pirmiausia teikia puikią vartotojo patirtį.',
            ],
            'UI/UX Designing' => [
                'title' => 'UI/UX dizainas',
                'description' => 'Mes kuriate intuityvius ir gražius vartotojo sąsajas, kurios suteikia išskirtinę vartotojo patirtį. Mūsų dizaino procesas orientuotas į vartotoją, kad užtikrintume funkcionalų ir malonų produktą.',
            ],
        ];
        
        foreach ($servicesData as $slug => $data) {
            $serviceData = $data;
            $serviceData['slug'] = $slug;
            $serviceData['services_list'] = $data['services'] ?? null;
            $serviceData['service_details'] = $data['service_details'] ?? null;
            $serviceData['is_active'] = true;
            
            // Add translations if available
            if (isset($serviceTranslations[$data['title']])) {
                $trans = $serviceTranslations[$data['title']];
                $serviceData['title_translations'] = [
                    'en' => $data['title'],
                    'lt' => $trans['title']
                ];
                $serviceData['description_translations'] = [
                    'en' => $data['description'],
                    'lt' => $trans['description']
                ];
                
                if (isset($data['intro'])) {
                    $serviceData['intro_translations'] = [
                        'en' => $data['intro'],
                        'lt' => $data['intro'] // Keep same for now, can be translated later
                    ];
                }
                if (isset($data['closing'])) {
                    $serviceData['closing_translations'] = [
                        'en' => $data['closing'],
                        'lt' => $data['closing'] // Keep same for now
                    ];
                }
                if (isset($data['note'])) {
                    $serviceData['note_translations'] = [
                        'en' => $data['note'],
                        'lt' => $data['note'] // Keep same for now
                    ];
                }
            }
            
            // Remove 'services' key to avoid conflict
            unset($serviceData['services']);
            
            Service::updateOrCreate(
                ['slug' => $slug],
                $serviceData
            );
        }

        // Seed Portfolio Projects
        $portfolioData = [
            'e-commerce-platform' => [
                'title' => 'E-Commerce Platform',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80',
                'description' => 'Modern e-commerce solution with Laravel backend, React frontend, and integrated payment processing. Features include user authentication, product management, shopping cart, and order tracking.',
                'technologies' => ['Laravel', 'React', 'MySQL', 'Stripe API'],
                'web_type' => 'E-Commerce Platform',
                'use_cases' => 'Online stores, retail businesses, marketplace platforms, B2B commerce',
                'challenge' => 'Building a scalable e-commerce platform that can handle high traffic and complex product variations while maintaining excellent user experience and secure payment processing.',
                'solution' => 'We implement a microservices architecture with modern frameworks, RESTful API design, and cloud-based infrastructure. Features include secure payment gateways, real-time inventory management, advanced product filtering, and mobile-responsive design.',
                'results' => [
                    'Scalable architecture for growing businesses',
                    'Fast checkout process with multiple payment options',
                    'SEO optimized for better search visibility',
                    'Mobile-first responsive design'
                ],
                'features' => [
                    'User authentication & authorization',
                    'Product catalog with advanced filtering',
                    'Shopping cart & wishlist functionality',
                    'Secure payment processing',
                    'Order tracking & management',
                    'Admin dashboard for inventory',
                    'Mobile-responsive design',
                    'SEO optimization'
                ],
                'order' => 1
            ],
            'saas-application' => [
                'title' => 'SaaS Application',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                'description' => 'Cloud-based SaaS platform with multi-tenant architecture, subscription management, and real-time collaboration features. Built for scalability and high performance.',
                'technologies' => ['Vue.js', 'Node.js', 'PostgreSQL', 'AWS', 'Docker'],
                'web_type' => 'SaaS Application',
                'use_cases' => 'Project management tools, CRM systems, business automation, collaboration platforms',
                'challenge' => 'Creating a scalable multi-tenant SaaS platform that can handle thousands of concurrent users while maintaining fast performance, real-time synchronization, and secure data isolation.',
                'solution' => 'We build microservices architecture with modern frontend frameworks, robust backend APIs, and cloud infrastructure. Features include subscription billing, role-based access control, real-time updates via WebSockets, and automated scaling.',
                'results' => [
                    'Multi-tenant architecture for efficient resource usage',
                    'Subscription management with multiple billing models',
                    'Real-time collaboration and notifications',
                    'Scalable infrastructure for growth'
                ],
                'features' => [
                    'Multi-tenant architecture',
                    'Real-time collaboration',
                    'Advanced analytics dashboard',
                    'API integration capabilities',
                    'Subscription management',
                    'Role-based access control',
                    'Automated backup system',
                    'Mobile-responsive design'
                ],
                'order' => 2
            ],
            'corporate-website' => [
                'title' => 'Corporate Website',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?auto=format&fit=crop&w=800&q=80',
                'description' => 'Modern corporate website with CMS integration, multilingual support, and advanced SEO optimization. Features include team management, news/blog system, and contact forms.',
                'technologies' => ['WordPress', 'PHP', 'MySQL', 'Elementor', 'Yoast SEO'],
                'web_type' => 'Corporate Website',
                'use_cases' => 'Business websites, company portfolios, professional services, corporate branding',
                'challenge' => 'Building a professional corporate website that effectively represents the company brand, provides excellent user experience, and is easy to manage and update by non-technical staff.',
                'solution' => 'We create custom responsive websites with modern CMS platforms, drag-and-drop page builders, and comprehensive SEO optimization. Features include multilingual support, team member profiles, news/blog sections, and integrated contact systems.',
                'results' => [
                    'Professional brand representation',
                    'SEO optimized for better visibility',
                    'Easy content management system',
                    'Multilingual support capabilities'
                ],
                'features' => [
                    'Custom WordPress theme',
                    'Multilingual support',
                    'SEO optimized',
                    'Content management system',
                    'Team member profiles',
                    'News/blog system',
                    'Contact form integration',
                    'Analytics integration'
                ],
                'order' => 3
            ],
            'blog-platform' => [
                'title' => 'Modern Blog Platform',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=800&q=80',
                'description' => 'Advanced blogging platform with markdown editor, social sharing, comment system, and newsletter integration. Built for content creators and publishers.',
                'technologies' => ['Next.js', 'Strapi CMS', 'PostgreSQL', 'Redis', 'Vercel'],
                'web_type' => 'Blog & Media Platform',
                'use_cases' => 'Content marketing, news sites, personal blogs, publishing platforms, media outlets',
                'challenge' => 'Creating a fast, SEO-friendly blog platform that can handle high traffic, provide excellent content creation experience, and maximize reader engagement.',
                'solution' => 'We build modern blog platforms using server-side rendering for SEO, headless CMS for content management, and optimized caching strategies. Features include markdown editor, social sharing, comment systems, and newsletter integration.',
                'results' => [
                    'SEO optimized for search visibility',
                    'Fast page loads with optimized performance',
                    'User-friendly content management',
                    'Social sharing and engagement features'
                ],
                'features' => [
                    'Markdown editor',
                    'SEO optimization',
                    'Social media integration',
                    'Comment system',
                    'Newsletter subscription',
                    'Category & tag system',
                    'Search functionality',
                    'RSS feed support'
                ],
                'order' => 4
            ],
            'learning-management-system' => [
                'title' => 'Learning Management System',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80',
                'description' => 'Comprehensive LMS platform with course management, video streaming, quizzes, certificates, and student progress tracking. Built for educational institutions.',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'AWS S3', 'FFmpeg'],
                'web_type' => 'Learning Management System',
                'use_cases' => 'Online courses, training platforms, educational institutions, corporate training, skill development',
                'challenge' => 'Building a robust learning management system that can handle video streaming, course management, student assessments, and progress tracking while maintaining excellent user experience.',
                'solution' => 'We develop comprehensive LMS platforms with video streaming capabilities, interactive course management, assessment tools, and progress tracking. Features include certificate generation, discussion forums, and payment integration.',
                'results' => [
                    'Comprehensive course management',
                    'Video streaming and content delivery',
                    'Student progress tracking and analytics',
                    'Interactive quizzes and assessments'
                ],
                'features' => [
                    'Course creation & management',
                    'Video streaming platform',
                    'Interactive quizzes',
                    'Certificate generation',
                    'Student progress tracking',
                    'Discussion forums',
                    'Payment integration',
                    'Mobile-responsive design'
                ],
                'order' => 5
            ],
            'real-estate-portal' => [
                'title' => 'Real Estate Portal',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80',
                'description' => 'Property listing portal with advanced search filters, maps, agent profiles, and lead capture forms.',
                'technologies' => ['Laravel', 'Alpine.js', 'MySQL', 'LeafletJS'],
                'web_type' => 'Real Estate Portal',
                'use_cases' => 'Property listings, real estate agencies, rental platforms, property management',
                'challenge' => 'Building a fast geolocation search with complex filters across thousands of properties while providing excellent user experience and lead management.',
                'solution' => 'We develop real estate portals with advanced search functionality, interactive maps, property filtering, and lead capture systems. Features include agent profiles, saved searches, and property comparison tools.',
                'results' => [
                    'Fast property search with geolocation',
                    'Advanced filtering and sorting options',
                    'Interactive map integration',
                    'Lead capture and management system'
                ],
                'features' => [
                    'Geo search & maps',
                    'Saved searches',
                    'Agent profiles',
                    'Lead forms',
                    'Property comparison',
                    'Image galleries',
                    'Virtual tour integration',
                    'Mobile-responsive design'
                ],
                'order' => 6
            ],
            'booking-reservation-system' => [
                'title' => 'Booking & Reservation System',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
                'description' => 'End-to-end booking system with availability calendars, payment processing, and notifications.',
                'technologies' => ['Laravel', 'Livewire', 'Stripe', 'MySQL'],
                'web_type' => 'Booking & Reservation System',
                'use_cases' => 'Hotels, restaurants, appointments, events, tours, services scheduling',
                'challenge' => 'Preventing double-bookings, handling timezone-sensitive availability, and managing complex scheduling scenarios while providing seamless payment processing.',
                'solution' => 'We build robust booking systems with real-time availability management, atomic reservation processing, and secure payment integration. Features include calendar management, automated notifications, and refund handling.',
                'results' => [
                    'Real-time availability management',
                    'Secure payment processing',
                    'Automated confirmation and reminders',
                    'Prevention of double-bookings'
                ],
                'features' => [
                    'Availability calendars',
                    'Coupon codes',
                    'Email/SMS alerts',
                    'Refund flows',
                    'Multi-timezone support',
                    'Payment integration',
                    'Booking management dashboard',
                    'Customer notifications'
                ],
                'order' => 7
            ],
            'news-portal' => [
                'title' => 'News Portal',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1510936111840-65e151ad71bb?auto=format&fit=crop&w=800&q=80',
                'description' => 'High-traffic news portal with editorial workflows, categories, tags, and advertising blocks.',
                'technologies' => ['Next.js', 'Laravel API', 'Redis', 'PostgreSQL'],
                'web_type' => 'News Portal',
                'use_cases' => 'News websites, media outlets, online magazines, content publishers, journalism platforms',
                'challenge' => 'Serving real-time content to millions of readers with excellent SEO, fast page loads, and instant cache invalidation while maintaining editorial workflows.',
                'solution' => 'We build high-performance news portals using server-side rendering, edge caching, and optimized content delivery. Features include editorial workflows, content scheduling, AMP support, and advertising integration.',
                'results' => [
                    'SEO optimized for search visibility',
                    'Fast page loads with optimized caching',
                    'Real-time content updates',
                    'Editorial workflow management'
                ],
                'features' => [
                    'Editorial roles',
                    'Content scheduling',
                    'AMP support',
                    'Ad placements',
                    'Category and tag system',
                    'Comment moderation',
                    'Social sharing',
                    'Newsletter integration'
                ],
                'order' => 8
            ],
            'healthcare-portal' => [
                'title' => 'Healthcare Portal',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1580281657527-47a38b5c7f34?auto=format&fit=crop&w=800&q=80',
                'description' => 'HIPAA-compliant healthcare portal with appointments, patient dashboards, and secure messaging.',
                'technologies' => ['Laravel', 'Tailwind', 'MySQL', 'Twilio'],
                'web_type' => 'Healthcare Portal',
                'use_cases' => 'Hospitals, clinics, medical practices, telemedicine, patient portals, health management',
                'challenge' => 'Ensuring HIPAA compliance and data security while providing accessible patient experience and seamless appointment management.',
                'solution' => 'We develop secure healthcare portals with encrypted data storage, role-based access control, and comprehensive audit trails. Features include appointment scheduling, patient dashboards, secure messaging, and automated reminders.',
                'results' => [
                    'HIPAA-compliant secure platform',
                    'Easy appointment management',
                    'Patient portal access',
                    'Automated reminder systems'
                ],
                'features' => [
                    'eCheck-in',
                    'Secure chat',
                    'Appointment reminders',
                    'Patient reports',
                    'Medical records access',
                    'Prescription management',
                    'Billing integration',
                    'Telemedicine support'
                ],
                'order' => 9
            ],
            'fintech-dashboard' => [
                'title' => 'FinTech Analytics Dashboard',
                'category' => 'Website Development',
                'service_slug' => 'website-development',
                'image' => 'https://images.unsplash.com/photo-1551281044-8a6b5a0b6d0b?auto=format&fit=crop&w=800&q=80',
                'description' => 'Real-time financial analytics with charts, alerts, and role-based access control.',
                'technologies' => ['React', 'Laravel', 'TimescaleDB', 'WebSockets'],
                'web_type' => 'FinTech Analytics Dashboard',
                'use_cases' => 'Financial services, investment platforms, banking dashboards, trading platforms, financial analytics',
                'challenge' => 'Streaming real-time financial data at scale with accurate aggregations, comprehensive permissions, and secure data handling.',
                'solution' => 'We build financial dashboards with real-time data streaming, time-series databases, and granular role-based access control. Features include interactive charts, customizable alerts, data export, and API integrations.',
                'results' => [
                    'Real-time financial data visualization',
                    'Customizable analytics dashboards',
                    'Secure data handling and permissions',
                    'Actionable insights and alerts'
                ],
                'features' => [
                    'Drill-down charts',
                    'Data exporting',
                    'Team roles and permissions',
                    'API integrations',
                    'Real-time updates',
                    'Customizable widgets',
                    'Alert systems',
                    'Historical data analysis'
                ],
                'order' => 10
            ],
            'brand-identity-design' => [
                'title' => 'Brand Identity Design',
                'category' => 'Graphic Designing',
                'service_slug' => 'graphic-designing',
                'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1931&auto=format&fit=crop',
                'description' => 'Complete brand identity package including logo design, business cards, letterhead, and marketing materials. Created a cohesive visual identity that reflects the company\'s modern and professional values.',
                'technologies' => ['Adobe Illustrator', 'Photoshop', 'InDesign', 'Brand Guidelines'],
                'challenge' => 'Creating a unique brand identity that would stand out in a competitive market while maintaining professional credibility.',
                'solution' => 'Developed a comprehensive brand strategy with modern typography, cohesive color palette, and versatile logo system that works across all media platforms.',
                'results' => [
                    'Brand recognition increased by 200%',
                    'Client satisfaction score: 9.5/10',
                    'Award-winning design',
                    'Used across 50+ marketing materials'
                ],
                'features' => [
                    'Primary & secondary logo variations',
                    'Complete color palette',
                    'Typography system',
                    'Business card design',
                    'Letterhead & envelope design',
                    'Social media templates',
                    'Brand guidelines document',
                    'Marketing collateral'
                ],
                'order' => 11
            ],
            'social-media-campaign' => [
                'title' => 'Social Media Campaign',
                'category' => 'Digital Marketing',
                'service_slug' => 'digital-marketing',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80',
                'description' => 'Comprehensive social media strategy across Facebook, Instagram, and LinkedIn. Increased engagement by 300% and generated 50% more qualified leads through targeted content and paid advertising campaigns.',
                'technologies' => ['Facebook Ads', 'Instagram Marketing', 'Google Analytics', 'Content Strategy'],
                'challenge' => 'Building brand awareness and generating leads in a B2B technology sector with high competition and complex buyer journey.',
                'solution' => 'Developed a multi-platform content strategy with targeted paid campaigns, engaging organic content, and data-driven optimization to reach the right audience at the right time.',
                'results' => [
                    '300% increase in engagement',
                    '50% more qualified leads',
                    '200% growth in followers',
                    'ROI of 350% on ad spend'
                ],
                'features' => [
                    'Multi-platform content strategy',
                    'Targeted paid advertising',
                    'Engaging visual content',
                    'Video marketing campaigns',
                    'Influencer partnerships',
                    'Community management',
                    'Performance analytics',
                    'Lead generation funnels'
                ],
                'order' => 12
            ],
            'blog-content-strategy' => [
                'title' => 'Blog Content Strategy',
                'category' => 'SEO & Content Writing',
                'service_slug' => 'seo-content-writing',
                'image' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=800&q=80',
                'description' => 'Developed comprehensive content strategy with 50+ SEO-optimized blog posts. Achieved #1 ranking for 15 target keywords and increased organic traffic by 250% within 6 months.',
                'technologies' => ['Keyword Research', 'Content Writing', 'On-Page SEO', 'Analytics'],
                'challenge' => 'Improving search rankings and organic traffic in a highly competitive content marketing space.',
                'solution' => 'Conducted extensive keyword research, created high-quality content clusters, and implemented technical SEO improvements to boost search visibility.',
                'results' => [
                    '250% increase in organic traffic',
                    '#1 ranking for 15 keywords',
                    '50+ published articles',
                    'Average 5-minute read time'
                ],
                'features' => [
                    'Comprehensive keyword research',
                    'Content calendar planning',
                    'SEO-optimized articles',
                    'Internal linking strategy',
                    'Meta descriptions & titles',
                    'Image optimization',
                    'Performance tracking',
                    'Content updates & maintenance'
                ],
                'order' => 13
            ],
            'fitness-tracking-app' => [
                'title' => 'Fitness Tracking App',
                'category' => 'App Development',
                'service_slug' => 'app-development',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80',
                'description' => 'Cross-platform mobile app for fitness tracking with real-time data sync, workout plans, and social features. Built with React Native and Firebase backend, supporting both iOS and Android platforms.',
                'technologies' => ['React Native', 'Firebase', 'Redux', 'HealthKit API'],
                'client' => 'FitLife Technologies',
                'duration' => '5 months',
                'team_size' => '6 developers',
                'challenge' => 'Creating a seamless fitness tracking experience that works consistently across iOS and Android while integrating with various health devices.',
                'solution' => 'Built a React Native app with Firebase backend for real-time data sync, implemented HealthKit integration for iOS and Google Fit for Android, and created an intuitive user interface.',
                'results' => [
                    '50,000+ downloads',
                    '4.8/5 app store rating',
                    '95% user retention rate',
                    '1M+ workouts tracked'
                ],
                'features' => [
                    'Cross-platform compatibility',
                    'Real-time data synchronization',
                    'Workout plan customization',
                    'Social sharing features',
                    'Health device integration',
                    'Progress tracking & analytics',
                    'Offline functionality',
                    'Push notifications'
                ],
                'order' => 14
            ],
            'banking-app-interface' => [
                'title' => 'Banking App Interface',
                'category' => 'UI/UX Designing',
                'service_slug' => 'ui-ux-designing',
                'image' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&w=800&q=80',
                'description' => 'Complete UI/UX redesign for mobile banking application. Improved user experience with intuitive navigation, accessibility features, and modern design principles. Increased user satisfaction by 40%.',
                'technologies' => ['Figma', 'Prototyping', 'User Research', 'Design System'],
                'challenge' => 'Redesigning a complex banking app to be more user-friendly while maintaining security and regulatory compliance requirements.',
                'solution' => 'Conducted extensive user research, created wireframes and prototypes, and developed a comprehensive design system that prioritizes usability and accessibility.',
                'results' => [
                    '40% increase in user satisfaction',
                    '60% reduction in support tickets',
                    '25% faster task completion',
                    'Award for best banking UX'
                ],
                'features' => [
                    'Intuitive navigation design',
                    'Accessibility compliance',
                    'Modern visual design',
                    'Interactive prototypes',
                    'Design system documentation',
                    'User testing & feedback',
                    'Responsive layouts',
                    'Security-focused UI patterns'
                ],
                'order' => 15
            ],
        ];

        foreach ($portfolioData as $slug => $data) {
            Portfolio::updateOrCreate(
                ['slug' => $slug],
                array_merge($data, [
                    'slug' => $slug,
                    'is_active' => true,
                ])
            );
        }
    }
}
