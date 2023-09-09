<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form method="POST" wire:submit.prevent='store'>
                @csrf

                <div>
                    <label for="profile_picture">Upload Profile Picture</label>
                    <input type="file" id="profile_picture"
                        class="block border border-grey-light w-full p-3 rounded mb-4" wire:model="photo"
                        accept="image/*" />
                    @if ($photo)
                    <span>Image Preview</span>
                    <img src="{{ $photo->temporaryUrl() }}" alt="Profile Picture Preview" class="max-h-40 mx-auto mb-4">
                    @endif
                    @error('photo') <span class="text-red/80">{{ $message }}</span> @enderror
                </div>


                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" wire:model="fullname"
                    placeholder="Full Name" />
                @error('fullname') <span class="text-red/80">{{ $message }}</span> @enderror

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" wire:model="email"
                    placeholder="Email" />
                @error('email') <span class="text-red/80">{{ $message }}</span> @enderror

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                    wire:model="contact_number" placeholder="Contact Number" />
                @error('contact_number') <span class="text-red/80">{{ $message }}</span> @enderror

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" wire:model="address"
                    placeholder="Address" />
                @error('address') <span class="text-red/80">{{ $message }}</span> @enderror

                <div class="block border border-grey-light w-full p-3 rounded mb-4">
                    <label for="role">Select role:</label>
                    <select wire:model="role" id="role" class="block border border-grey-light w-full p-3 rounded mb-4">
                        <option value="" selected disabled>--- Select Role ---</option>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">trainer</option>
                        <option value="4">Member</option>
                    </select>
                    @error('role') <span class="text-red/80">{{ $message }}</span> @enderror
                </div>


                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4"
                    wire:model="password" placeholder="Password" />
                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4"
                    wire:model="password_confirmation" placeholder="Confirm Password" />
                @error('password') <span class="text-red/80">{{ $message }}</span> @enderror

                <button type="submit"
                    class="w-full text-center py-3 rounded hover:bg-blue-500 focus:outline-none my-1 text-black bg-blue-300">Create
                    Account</button>
            </form>
        </div>
    </div>
</div>