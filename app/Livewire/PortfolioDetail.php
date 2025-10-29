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
            'client' => 'TechStart Inc.',
            'duration' => '3 months',
            'team_size' => '5 developers',
            'challenge' => 'Building a scalable e-commerce platform that could handle high traffic and complex product variations while maintaining excellent user experience.',
            'solution' => 'Implemented a microservices architecture with Laravel API backend, React SPA frontend, and Redis caching for optimal performance. Integrated Stripe for secure payments and implemented real-time inventory management.',
            'results' => [
                'Increased online sales by 150%',
                'Reduced page load time by 60%',
                'Achieved 99.9% uptime',
                'Processed over $2M in transactions'
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
