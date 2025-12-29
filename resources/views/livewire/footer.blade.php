<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Navigation Column -->
            <div class="footer-column">
                <h3 class="footer-heading">{{ __('messages.navigation') }}</h3>
                <ul class="footer-links">
                    @forelse($menuItems as $item)
                        <li>
                            @php
                                $href = '#';
                                if ($item->route) {
                                    try {
                                        $href = route($item->route);
                                    } catch (\Exception $e) {
                                        $href = $item->url ?: '#';
                                    }
                                } else {
                                    $href = $item->url ?: '#';
                                }
                            @endphp
                            <a href="{{ $href }}" wire:navigate>{{ $item->translated_label }}</a>
                        </li>
                    @empty
                        <li><a href="{{ route('landing') }}" wire:navigate>{{ __('messages.home') }}</a></li>
                        <li><a href="{{ route('services') }}" wire:navigate>{{ __('messages.services') }}</a></li>
                        <li><a href="{{ route('portfolio') }}" wire:navigate>{{ __('messages.portfolio') }}</a></li>
                        <li><a href="{{ route('contact') }}" wire:navigate>{{ __('messages.contact_us') }}</a></li>
                    @endforelse
                </ul>
            </div>

            <!-- Contact Us Column -->
            <div class="footer-column">
                <h3 class="footer-heading">{{ __('messages.contact_us') }}</h3>
                <div class="footer-contact">
                    @if($address)
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $address }}</span>
                        </div>
                    @endif
                    @if($phone)
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:{{ $phone }}">{{ $phone }}</a>
                        </div>
                    @endif
                    @if($email)
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $email }}">{{ __('messages.send_email') }}</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Social Media Column -->
            <div class="footer-column">
                <h3 class="footer-heading">{{ __('messages.social_media') }}</h3>
                <ul class="footer-social">
                    <li>
                        <a href="{{ $instagram ?: 'https://instagram.com/uplance' }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                            <span>{{ __('messages.instagram') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $tiktok ?: 'https://tiktok.com/@uplance' }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-tiktok"></i>
                            <span>{{ __('messages.tiktok') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $linkedin ?: 'https://linkedin.com/company/uplance' }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin"></i>
                            <span>{{ __('messages.linkedin') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- About Column -->
            <div class="footer-column">
                <h3 class="footer-heading">{{ __('messages.about') }}</h3>
                @if($aboutText)
                    <p class="footer-about-text">{{ $aboutText }}</p>
                @else
                    <p class="footer-about-text">{{ __('messages.about_text_default') }}</p>
                @endif
                <div class="footer-logo">
                    @if(str_starts_with($logo, 'storage/'))
                        <img src="{{ asset($logo) }}" alt="{{ $siteName }} Logo" class="footer-logo-image">
                    @else
                        <img src="{{ asset($logo) }}" alt="{{ $siteName }} Logo" class="footer-logo-image">
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
