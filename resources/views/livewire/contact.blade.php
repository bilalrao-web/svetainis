<div class="themain">
    <!-- Page Hero Section -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h1 class="animate-fade-in-down">{{ __('messages.contact_page') }}</h1>
            <p class="breadcrumb animate-fade-in-up">{{ __('messages.home_breadcrumb') }} > <span>{{ strtoupper(__('messages.contact_us')) }}</span></p>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container animate-fade-in-up">
            <!-- Contact Info Side -->
            <div class="contact-info-side">
                <h2>{{ __('messages.get_in_touch') }}</h2>
                <p>{{ __('messages.contact_description') }}</p>
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
                        <input type="text" wire:model.lazy="name" placeholder="{{ __('messages.your_name') }}">
                        @error('name') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        {{-- wire:model links this input to the $email property --}}
                        <input type="email" wire:model.lazy="email" placeholder="{{ __('messages.your_email') }}">
                        @error('email') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        {{-- wire:model links this textarea to the $message property --}}
                        <textarea wire:model.lazy="message" placeholder="{{ __('messages.your_message') }}"></textarea>
                        @error('message') <span style="color: #e63946; font-size: 0.9rem;">{{ $message }}</span> @enderror
                    </div>

                    {{-- Loading state for the button --}}
                    <button type="submit">
                        <span wire:loading.remove>{{ __('messages.send_message') }}</span>
                        <span wire:loading>{{ __('messages.sending') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

