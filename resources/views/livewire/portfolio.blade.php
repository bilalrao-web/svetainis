<div>
    <section class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">Portfolio</h1>
            <p class="breadcrumb animate-fade-in-up">HOME > <span>Portfolio</span></p>
        </div>
    </section>
    

    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Recent Projects</h2>
            <p class="section-subtitle">Have a look at our recent work. We are proud of the work we do and the clients we serve.</p>

            <div class="portfolio-grid">
                <!-- Website Development Projects -->
                <a href="{{ route('portfolio.detail', ['project' => 'e-commerce-platform']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80" alt="E-Commerce Platform">
                    <div class="portfolio-overlay">
                        <h3>E-Commerce Platform</h3>
                        <p class="project-category">Website Development</p>
                        <p class="project-description">Modern e-commerce solution with Laravel backend, React frontend, and integrated payment processing. Features include user authentication, product management, shopping cart, and order tracking.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">Stripe API</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('portfolio.detail', ['project' => 'saas-application']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80" alt="SaaS Application">
                    <div class="portfolio-overlay">
                        <h3>SaaS Application</h3>
                        <p class="project-category">Website Development</p>
                        <p class="project-description">Cloud-based SaaS platform for project management with real-time collaboration, task tracking, and analytics dashboard. Built with microservices architecture for scalability.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">Node.js</span>
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">AWS</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('portfolio.detail', ['project' => 'corporate-website']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?auto=format&fit=crop&w=800&q=80" alt="Corporate Website">
                    <div class="portfolio-overlay">
                        <h3>Corporate Website</h3>
                        <p class="project-category">Website Development</p>
                        <p class="project-description">Modern corporate website with CMS integration, multilingual support, and advanced SEO optimization. Features include team management, news/blog system, and contact forms.</p>
                        <div class="project-tech">
                            <span class="tech-tag">WordPress</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">Elementor</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('portfolio.detail', ['project' => 'blog-platform']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=800&q=80" alt="Modern Blog Platform">
                    <div class="portfolio-overlay">
                        <h3>Modern Blog Platform</h3>
                        <p class="project-category">Website Development</p>
                        <p class="project-description">Advanced blogging platform with markdown editor, social sharing, comment system, and newsletter integration. Built for content creators and publishers.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Next.js</span>
                            <span class="tech-tag">Strapi CMS</span>
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">Redis</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('portfolio.detail', ['project' => 'learning-management-system']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=800&q=80" alt="Learning Management System">
                    <div class="portfolio-overlay">
                        <h3>Learning Management System</h3>
                        <p class="project-category">Website Development</p>
                        <p class="project-description">Comprehensive LMS platform with course management, video streaming, quizzes, certificates, and student progress tracking. Built for educational institutions.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">AWS S3</span>
                        </div>
                    </div>
                </a>
                
                <!-- 2. Graphic Designing -->
                <a href="{{ route('portfolio.detail', ['project' => 'brand-identity-design']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1931&auto=format&fit=crop" alt="Graphic Designing">
                    <div class="portfolio-overlay">
                        <h3>Brand Identity Design</h3>
                        <p class="project-category">Graphic Designing</p>
                        <p class="project-description">Complete brand identity package including logo design, business cards, letterhead, and marketing materials. Created a cohesive visual identity that reflects the company's modern and professional values.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Adobe Illustrator</span>
                            <span class="tech-tag">Photoshop</span>
                            <span class="tech-tag">InDesign</span>
                            <span class="tech-tag">Brand Guidelines</span>
                        </div>
                    </div>
                </a>
                
                <!-- 3. Digital Marketing -->
                <a href="{{ route('portfolio.detail', ['project' => 'social-media-campaign']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80" alt="Digital Marketing">
                    <div class="portfolio-overlay">
                        <h3>Social Media Campaign</h3>
                        <p class="project-category">Digital Marketing</p>
                        <p class="project-description">Comprehensive social media strategy across Facebook, Instagram, and LinkedIn. Increased engagement by 300% and generated 50% more qualified leads through targeted content and paid advertising campaigns.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Facebook Ads</span>
                            <span class="tech-tag">Instagram Marketing</span>
                            <span class="tech-tag">Google Analytics</span>
                            <span class="tech-tag">Content Strategy</span>
                        </div>
                    </div>
                </a>
                
                <!-- 4. SEO & Content Writing -->
                <a href="{{ route('portfolio.detail', ['project' => 'blog-content-strategy']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=800&q=80" alt="SEO & Content Writing">
                    <div class="portfolio-overlay">
                        <h3>Blog Content Strategy</h3>
                        <p class="project-category">SEO & Content Writing</p>
                        <p class="project-description">Developed comprehensive content strategy with 50+ SEO-optimized blog posts. Achieved #1 ranking for 15 target keywords and increased organic traffic by 250% within 6 months.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Keyword Research</span>
                            <span class="tech-tag">Content Writing</span>
                            <span class="tech-tag">On-Page SEO</span>
                            <span class="tech-tag">Analytics</span>
                        </div>
                    </div>
                </a>
                
                <!-- 5. App Development -->
                <a href="{{ route('portfolio.detail', ['project' => 'fitness-tracking-app']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="App Development">
                    <div class="portfolio-overlay">
                        <h3>Fitness Tracking App</h3>
                        <p class="project-category">App Development</p>
                        <p class="project-description">Cross-platform mobile app for fitness tracking with real-time data sync, workout plans, and social features. Built with React Native and Firebase backend, supporting both iOS and Android platforms.</p>
                        <div class="project-tech">
                            <span class="tech-tag">React Native</span>
                            <span class="tech-tag">Firebase</span>
                            <span class="tech-tag">Redux</span>
                            <span class="tech-tag">HealthKit API</span>
                        </div>
                    </div>
                </a>
                
                <!-- 6. UI/UX Designing -->
                <a href="{{ route('portfolio.detail', ['project' => 'banking-app-interface']) }}" class="portfolio-item" wire:navigate>
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&w=800&q=80" alt="UI/UX Designing">
                    <div class="portfolio-overlay">
                        <h3>Banking App Interface</h3>
                        <p class="project-category">UI/UX Designing</p>
                        <p class="project-description">Complete UI/UX redesign for mobile banking application. Improved user experience with intuitive navigation, accessibility features, and modern design principles. Increased user satisfaction by 40%.</p>
                        <div class="project-tech">
                            <span class="tech-tag">Figma</span>
                            <span class="tech-tag">Prototyping</span>
                            <span class="tech-tag">User Research</span>
                            <span class="tech-tag">Design System</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>
