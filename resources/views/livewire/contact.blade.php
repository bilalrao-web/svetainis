<div>
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">Contact Us</h1>
            <p class="breadcrumb animate-fade-in-up">HOME > <span>CONTACT</span></p>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container animate-fade-in-up">
            <!-- Contact Info Side -->
            <div class="contact-info-side">
                <h2>Get In Touch</h2>
                <p>We are here for you! How can we help? Fill out the form, and we'll get back to you as soon as possible. We're ready to bring your ideas to life with our professional web design and development services.</p>
            </div>

            <!-- Contact Form Side -->
            <div class="contact-form-side">
                {{-- The form calls the 'submitForm' method on submission --}}
                <form wire:submit.prevent="submitForm" class="contact-form">
                    
                    {{-- Success Message --}}
                    @if ($successMessage)
                        <div style="background-color: #2a9d8f; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                            {{ $successMessage }}
                        </div>
                    @endif

                    <div class="form-group">
                        {{-- wire:model links this input to the $name property in the component --}}
                        <input type="text" wire:model.lazy="name" placeholder="Your Name">
                        @error('name') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        {{-- wire:model links this input to the $email property --}}
                        <input type="email" wire:model.lazy="email" placeholder="Your Email">
                        @error('email') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        {{-- wire:model links this textarea to the $message property --}}
                        <textarea wire:model.lazy="message" placeholder="Your Message"></textarea>
                        @error('message') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>

                    {{-- Loading state for the button --}}
                    <button type="submit">
                        <span wire:loading.remove>Send Message</span>
                        <span wire:loading>Sending...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

