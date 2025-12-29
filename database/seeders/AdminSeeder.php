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

        // Create default settings with translations
        $siteNameSetting = Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => 'UPLANCE', 'type' => 'text']
        );
        $siteNameSetting->value_translations = ['en' => 'UPLANCE', 'lt' => 'UPLANCE'];
        $siteNameSetting->save();

        $siteTitleSetting = Setting::updateOrCreate(
            ['key' => 'site_title'],
            ['value' => 'UPLANCE Web Agency', 'type' => 'text']
        );
        $siteTitleSetting->value_translations = ['en' => 'UPLANCE Web Agency', 'lt' => 'UPLANCE svetainių agentūra'];
        $siteTitleSetting->save();

        Setting::set('logo', 'images/logo.png');

        $footerTextSetting = Setting::updateOrCreate(
            ['key' => 'footer_text'],
            ['value' => '© 2024 UPLANCE. All rights reserved.', 'type' => 'text']
        );
        $footerTextSetting->value_translations = ['en' => '© 2024 UPLANCE. All rights reserved.', 'lt' => '© 2024 UPLANCE. Visos teisės saugomos.'];
        $footerTextSetting->save();

        Setting::set('contact_email', 'info@uplance.com');
        Setting::set('contact_phone', '+1 234 567 8900');

        $addressSetting = Setting::updateOrCreate(
            ['key' => 'address'],
            ['value' => '123 Business Street, City, Country', 'type' => 'text']
        );
        $addressSetting->value_translations = ['en' => '123 Business Street, City, Country', 'lt' => '123 Verslo gatvė, Miestas, Šalis'];
        $addressSetting->save();

        $aboutTextSetting = Setting::updateOrCreate(
            ['key' => 'about_text'],
            ['value' => 'UPLANCE is a leading web agency providing innovative digital solutions and services. We are committed to delivering excellence and being "The Place 2 Be" for our clients, partners, and team members.', 'type' => 'text']
        );
        $aboutTextSetting->value_translations = [
            'en' => 'UPLANCE is a leading web agency providing innovative digital solutions and services. We are committed to delivering excellence and being "The Place 2 Be" for our clients, partners, and team members.',
            'lt' => 'UPLANCE yra pagrindinė svetainių agentūra, teikianti novatoriškus skaitmeninius sprendimus ir paslaugas. Mes esame įsipareigoję teikti puikybę ir būti "Vieta, kur reikia būti" mūsų klientams, partneriams ir komandos nariams.'
        ];
        $aboutTextSetting->save();

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

        // Complete Service translations mapping with all fields
        $serviceTranslations = [
            'Website Development' => [
                'title' => 'Svetainės kūrimas',
                'description' => 'UPLANCE mes kuriate elegantiškas ir šiuolaikiškas svetaines jūsų verslui. Mes sutelkiame dėmesį į greitų, mobiliesiems pritaikytų ir optimizuotų svetainių kūrimą, kad lankytojai taptų klientais.',
                'intro' => 'Svetainės turėjimas yra būtinas kiekvienam verslui ir svarbus patikimos santykių su klientais kūrimui, taip pat paslaugų pristatymui ir internetinės buvimo stiprinimui. Tinkama svetainė keičia žaidimo taisykles ir leidžia verslui išlikti konkurencingam ir padidinti pardavimus. Svetainės yra labai naudingos mažiesiems ir augantiems verslams, siekiant padidinti vertę skaitmeninėje erdvėje.',
                'closing' => 'Mes kuriate svetaines, kurios yra patogios vartotojams, orientuotos į verslo augimą ir estetiškai patrauklios. Mūsų agentūra siūlo šiuolaikiškus dizainus, optimizuotas svetaines, SEO draugišką kūrimą ir švarus sprendimus svetainių kūrimui. Siūlome daugybę atnaujinimų, svetainių taisymų ir patobulinimų, kad jūsų svetainė visada veiktų geriausiai.',
                'services_list' => [
                    'Svetainės dizainas, individualus',
                    'Svetainės kūrimas, mobilus',
                    'Elektroninės prekybos svetainių kūrimas',
                    'WordPress ir kitų CMS kūrimas',
                    'Svetainės atnaujinimas',
                    'Greičio ir našumo optimizavimas',
                    'Priežiūra ir palaikymas, tęstinis'
                ],
            ],
            'Graphic Designing' => [
                'title' => 'Grafikos dizainas',
                'description' => 'Su UPLANCE jūsų prekės ženklas gaus nuostabius grafinius dizainus, kad padidintų matomumą. Suprantame, kad geras dizainas yra daugiau nei estetika; tai efektyvus komunikavimas.',
                'intro' => 'Mūsų dizaino komanda užtikrins, kad jūsų grafiniai dizainai patrauktų auditorijos dėmesį, įkvėptų pasitikėjimą ir leistų jūsų prekės ženklui palikti ilgai prisimenamą įspūdį. Padėsime jums įgyvendinti jūsų viziją per kūrybiškumą ir kokybę, nesvarbu, ar pradedate prekės ženklą nuo nulio, ar esate naujos tapatybės kūrimo procese.',
                'closing' => 'Nesvarbu, kokio dizaino poreikis ar įrankiai, kuriuos jūs renkatės, mes leisime jūsų prekės ženklui patraukti auditorijos dėmesį profesionaliu grafiniu dizainu. Padarykime skirtumą jūsų prekės ženklo matomumui šiandien!',
                'services_list' => [
                    'Išsiskirti iš konkurentų per įsimenamą ir unikalų logotipą yra pirmasis žingsnis kuriant sėkmingą prekės ženklą, ir mes užtikrinsime, kad būtumėte teisingame kelyje.',
                    'Kuriame patrauklų socialinės žiniasklaidos turinį ir reklamas, kad palengvintume auditorijos įsitraukimą.',
                    'Kursime aukštos kokybės profesionalias rinkodaros medžiagas, įskaitant skrajutes, brošiūras, plakatus ir vizitines korteles.',
                    'Mūsų komanda suteiks vieningą virtualų buvimą per sklandžius ir profesionalius vizualinius sprendimus reklamoms, svetainėms ir internetinėms kampanijoms.',
                    'Mūsų dizaino komanda padidins jūsų produktų matomumą per profesionalų grafinių dizainą, kad produktai išsiskirtų internetinėse platformose ir lentynose.'
                ],
                'why_choose' => [
                    'Unikalūs grafiniai dizainai',
                    'Laiku užbaigti projektai, išlaikant kokybę',
                    'Pritaikytos paslaugos jūsų poreikiams',
                    'Dizaino nuoseklumas su jūsų verslo vizija'
                ],
            ],
            'Digital Marketing' => [
                'title' => 'Skaitmeninis marketingas',
                'description' => 'Siūlome visą skaitmeninio marketingo paslaugų komplektą. Mūsų strategijos sukurtos padidinti jūsų internetinį matomumą, pritraukti srautą ir paversti lankytojus ištikimais klientais.',
            ],
            'SEO & Content Writing' => [
                'title' => 'SEO ir turinio kūrimas',
                'description' => 'Vietinė paieškos sistemų optimizacija kelia žaidimą vietiniams mažiesiems ir vidutinio dydžio verslams. Ypač paslaugų sektoriuose, kur klientai gali rinktis iš įvairių paslaugų teikėjų.',
                'intro' => 'Dabar, kai jie lengvai renkasi artimiausią teikėją, tai gali žymiai paveikti paslaugų teikėjo potencialių klientų generavimo potencialą. Kai verslai pradeda dominuoti vietinėse paieškos rezultatuose, klientai linkę identifikuoti verslą su jiems reikalingomis paslaugomis ir gali lengvai suvokti. UPLANCE mes optimizuojame SEO kampanijas, kurios padeda verslams pasirodyti paieškos rezultatuose savo klientų akivaizdoje. Nesvarbu, ar jie aptarnauja vieną miestą, ar daug, mes didiname jų buvimą, pritraukiame kvalifikuotus potencialius klientus, optimizuojame vietinių paieškų konversiją, kad pridėtume pajamų verslui.',
                'note' => 'Šiandienos itin konkurencinėje internetinėje platformoje pasirodymas pirmoje sekcijoje ir pirmame puslapyje paieškos rezultatų yra esminis. Jei jūsų svetainė nepasirodo, jūsų potencialūs klientai ir svetainės lankytojai yra perimami jūsų konkurentų. Siekiame tai išspręsti, leisdami verslo svetainėms tapti potencialių klientų generavimo varikliais. Žinome, kad daugelis skaitmeninio marketingo agentūrų linkusios per daug komplikuoti SEO procesą, esame tikri, kad tai tiesiog humanizuojame jūsų svetainę su mūsų sistemingu strateginiu skaitmeninio marketingo procesu.',
                'closing' => 'Gausite padidintą svetainės matomumą, padidintą SEO srautą ir pagerintą patikimumą. Mūsų požiūris padidina konversijų tikimybę ir skatina tvarų verslo plėtrą.',
                'benefits' => [
                    'Padidintas svetainės matomumas',
                    'Padidintas SEO srautas',
                    'Pagerintas patikimumas',
                    'Padidinta konversijų tikimybė',
                    'Skatomas tvarus verslo plėtra'
                ],
                'service_details' => [
                    [
                        'title' => 'Raktažodžių radimas ir plano formavimas',
                        'description' => 'Randame pelningus, mažos konkurencijos ir didelio ketinimo raktažodžius, kurių ieško jūsų klientai, kad gautume tikrą vertę.'
                    ],
                    [
                        'title' => 'Turinio optimizavimas internete',
                        'description' => 'Pritaikome kiekvieną jūsų svetainės dalį paieškos sistemoms, kad geriau suprastų ir įvertintų svetainės turinį.',
                        'sub_items' => [
                            'Meta antraštės ir aprašymai',
                            'Antraščių struktūra',
                            'Vaizdų optimizavimas',
                            'URL pakeitimai',
                            'Svetainės greičio patobulinimai'
                        ]
                    ],
                    [
                        'title' => 'Techninis SEO',
                        'description' => 'Svetainės infrastruktūros patobulinimai, kurie pagerina svetainės bendrą našumą ir reitingavimo galimybes.',
                        'sub_items' => [
                            'Pilnas svetainės backend auditas',
                            'Svetainės indeksavimo ir naršymo problemos',
                            'Pagrindiniai interneto esmės'
                        ]
                    ],
                    [
                        'title' => 'Vietinės SEO strategijos turėjimas',
                        'description' => 'Puikiai tinka verslams, siekiantiems pasiekti konkretų miestą, regioną ar paslaugų sritį.',
                        'sub_items' => [
                            'Geresnis Google verslo profilis',
                            'Vietinės nuorodos',
                            'Vietinių raktažodžių optimizavimas',
                            'Atsiliepimai ir reputacijos valdymas'
                        ]
                    ],
                    [
                        'title' => 'Atgalinių nuorodų kūrimas ir off-page SEO',
                        'description' => 'Darbas su SEO strategija, kuri stiprina ir sustiprina svetainės domeną, didindama bendrą pasitikėjimą, kuriant aukštos kokybės atgalines nuorodas.',
                        'sub_items' => [
                            'Svečių tinklaraščiai',
                            'Nišos peržiūros',
                            'Katalogų pateikimai',
                            'Prekės ženklo paminėjimai'
                        ]
                    ],
                    [
                        'title' => 'Mėnesiniai SEO ataskaitos ir analitika',
                        'description' => 'Visada žinosite, ko tikėtis. Mūsų ataskaitos pagrįstos:',
                        'sub_items' => [
                            'Raktažodžių sekimas',
                            'Svetainės srauto augimas',
                            'Svetainės sveikata',
                            'Atlikti veiksmai',
                            'Bendras plėtra'
                        ]
                    ]
                ],
            ],
            'App Development' => [
                'title' => 'Programų kūrimas',
                'description' => 'Čia, Uplance, mes kuriate galingas, vertės orientuotas ir patogias mobiliąsias programas, kad jūsų verslas galėtų susisiekti bet kada ir bet kur. Mes kuriate programas, kurios pirmiausia teikia puikią vartotojo patirtį.',
                'intro' => 'Galime paversti jūsų idėją baigtu produktu! Ar norėtumėte paleisti savo projektą tiek Android, tiek iOS programose? Jokios problemos!',
                'closing' => 'Nuo pramonės iššūkių sprendimo iki skaitmeninės inovacijos skatinimo, mes padedame prekės ženklams kurti programas, kurios įtraukia vartotojus ir skatina verslo augimą. Konstruktyviai patobuliname pasiūlymą paleidimui. Pradėkime kurti jūsų programą!',
                'note' => 'Programų inžinerija reikalauja vizualizacijos ir projekcijos, kad programa atitiktų reikalaujamus šiuolaikinius standartus technologiškai pažangiam produktui.',
                'services_list' => [
                    'Kuriame visiškai pritaikytas, pirmos klasės ir technines Android programas.',
                    'Kuriame saugias ir sklandžias iOS programas, pritaikytas teikti geriausią programinės įrangos patirtį Apple vartotojams.',
                    'Kuriame daugiafunkcines programas, veikiančias tiek Android, tiek iOS sistemose.',
                    'Teikiame šiuolaikišką ir intuityvią programinę įrangą, kad vartotojai mėgautųsi ir nuolat įsitrauktų.',
                    'Siūlome dažnus atnaujinimus, kad jūsų programa veiktų savo inžinerijos viršūnėje.'
                ],
                'why_choose' => [
                    'Pritaikyti sprendimai, gerai tinkantys jūsų įmonės strategijai',
                    'Greiti, saugūs ir plečiami',
                    'Kuriame su paprastumu ir sklandumu mintyse',
                    'Plečiamos sąsajos ir laiku paleidimai',
                    'Patyrę komandos, naudojančios naujausias technologijas, kad padėtų jums greitai plėtoti'
                ],
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

                // Title translations
                $serviceData['title_translations'] = [
                    'en' => $data['title'],
                    'lt' => $trans['title'] ?? $data['title']
                ];

                // Description translations
                $serviceData['description_translations'] = [
                    'en' => $data['description'],
                    'lt' => $trans['description'] ?? $data['description']
                ];

                // Intro translations
                if (isset($data['intro'])) {
                    $serviceData['intro_translations'] = [
                        'en' => $data['intro'],
                        'lt' => $trans['intro'] ?? $data['intro']
                    ];
                }

                // Closing translations
                if (isset($data['closing'])) {
                    $serviceData['closing_translations'] = [
                        'en' => $data['closing'],
                        'lt' => $trans['closing'] ?? $data['closing']
                    ];
                }

                // Note translations
                if (isset($data['note'])) {
                    $serviceData['note_translations'] = [
                        'en' => $data['note'],
                        'lt' => $trans['note'] ?? $data['note']
                    ];
                }

                // Services list translations (JSON array)
                if (isset($data['services']) && isset($trans['services_list'])) {
                    $serviceData['services_list_translations'] = [
                        'en' => $data['services'],
                        'lt' => $trans['services_list']
                    ];
                }

                // Why choose translations (JSON array)
                if (isset($data['why_choose']) && isset($trans['why_choose'])) {
                    $serviceData['why_choose_translations'] = [
                        'en' => $data['why_choose'],
                        'lt' => $trans['why_choose']
                    ];
                }

                // Benefits translations (JSON array)
                if (isset($data['benefits']) && isset($trans['benefits'])) {
                    $serviceData['benefits_translations'] = [
                        'en' => $data['benefits'],
                        'lt' => $trans['benefits']
                    ];
                }

                // Service details translations (complex JSON array)
                if (isset($data['service_details']) && isset($trans['service_details'])) {
                    $serviceData['service_details_translations'] = [
                        'en' => $data['service_details'],
                        'lt' => $trans['service_details']
                    ];
                }
            } else {
                // If no translations available, set English as default
                $serviceData['title_translations'] = ['en' => $data['title']];
                $serviceData['description_translations'] = ['en' => $data['description']];
                if (isset($data['intro'])) {
                    $serviceData['intro_translations'] = ['en' => $data['intro']];
                }
                if (isset($data['closing'])) {
                    $serviceData['closing_translations'] = ['en' => $data['closing']];
                }
                if (isset($data['note'])) {
                    $serviceData['note_translations'] = ['en' => $data['note']];
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

        // Lithuanian translations for portfolio items
        $portfolioTranslations = [
            'e-commerce-platform' => [
                'title_translations' => ['lt' => 'Elektroninės prekybos platforma'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Šiuolaikiškas elektroninės prekybos sprendimas su Laravel backend, React frontend ir integruotu mokėjimo apdorojimu. Funkcijos apima vartotojo autentifikavimą, produktų valdymą, krepšelį ir užsakymų sekimą.'],
                'web_type_translations' => ['lt' => 'Elektroninės prekybos platforma'],
                'use_cases_translations' => ['lt' => 'Internetinės parduotuvės, mažmeninės įmonės, rinkos platformos, B2B prekyba'],
                'challenge_translations' => ['lt' => 'Mastuojamos elektroninės prekybos platformos kūrimas, kuri gali valdyti didelį srautą ir sudėtingus produktų variantus, išlaikant puikią vartotojo patirtį ir saugų mokėjimo apdorojimą.'],
                'solution_translations' => ['lt' => 'Mes įgyvendiname mikroservisų architektūrą su šiuolaikinėmis sistemomis, RESTful API dizainu ir debesų infrastruktūra. Funkcijos apima saugius mokėjimo šliuzus, realaus laiko inventoriaus valdymą, pažangų produktų filtravimą ir mobilųjį dizainą.'],
                'technologies_translations' => ['Laravel', 'React', 'MySQL', 'Stripe API'],
                'results_translations' => [
                    'Mastuojama architektūra augantiems verslams',
                    'Greitas apmokėjimo procesas su keliais mokėjimo variantais',
                    'SEO optimizuota geresniam paieškos matomumui',
                    'Mobilusis pirmasis reaguojantis dizainas'
                ],
                'features_translations' => [
                    'Vartotojo autentifikavimas ir autorizavimas',
                    'Produktų katalogas su pažangiu filtravimu',
                    'Krepšelio ir pageidavimų sąrašo funkcijos',
                    'Saugus mokėjimo apdorojimas',
                    'Užsakymų sekimas ir valdymas',
                    'Administratoriaus skydelis inventoriui',
                    'Mobilusis reaguojantis dizainas',
                    'SEO optimizavimas'
                ],
            ],
            'saas-application' => [
                'title_translations' => ['lt' => 'SaaS programinė įranga'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Debesų pagrindu veikianti SaaS platforma su daugiabučių architektūra, prenumeratos valdymu ir realaus laiko bendradarbiavimo funkcijomis. Sukurta mastuojamumui ir dideliam našumui.'],
                'web_type_translations' => ['lt' => 'SaaS programinė įranga'],
                'use_cases_translations' => ['lt' => 'Projektų valdymo įrankiai, CRM sistemos, verslo automatizavimas, bendradarbiavimo platformos'],
                'challenge_translations' => ['lt' => 'Mastuojamos daugiabučių SaaS platformos kūrimas, kuri gali valdyti tūkstančius vienalaikių vartotojų, išlaikant greitą našumą, realaus laiko sinchronizavimą ir saugų duomenų izoliavimą.'],
                'solution_translations' => ['lt' => 'Mes kuriate mikroservisų architektūrą su šiuolaikinėmis frontend sistemomis, tvirtomis backend API ir debesų infrastruktūra. Funkcijos apima prenumeratos faktūravimą, vaidmenų pagrįstą prieigos kontrolę, realaus laiko atnaujinimus per WebSockets ir automatizuotą mastavimą.'],
                'technologies_translations' => ['Vue.js', 'Node.js', 'PostgreSQL', 'AWS', 'Docker'],
                'results_translations' => [
                    'Daugiabučių architektūra efektyviam išteklių naudojimui',
                    'Prenumeratos valdymas su keliais faktūravimo modeliais',
                    'Realaus laiko bendradarbiavimas ir pranešimai',
                    'Mastuojama infrastruktūra augimui'
                ],
                'features_translations' => [
                    'Daugiabučių architektūra',
                    'Realaus laiko bendradarbiavimas',
                    'Pažangus analitikos skydelis',
                    'API integracijos galimybės',
                    'Prenumeratos valdymas',
                    'Vaidmenų pagrįsta prieigos kontrolė',
                    'Automatizuota atsarginio kopijavimo sistema',
                    'Mobilusis reaguojantis dizainas'
                ],
            ],
            'corporate-website' => [
                'title_translations' => ['lt' => 'Korporacinė svetainė'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Šiuolaikiška korporacinė svetainė su CMS integracija, daugiakalbėmis funkcijomis ir pažangia SEO optimizacija. Funkcijos apima komandos valdymą, naujienų/tinklaraščio sistemą ir kontaktų formas.'],
                'web_type_translations' => ['lt' => 'Korporacinė svetainė'],
                'use_cases_translations' => ['lt' => 'Verslo svetainės, įmonių portfeliai, profesionalios paslaugos, korporacinis prekės ženklas'],
                'challenge_translations' => ['lt' => 'Profesionalios korporacinės svetainės kūrimas, kuri efektyviai atstovauja įmonės prekės ženklą, teikia puikią vartotojo patirtį ir yra lengvai valdoma ir atnaujinama netechninio personalo.'],
                'solution_translations' => ['lt' => 'Mes kuriate individualias reaguojančias svetaines su šiuolaikinėmis CMS platformomis, drag-and-drop puslapių kūrėjais ir išsamia SEO optimizacija. Funkcijos apima daugiakalbę paramą, komandos narių profilius, naujienų/tinklaraščio skyrius ir integruotas kontaktų sistemas.'],
                'technologies_translations' => ['WordPress', 'PHP', 'MySQL', 'Elementor', 'Yoast SEO'],
                'results_translations' => [
                    'Profesionalus prekės ženklo atstovavimas',
                    'SEO optimizuota geresniam matomumui',
                    'Lengva turinio valdymo sistema',
                    'Daugiakalbės palaikymo galimybės'
                ],
                'features_translations' => [
                    'Individuali WordPress tema',
                    'Daugiakalbė parama',
                    'SEO optimizuota',
                    'Turinio valdymo sistema',
                    'Komandos narių profiliai',
                    'Naujienų/tinklaraščio sistema',
                    'Kontaktų formos integracija',
                    'Analitikos integracija'
                ],
            ],
            'blog-platform' => [
                'title_translations' => ['lt' => 'Šiuolaikiška tinklaraščio platforma'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Pažangaus tinklaraščio platforma su markdown redaktoriumi, socialiniu dalijimusi, komentarų sistema ir naujienlaiškio integracija. Sukurta turinio kūrėjams ir leidykloms.'],
                'web_type_translations' => ['lt' => 'Tinklaraštis ir medijų platforma'],
                'use_cases_translations' => ['lt' => 'Turinio rinkodara, naujienų svetainės, asmeniniai tinklaraščiai, leidybos platformos, medijų leidiniai'],
                'challenge_translations' => ['lt' => 'Greitos, SEO draugiškos tinklaraščio platformos kūrimas, kuri gali valdyti didelį srautą, teikti puikią turinio kūrimo patirtį ir maksimaliai padidinti skaitytojų įsitraukimą.'],
                'solution_translations' => ['lt' => 'Mes kuriate šiuolaikiškas tinklaraščių platformas naudodami serverio pusės renderinimą SEO, be galvos CMS turinio valdymui ir optimizuotas talpinimo strategijas. Funkcijos apima markdown redaktorių, socialinį dalijimąsi, komentarų sistemas ir naujienlaiškio integraciją.'],
                'technologies_translations' => ['Next.js', 'Strapi CMS', 'PostgreSQL', 'Redis', 'Vercel'],
                'results_translations' => [
                    'SEO optimizuota paieškos matomumui',
                    'Greiti puslapių įkėlimai su optimizuotu našumu',
                    'Patogi turinio valdymo sistema',
                    'Socialinio dalijimosi ir įsitraukimo funkcijos'
                ],
                'features_translations' => [
                    'Markdown redaktorius',
                    'SEO optimizavimas',
                    'Socialinių tinklų integracija',
                    'Komentarų sistema',
                    'Naujienlaiškio prenumerata',
                    'Kategorijų ir žymių sistema',
                    'Paieškos funkcija',
                    'RSS kanalo palaikymas'
                ],
            ],
            'learning-management-system' => [
                'title_translations' => ['lt' => 'Mokymosi valdymo sistema'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Išsami LMS platforma su kursų valdymu, vaizdo transliacija, viktorinomis, sertifikatais ir studentų pažangos sekimu. Sukurta švietimo įstaigoms.'],
                'web_type_translations' => ['lt' => 'Mokymosi valdymo sistema'],
                'use_cases_translations' => ['lt' => 'Internetiniai kursai, mokymo platformos, švietimo įstaigos, korporacinis mokymas, įgūdžių plėtra'],
                'challenge_translations' => ['lt' => 'Tvirtos mokymosi valdymo sistemos kūrimas, kuri gali valdyti vaizdo transliaciją, kursų valdymą, studentų vertinimus ir pažangos sekimą, išlaikant puikią vartotojo patirtį.'],
                'solution_translations' => ['lt' => 'Mes kuriate išsamias LMS platformas su vaizdo transliacijos galimybėmis, interaktyviu kursų valdymu, vertinimo įrankiais ir pažangos sekimu. Funkcijos apima sertifikatų generavimą, diskusijų forumus ir mokėjimo integraciją.'],
                'technologies_translations' => ['Laravel', 'Vue.js', 'MySQL', 'AWS S3', 'FFmpeg'],
                'results_translations' => [
                    'Išsamus kursų valdymas',
                    'Vaizdo transliacija ir turinio pristatymas',
                    'Studentų pažangos sekimas ir analitika',
                    'Interaktyvios viktorinos ir vertinimai'
                ],
                'features_translations' => [
                    'Kursų kūrimas ir valdymas',
                    'Vaizdo transliacijos platforma',
                    'Interaktyvios viktorinos',
                    'Sertifikatų generavimas',
                    'Studentų pažangos sekimas',
                    'Diskusijų forumai',
                    'Mokėjimo integracija',
                    'Mobilusis reaguojantis dizainas'
                ],
            ],
            'real-estate-portal' => [
                'title_translations' => ['lt' => 'Nekilnojamojo turto portalas'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Nekilnojamojo turto skelbimų portalas su pažangiais paieškos filtrais, žemėlapiais, agentų profiliais ir potencialių klientų gavimo formomis.'],
                'web_type_translations' => ['lt' => 'Nekilnojamojo turto portalas'],
                'use_cases_translations' => ['lt' => 'Nekilnojamojo turto skelbimai, nekilnojamojo turto agentūros, nuomos platformos, nekilnojamojo turto valdymas'],
                'challenge_translations' => ['lt' => 'Greitos geolokacijos paieškos su sudėtingais filtrais tūkstančiams nekilnojamojo turto objektų kūrimas, teikiant puikią vartotojo patirtį ir potencialių klientų valdymą.'],
                'solution_translations' => ['lt' => 'Mes kuriate nekilnojamojo turto portalus su pažangia paieškos funkcija, interaktyviais žemėlapiais, nekilnojamojo turto filtravimu ir potencialių klientų gavimo sistemomis. Funkcijos apima agentų profilius, išsaugotas paieškas ir nekilnojamojo turto palyginimo įrankius.'],
                'technologies_translations' => ['Laravel', 'Alpine.js', 'MySQL', 'LeafletJS'],
                'results_translations' => [
                    'Greita nekilnojamojo turto paieška su geolokacija',
                    'Pažangūs filtravimo ir rūšiavimo variantai',
                    'Interaktyvi žemėlapio integracija',
                    'Potencialių klientų gavimo ir valdymo sistema'
                ],
                'features_translations' => [
                    'Geografinė paieška ir žemėlapiai',
                    'Išsaugotos paieškos',
                    'Agentų profiliai',
                    'Potencialių klientų formos',
                    'Nekilnojamojo turto palyginimas',
                    'Vaizdų galerijos',
                    'Virtualaus turės integracija',
                    'Mobilusis reaguojantis dizainas'
                ],
            ],
            'booking-reservation-system' => [
                'title_translations' => ['lt' => 'Rezervavimo ir rezervacijos sistema'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Pilna rezervavimo sistema su prieinamumo kalendoriais, mokėjimo apdorojimu ir pranešimais.'],
                'web_type_translations' => ['lt' => 'Rezervavimo ir rezervacijos sistema'],
                'use_cases_translations' => ['lt' => 'Viešbučiai, restoranai, susitikimai, renginiai, ekskursijos, paslaugų planavimas'],
                'challenge_translations' => ['lt' => 'Dvigubų rezervacijų prevencija, laiko juostų jautraus prieinamumo valdymas ir sudėtingų planavimo scenarijų valdymas, teikiant sklandų mokėjimo apdorojimą.'],
                'solution_translations' => ['lt' => 'Mes kuriate tvirtas rezervavimo sistemas su realaus laiko prieinamumo valdymu, atominiu rezervacijos apdorojimu ir saugia mokėjimo integracija. Funkcijos apima kalendoriaus valdymą, automatizuotus pranešimus ir grąžinimo apdorojimą.'],
                'technologies_translations' => ['Laravel', 'Livewire', 'Stripe', 'MySQL'],
                'results_translations' => [
                    'Realaus laiko prieinamumo valdymas',
                    'Saugus mokėjimo apdorojimas',
                    'Automatizuotas patvirtinimas ir priminimai',
                    'Dvigubų rezervacijų prevencija'
                ],
                'features_translations' => [
                    'Prieinamumo kalendoriai',
                    'Kuponų kodai',
                    'El. pašto/SMS perspėjimai',
                    'Grąžinimo srautai',
                    'Kelių laiko juostų palaikymas',
                    'Mokėjimo integracija',
                    'Rezervavimo valdymo skydelis',
                    'Klientų pranešimai'
                ],
            ],
            'news-portal' => [
                'title_translations' => ['lt' => 'Naujienų portalas'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Didelio srauto naujienų portalas su redakciniais darbo procesais, kategorijomis, žymėmis ir reklamos blokais.'],
                'web_type_translations' => ['lt' => 'Naujienų portalas'],
                'use_cases_translations' => ['lt' => 'Naujienų svetainės, medijų leidiniai, internetiniai žurnalai, turinio leidėjai, žurnalistikos platformos'],
                'challenge_translations' => ['lt' => 'Realaus laiko turinio teikimas milijonams skaitytojų su puikiu SEO, greitais puslapių įkėlimais ir momentiniu talpinimo anuliavimu, išlaikant redakcinius darbo procesus.'],
                'solution_translations' => ['lt' => 'Mes kuriate didelio našumo naujienų portalus naudodami serverio pusės renderinimą, krašto talpinimą ir optimizuotą turinio pristatymą. Funkcijos apima redakcinius darbo procesus, turinio planavimą, AMP palaikymą ir reklamos integraciją.'],
                'technologies_translations' => ['Next.js', 'Laravel API', 'Redis', 'PostgreSQL'],
                'results_translations' => [
                    'SEO optimizuota paieškos matomumui',
                    'Greiti puslapių įkėlimai su optimizuotu talpinimu',
                    'Realaus laiko turinio atnaujinimai',
                    'Redakcinių darbo procesų valdymas'
                ],
                'features_translations' => [
                    'Redaktorių vaidmenys',
                    'Turinio planavimas',
                    'AMP palaikymas',
                    'Reklamos vietos',
                    'Kategorijų ir žymių sistema',
                    'Komentarų moderavimas',
                    'Socialinį dalijimasis',
                    'Naujienlaiškio integracija'
                ],
            ],
            'healthcare-portal' => [
                'title_translations' => ['lt' => 'Sveikatos portalas'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'HIPAA atitinkamas sveikatos portalas su susitikimais, paciento skydeliais ir saugiu pranešimų siuntimu.'],
                'web_type_translations' => ['lt' => 'Sveikatos portalas'],
                'use_cases_translations' => ['lt' => 'Ligoninės, klinikos, medicininės praktikos, telemedicina, paciento portalai, sveikatos valdymas'],
                'challenge_translations' => ['lt' => 'HIPAA atitikties ir duomenų saugumo užtikrinimas, teikiant prieinamą paciento patirtį ir sklandų susitikimų valdymą.'],
                'solution_translations' => ['lt' => 'Mes kuriate saugius sveikatos portalus su šifruota duomenų saugykla, vaidmenų pagrįsta prieigos kontrole ir išsamiais audito takais. Funkcijos apima susitikimų planavimą, paciento skydelius, saugų pranešimų siuntimą ir automatizuotus priminimus.'],
                'technologies_translations' => ['Laravel', 'Tailwind', 'MySQL', 'Twilio'],
                'results_translations' => [
                    'HIPAA atitinkama saugi platforma',
                    'Lengvas susitikimų valdymas',
                    'Paciento portalo prieiga',
                    'Automatizuotos priminimų sistemos'
                ],
                'features_translations' => [
                    'Elektroninis registracija',
                    'Saugus pokalbis',
                    'Susitikimų priminimai',
                    'Paciento ataskaitos',
                    'Medicininės dokumentacijos prieiga',
                    'Receptų valdymas',
                    'Sąskaitų integracija',
                    'Telemedicinos palaikymas'
                ],
            ],
            'fintech-dashboard' => [
                'title_translations' => ['lt' => 'FinTech analitikos skydelis'],
                'category_translations' => ['lt' => 'Svetainės kūrimas'],
                'description_translations' => ['lt' => 'Realaus laiko finansinė analitika su diagramomis, perspėjimais ir vaidmenų pagrįsta prieigos kontrole.'],
                'web_type_translations' => ['lt' => 'FinTech analitikos skydelis'],
                'use_cases_translations' => ['lt' => 'Finansinės paslaugos, investicijų platformos, bankų skydeliai, prekybos platformos, finansinė analitika'],
                'challenge_translations' => ['lt' => 'Realaus laiko finansinių duomenų srautas mastu su tiksliomis agregacijomis, išsamiomis leidimais ir saugiu duomenų tvarkymu.'],
                'solution_translations' => ['lt' => 'Mes kuriate finansinius skydelius su realaus laiko duomenų srautu, laiko serijų duomenų bazėmis ir smulkia vaidmenų pagrįsta prieigos kontrole. Funkcijos apima interaktyvias diagramas, pritaikomus perspėjimus, duomenų eksportavimą ir API integracijas.'],
                'technologies_translations' => ['React', 'Laravel', 'TimescaleDB', 'WebSockets'],
                'results_translations' => [
                    'Realaus laiko finansinių duomenų vizualizacija',
                    'Pritaikomi analitikos skydeliai',
                    'Saugus duomenų tvarkymas ir leidimai',
                    'Veiksmingi įžvalgos ir perspėjimai'
                ],
                'features_translations' => [
                    'Detalių diagramų analizė',
                    'Duomenų eksportavimas',
                    'Komandos vaidmenys ir leidimai',
                    'API integracijos',
                    'Realaus laiko atnaujinimai',
                    'Pritaikomi valdikliai',
                    'Perspėjimų sistemos',
                    'Istorinių duomenų analizė'
                ],
            ],
            'brand-identity-design' => [
                'title_translations' => ['lt' => 'Prekės ženklo tapatybės dizainas'],
                'category_translations' => ['lt' => 'Grafikos dizainas'],
                'description_translations' => ['lt' => 'Pilnas prekės ženklo tapatybės paketas, įskaitant logotipo dizainą, vizitines korteles, antraštės popierių ir rinkodaros medžiagas. Sukurta vientisa vizualinė tapatybė, atspindinti įmonės šiuolaikiškas ir profesionalias vertybes.'],
                'challenge_translations' => ['lt' => 'Unikalios prekės ženklo tapatybės kūrimas, kuri išsiskirtų konkurencinėje rinkoje, išlaikant profesionalų patikimumą.'],
                'solution_translations' => ['lt' => 'Sukurta išsami prekės ženklo strategija su šiuolaikiška tipografija, vientisa spalvų palete ir universalia logotipo sistema, veikiančia visose medijų platformose.'],
                'technologies_translations' => ['Adobe Illustrator', 'Photoshop', 'InDesign', 'Prekės ženklo gairės'],
                'results_translations' => [
                    'Prekės ženklo atpažinimas padidėjo 200%',
                    'Kliento pasitenkinimo įvertinimas: 9,5/10',
                    'Apdovanotas dizainas',
                    'Naudota daugiau nei 50 rinkodaros medžiagų'
                ],
                'features_translations' => [
                    'Pagrindiniai ir antriniai logotipo variantai',
                    'Pilna spalvų paletė',
                    'Tipografijos sistema',
                    'Vizitinių kortelių dizainas',
                    'Antraštės popieriaus ir voko dizainas',
                    'Socialinės žiniasklaidos šablonai',
                    'Prekės ženklo gairių dokumentas',
                    'Rinkodaros medžiagos'
                ],
            ],
            'social-media-campaign' => [
                'title_translations' => ['lt' => 'Socialinės žiniasklaidos kampanija'],
                'category_translations' => ['lt' => 'Skaitmeninis marketingas'],
                'description_translations' => ['lt' => 'Išsami socialinės žiniasklaidos strategija per Facebook, Instagram ir LinkedIn. Įsitraukimas padidėjo 300% ir sugeneruota 50% daugiau kvalifikuotų potencialių klientų per tikslinį turinį ir mokamas reklamos kampanijas.'],
                'challenge_translations' => ['lt' => 'Prekės ženklo žinomumo kūrimas ir potencialių klientų generavimas B2B technologijų sektoriuje su didele konkurencija ir sudėtingu pirkėjo kelionės procesu.'],
                'solution_translations' => ['lt' => 'Sukurta kelių platformų turinio strategija su tikslinėmis mokamomis kampanijomis, patraukliu organiniu turiniu ir duomenimis pagrįstu optimizavimu, siekiant pasiekti tinkamą auditoriją tinkamu metu.'],
                'technologies_translations' => ['Facebook Ads', 'Instagram Marketing', 'Google Analytics', 'Turinio strategija'],
                'results_translations' => [
                    '300% padidėjimas įsitraukime',
                    '50% daugiau kvalifikuotų potencialių klientų',
                    '200% sekėjų augimas',
                    '350% ROI nuo reklamos išlaidų'
                ],
                'features_translations' => [
                    'Kelių platformų turinio strategija',
                    'Tikslinė mokama reklama',
                    'Patrauklus vizualinis turinys',
                    'Vaizdo rinkodaros kampanijos',
                    'Įtakos turėtojų partnerystės',
                    'Bendruomenės valdymas',
                    'Veiklos analitika',
                    'Potencialių klientų generavimo kanalai'
                ],
            ],
            'blog-content-strategy' => [
                'title_translations' => ['lt' => 'Tinklaraščio turinio strategija'],
                'category_translations' => ['lt' => 'SEO ir turinio kūrimas'],
                'description_translations' => ['lt' => 'Sukurta išsami turinio strategija su 50+ SEO optimizuotų tinklaraščio įrašų. Pasiektas #1 reitingas 15 tiksliniams raktažodžiams ir padidintas organinis srautas 250% per 6 mėnesius.'],
                'challenge_translations' => ['lt' => 'Paieškos reitingų ir organinio srauto gerinimas labai konkurencinėje turinio rinkodaros erdvėje.'],
                'solution_translations' => ['lt' => 'Atlikta išsami raktažodžių tyrimas, sukurti aukštos kokybės turinio klasteriai ir įgyvendinti techniniai SEO patobulinimai, siekiant padidinti paieškos matomumą.'],
                'technologies_translations' => ['Raktažodžių tyrimas', 'Turinio kūrimas', 'On-Page SEO', 'Analitika'],
                'results_translations' => [
                    '250% padidėjimas organiniame sraute',
                    '#1 reitingas 15 raktažodžiams',
                    '50+ paskelbtų straipsnių',
                    'Vidutinis 5 minučių skaitymo laikas'
                ],
                'features_translations' => [
                    'Išsamus raktažodžių tyrimas',
                    'Turinio kalendoriaus planavimas',
                    'SEO optimizuoti straipsniai',
                    'Vidaus nuorodų strategija',
                    'Meta aprašymai ir antraštės',
                    'Vaizdų optimizavimas',
                    'Veiklos sekimas',
                    'Turinio atnaujinimai ir priežiūra'
                ],
            ],
            'fitness-tracking-app' => [
                'title_translations' => ['lt' => 'Fitness sekimo programa'],
                'category_translations' => ['lt' => 'Programų kūrimas'],
                'description_translations' => ['lt' => 'Kryžminės platformos mobilioji programa fitness sekimui su realaus laiko duomenų sinchronizacija, treniruočių planais ir socialinėmis funkcijomis. Sukurta su React Native ir Firebase backend, palaikanti tiek iOS, tiek Android platformas.'],
                'challenge_translations' => ['lt' => 'Sklandaus fitness sekimo patirties kūrimas, veikiantis nuosekliai iOS ir Android sistemose, integruojant įvairius sveikatos įrenginius.'],
                'solution_translations' => ['lt' => 'Sukurta React Native programa su Firebase backend realaus laiko duomenų sinchronizacijai, įgyvendinta HealthKit integracija iOS ir Google Fit Android sistemoms, ir sukurta intuityvi vartotojo sąsaja.'],
                'technologies_translations' => ['React Native', 'Firebase', 'Redux', 'HealthKit API'],
                'results_translations' => [
                    '50,000+ atsisiuntimų',
                    '4,8/5 programų parduotuvės įvertinimas',
                    '95% vartotojų išlaikymo rodiklis',
                    '1M+ treniruočių sekta'
                ],
                'features_translations' => [
                    'Kryžminės platformos suderinamumas',
                    'Realaus laiko duomenų sinchronizacija',
                    'Treniruočių plano pritaikymas',
                    'Socialinio dalijimosi funkcijos',
                    'Sveikatos įrenginių integracija',
                    'Pažangos sekimas ir analitika',
                    'Offline funkcionalumas',
                    'Push pranešimai'
                ],
            ],
            'banking-app-interface' => [
                'title_translations' => ['lt' => 'Banko programos sąsaja'],
                'category_translations' => ['lt' => 'UI/UX dizainas'],
                'description_translations' => ['lt' => 'Pilnas UI/UX perprojektavimas mobiliai banko programai. Pagerinta vartotojo patirtis su intuityvia navigacija, prieinamumo funkcijomis ir šiuolaikiniais dizaino principais. Vartotojų pasitenkinimas padidėjo 40%.'],
                'challenge_translations' => ['lt' => 'Sudėtingos banko programos perprojektavimas, kad būtų patogesnė vartotojams, išlaikant saugumą ir reguliavimo atitikties reikalavimus.'],
                'solution_translations' => ['lt' => 'Atlikta išsami vartotojų tyrimas, sukurti laikmenos ir prototipai, ir sukurta išsami dizaino sistema, kuri pirmiausia teikia naudojamumą ir prieinamumą.'],
                'technologies_translations' => ['Figma', 'Prototipavimas', 'Vartotojų tyrimas', 'Dizaino sistema'],
                'results_translations' => [
                    '40% padidėjimas vartotojų pasitenkinime',
                    '60% sumažėjimas palaikymo užklausų',
                    '25% greitesnis užduočių atlikimas',
                    'Apdovanojimas už geriausią banko UX'
                ],
                'features_translations' => [
                    'Intuityvi navigacijos dizainas',
                    'Prieinamumo atitiktis',
                    'Šiuolaikiškas vizualinis dizainas',
                    'Interaktyvūs prototipai',
                    'Dizaino sistemos dokumentacija',
                    'Vartotojų testavimas ir atsiliepimai',
                    'Reaguojantys maketai',
                    'Saugumui orientuoti UI modeliai'
                ],
            ],
        ];

        foreach ($portfolioData as $slug => $data) {
            $portfolioItem = [
                'slug' => $slug,
                'title' => $data['title'],
                'category' => $data['category'],
                'service_slug' => $data['service_slug'],
                'image' => $data['image'] ?? null,
                'description' => $data['description'] ?? null,
                'web_type' => $data['web_type'] ?? null,
                'use_cases' => $data['use_cases'] ?? null,
                'challenge' => $data['challenge'] ?? null,
                'solution' => $data['solution'] ?? null,
                'client' => $data['client'] ?? null,
                'duration' => $data['duration'] ?? null,
                'team_size' => $data['team_size'] ?? null,
                'technologies' => $data['technologies'] ?? [],
                'results' => $data['results'] ?? [],
                'features' => $data['features'] ?? [],
                'order' => $data['order'] ?? 0,
                'is_active' => true,
            ];

            // Add translations if available
            if (isset($portfolioTranslations[$slug])) {
                $trans = $portfolioTranslations[$slug];

                // Title translations
                if (isset($trans['title_translations'])) {
                    $portfolioItem['title_translations'] = [
                        'en' => $data['title'],
                        'lt' => $trans['title_translations']['lt']
                    ];
                }

                // Category translations
                if (isset($trans['category_translations'])) {
                    $portfolioItem['category_translations'] = [
                        'en' => $data['category'],
                        'lt' => $trans['category_translations']['lt']
                    ];
                }

                // Description translations
                if (isset($trans['description_translations'])) {
                    $portfolioItem['description_translations'] = [
                        'en' => $data['description'] ?? '',
                        'lt' => $trans['description_translations']['lt']
                    ];
                }

                // Web type translations
                if (isset($trans['web_type_translations'])) {
                    $portfolioItem['web_type_translations'] = [
                        'en' => $data['web_type'] ?? '',
                        'lt' => $trans['web_type_translations']['lt']
                    ];
                }

                // Use cases translations
                if (isset($trans['use_cases_translations'])) {
                    $portfolioItem['use_cases_translations'] = [
                        'en' => $data['use_cases'] ?? '',
                        'lt' => $trans['use_cases_translations']['lt']
                    ];
                }

                // Challenge translations
                if (isset($trans['challenge_translations'])) {
                    $portfolioItem['challenge_translations'] = [
                        'en' => $data['challenge'] ?? '',
                        'lt' => $trans['challenge_translations']['lt']
                    ];
                }

                // Solution translations
                if (isset($trans['solution_translations'])) {
                    $portfolioItem['solution_translations'] = [
                        'en' => $data['solution'] ?? '',
                        'lt' => $trans['solution_translations']['lt']
                    ];
                }

                // Technologies translations (JSON array)
                if (isset($data['technologies']) && isset($trans['technologies_translations'])) {
                    $portfolioItem['technologies_translations'] = [
                        'en' => $data['technologies'],
                        'lt' => $trans['technologies_translations']
                    ];
                }

                // Results translations (JSON array)
                if (isset($data['results']) && isset($trans['results_translations'])) {
                    $portfolioItem['results_translations'] = [
                        'en' => $data['results'],
                        'lt' => $trans['results_translations']
                    ];
                }

                // Features translations (JSON array)
                if (isset($data['features']) && isset($trans['features_translations'])) {
                    $portfolioItem['features_translations'] = [
                        'en' => $data['features'],
                        'lt' => $trans['features_translations']
                    ];
                }
            } else {
                // If no translations available, set English as default
                $portfolioItem['title_translations'] = ['en' => $data['title']];
                $portfolioItem['category_translations'] = ['en' => $data['category']];
                if (isset($data['description'])) {
                    $portfolioItem['description_translations'] = ['en' => $data['description']];
                }
            }

            Portfolio::updateOrCreate(
                ['slug' => $slug],
                $portfolioItem
            );
        }
    }
}
