{{-- Layout is owned by the parent (.cnt-form on the contact page); this root
     stays a plain block so it does not nest a second Bootstrap column. --}}
<div class="w-100">
    <form class="sr-tata-form js-manual-form" wire:submit.prevent="save" id="myForm">

        <div class="row sr-neumorph-card">

            <div class="col-md-12 mb-4">
                <label class="sr-label" for="cnt-name">Full Name</label>
                <div class="sr-input-wrap">
                    <i class="bi bi-person sr-input-icon" aria-hidden="true"></i>
                    <input wire:model="name" id="cnt-name" type="text" autocomplete="name"
                        placeholder="Enter your name" class="sr-input" />
                </div>
                @error('name')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12 mb-4">
                <label class="sr-label" for="cnt-email">Email Address</label>
                <div class="sr-input-wrap">
                    <i class="bi bi-envelope sr-input-icon" aria-hidden="true"></i>
                    <input wire:model="email" id="cnt-email" type="email" autocomplete="email"
                        placeholder="Enter your email" class="sr-input" />
                </div>
                @error('email')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <label class="sr-label" for="cnt-phone">Phone No</label>
                <div class="sr-input-wrap sr-textarea-wrap">
                    <i class="bi bi-phone sr-input-icon" aria-hidden="true"></i>
                     <input wire:model="phone" id="cnt-phone" type="tel" inputmode="tel" autocomplete="tel"
                        placeholder="Enter your Phone No" class="sr-input" />
                    {{-- <textarea wire:model="message" rows="4" placeholder="Write your message" class="sr-input sr-textarea"></textarea> --}}
                </div>
                {{-- Was @error('message') — a leftover from when this field was the
                     message textarea, so the required-phone error never rendered. --}}
                @error('phone')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>
            <!-- ========== Lines of Business (Multi Select Chips) ========== -->
            <div class="col-12 mb-4">
                <label class="sr-label mb-2">Lines of business (select one or more)</label>

                {{-- These were clickable <div>s, which the tab order skipped entirely.
                     Real <button type="button"> elements keep the same wire:click but
                     are reachable by keyboard, and aria-pressed announces the state. --}}
                <div class="sr-chip-container">
                    @foreach (['Motor', 'Travel', 'Health', 'Commercial'] as $lob)
                        @php $lobSelected = in_array($lob, $selectedLOB ?? []); @endphp
                        <button type="button" wire:click="toggleLOB('{{ $lob }}')"
                            aria-pressed="{{ $lobSelected ? 'true' : 'false' }}"
                            class="sr-chip {{ $lobSelected ? 'sr-chip-selected' : '' }}">
                            @if ($lobSelected)
                                <i class="bi bi-check-circle-fill sr-chip-check" aria-hidden="true"></i>
                            @endif
                            {{ $lob }}
                        </button>
                    @endforeach
                </div>

                @error('selectedLOB')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-12 mb-3">
                <p class="sr-small-text">We are committed to protecting your privacy...</p>
            </div>

            <div class="col-md-12 mb-3">
                <div class="sr-consent-wrap">
                    <input wire:model="consent" type="checkbox" id="consent" class="sr-consent-check" />
                    <label for="consent" class="sr-consent-label">
                        I hereby authorize to send notifications on SMS/ RCS Messages/ Promotional/ Informational messages.
                    </label>
                </div>
                @error('consent')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12 text-center text-md-center">
                <button type="submit" class="sr-submit-btn">
                    Send Message
                </button>
            </div>

            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        </div>
    </form>
</div>
