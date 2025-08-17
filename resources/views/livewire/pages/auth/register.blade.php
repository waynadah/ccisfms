<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $date_of_birth = '';
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@southernchristiancollege\.edu\.ph$/', 
                'unique:' . User::class,
            ],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'date', 'before:today'], 
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <p class="hidden md:block text-4xl text-center text-gray-400 dark:text-gray-200 m-0 font-bold font-serif">CCIS FMS</p>
    <p class="hidden md:block  text-center text-gray-400 dark:text-gray-200 m-0 font-bold mb-5 font-serif">LOGIN PAGE</p>
    <div class="flex justify-between w-full my-2 ">
        <p class="text-gray-400 dark:text-gray-200">Welcome to Website</p>
        <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 underline">Login</a>
    </div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block p-2 border mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('InstitutionalEmail')" />
            <x-text-input
                wire:model="email"
                id="email"
                class="block p-2 border mt-1 w-full"
                type="email"
                name="email"
                required
                autocomplete="username"
                pattern="^[a-zA-Z0-9._%+-]+@southernchristiancollege\.edu\.ph$"
                title="Email must be a southernchristiancollege.edu.ph address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block p-2 border mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block p-2 border mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input wire:model="date_of_birth" id="date_of_birth" class="block p-2 border mt-1 w-full" type="date" name="date_of_birth" required />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>