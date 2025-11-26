<div class="col-xxl-6 col-lg-7 offset-xxl-1">
    <form class="sr-tata-form js-manual-form" wire:submit.prevent="save" id="myForm">

        <div class="row sr-neumorph-card">

            <div class="col-md-6 mb-4">
                <label class="sr-label">Full Name</label>
                <div class="sr-input-wrap">
                    <i class="bi bi-person sr-input-icon"></i>
                    <input wire:model="name" type="text" placeholder="Enter your name" class="sr-input" />
                </div>
                @error('name')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-4">
                <label class="sr-label">Email Address</label>
                <div class="sr-input-wrap">
                    <i class="bi bi-envelope sr-input-icon"></i>
                    <input wire:model="email" type="email" placeholder="Enter your email" class="sr-input" />
                </div>
                @error('email')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <label class="sr-label">Phone No</label>
                <div class="sr-input-wrap sr-textarea-wrap">
                    <i class="bi bi-phone sr-input-icon"></i>
                     <input wire:model="phone" type="text" placeholder="Enter your Phone No" class="sr-input" />
                    {{-- <textarea wire:model="message" rows="4" placeholder="Write your message" class="sr-input sr-textarea"></textarea> --}}
                </div>
                @error('message')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>
            <!-- ========== Lines of Business (Multi Select Chips) ========== -->
            <div class="col-12 mb-4">
                <label class="sr-label mb-2">Lines of business (select one or more)</label>

                <div class="sr-chip-container">

                    <!-- Motor -->
                    <div wire:click="toggleLOB('Motor')"
                        class="sr-chip {{ in_array('Motor', $selectedLOB ?? []) ? 'sr-chip-selected' : '' }}">
                        @if (in_array('Motor', $selectedLOB ?? []))
                            <i class="bi bi-check-circle-fill sr-chip-check"></i>
                        @endif
                        Motor
                    </div>

                    <!-- Travel -->
                    <div wire:click="toggleLOB('Travel')"
                        class="sr-chip {{ in_array('Travel', $selectedLOB ?? []) ? 'sr-chip-selected' : '' }}">
                        @if (in_array('Travel', $selectedLOB ?? []))
                            <i class="bi bi-check-circle-fill sr-chip-check"></i>
                        @endif
                        Travel
                    </div>

                    <!-- Health -->
                    <div wire:click="toggleLOB('Health')"
                        class="sr-chip {{ in_array('Health', $selectedLOB ?? []) ? 'sr-chip-selected' : '' }}">
                        @if (in_array('Health', $selectedLOB ?? []))
                            <i class="bi bi-check-circle-fill sr-chip-check"></i>
                        @endif
                        Health
                    </div>

                    <!-- Commercial -->
                    <div wire:click="toggleLOB('Commercial')"
                        class="sr-chip {{ in_array('Commercial', $selectedLOB ?? []) ? 'sr-chip-selected' : '' }}">
                        @if (in_array('Commercial', $selectedLOB ?? []))
                            <i class="bi bi-check-circle-fill sr-chip-check"></i>
                        @endif
                        Commercial
                    </div>

                </div>

                @error('selectedLOB')
                    <span class="sr-error">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-7 mb-3">
                <p class="sr-small-text">We are committed to protecting your privacy...</p>
            </div>

            <div class="col-md-5 text-start text-md-end">
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
