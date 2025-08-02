<div class="col-xxl-6 col-lg-7 offset-xxl-1">
    <form class="contact-form-style-03 js-manual-form" wire:submit.prevent="save" {{-- ✅ Use Livewire's submit --}} id="myForm">

        <div class="row fade-once">

            {{-- ✅ DO NOT use wire:ignore here --}}

            <div class="col-md-6 mb-35px sm-mb-20px">
                <div class="position-relative form-group">
                    <span class="form-icon"><i class="bi bi-person icon-extra-medium text-dark-gray"></i></span>
                    <input wire:model="name"
                        class="fw-500 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control required"
                        type="text" name="name" placeholder="What's your good name?*" />
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-35px sm-mb-20px">
                <div class="position-relative form-group">
                    <span class="form-icon"><i class="bi bi-envelope icon-extra-medium text-dark-gray"></i></span>
                    <input wire:model="email"
                        class="fw-500 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control required"
                        type="email" name="email" placeholder="Enter your email address*" />
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-50px">
                <div class="position-relative form-group form-textarea mb-0">
                    <span class="form-icon"><i
                            class="bi bi-chat-square-dots icon-extra-medium text-dark-gray"></i></span>
                    <textarea wire:model="message" class="fw-500 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                        name="comment" placeholder="Enter your message" rows="4"></textarea>
                    @error('message')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-7 sm-mb-20px">
                <p class="fs-14 lh-24 mb-0">We are committed to protecting your privacy...</p>
            </div>

            <div class="col-md-5 text-start text-md-end">
                <button type="submit" wire:click="save"
                    class="btn btn-large btn-expand-ltr text-black text-black-hover btn-rounded submit">
                    <span class="bg-base-color"></span>Send message
                </button>
            </div>

            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-12 text-center">
                <div class="form-results mt-20px d-none"></div>
            </div>
        </div>
    </form>
</div>
