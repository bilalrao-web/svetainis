<?php

namespace App\Livewire;

use Livewire\Component;

class PortfolioDetail extends Component
{
    public $project;
    public $projectDetails = [];

    // Portfolio data for each project
    private $portfolioData = [
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
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
            ]
        ],
        'brand-identity-design' => [
            'title' => 'Brand Identity Design',
            'category' => 'Graphic Designing',
            'service_slug' => 'graphic-designing',
            'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1931&auto=format&fit=crop',
            'description' => 'Complete brand identity package including logo design, business cards, letterhead, and marketing materials. Created a cohesive visual identity that reflects the company\'s modern and professional values.',
            'technologies' => ['Adobe Illustrator', 'Photoshop', 'InDesign', 'Brand Guidelines'],
            'client' => 'InnovateCorp',
            'duration' => '6 weeks',
            'team_size' => '2 designers',
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
            ]
        ],
        'social-media-campaign' => [
            'title' => 'Social Media Campaign',
            'category' => 'Digital Marketing',
            'service_slug' => 'digital-marketing',
            'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80',
            'description' => 'Comprehensive social media strategy across Facebook, Instagram, and LinkedIn. Increased engagement by 300% and generated 50% more qualified leads through targeted content and paid advertising campaigns.',
            'technologies' => ['Facebook Ads', 'Instagram Marketing', 'Google Analytics', 'Content Strategy'],
            'client' => 'GrowthTech Solutions',
            'duration' => '4 months',
            'team_size' => '3 marketers',
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
            ]
        ],
        'blog-content-strategy' => [
            'title' => 'Blog Content Strategy',
            'category' => 'SEO & Content Writing',
            'service_slug' => 'seo-content-writing',
            'image' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=800&q=80',
            'description' => 'Developed comprehensive content strategy with 50+ SEO-optimized blog posts. Achieved #1 ranking for 15 target keywords and increased organic traffic by 250% within 6 months.',
            'technologies' => ['Keyword Research', 'Content Writing', 'On-Page SEO', 'Analytics'],
            'client' => 'ContentFirst Agency',
            'duration' => '6 months',
            'team_size' => '4 content creators',
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
            ]
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
            ]
        ],
        'banking-app-interface' => [
            'title' => 'Banking App Interface',
            'category' => 'UI/UX Designing',
            'service_slug' => 'ui-ux-designing',
            'image' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&w=800&q=80',
            'description' => 'Complete UI/UX redesign for mobile banking application. Improved user experience with intuitive navigation, accessibility features, and modern design principles. Increased user satisfaction by 40%.',
            'technologies' => ['Figma', 'Prototyping', 'User Research', 'Design System'],
            'client' => 'SecureBank Ltd.',
            'duration' => '8 weeks',
            'team_size' => '3 designers',
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
            ]
        ]
    ];

    public function mount($project)
    {
        $this->project = $project;
        if (isset($this->portfolioData[$project])) {
            $this->projectDetails = $this->portfolioData[$project];
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.portfolio-detail')
            ->layout('layouts.app');
    }
}
