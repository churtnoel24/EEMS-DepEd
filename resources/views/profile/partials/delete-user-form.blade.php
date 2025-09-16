<section class="mb-4">
    <header class="mb-3">
        <h2 class="h5 mb-1">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-muted small mb-0">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="btn btn-danger"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h2 class="h5 mb-2">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-muted small mb-3">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-3">
                <x-input-label for="password" value="{{ __('Password') }}" class="form-label visually-hidden" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control w-75"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger small mt-1" />
            </div>

            <div class="d-flex justify-content-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="btn btn-secondary">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="btn btn-danger ms-2">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
