<div class="p-5 relative" x-data="{ isOpen: @entangle('isOpen') }">

    <div class="w-1/2 m-auto shadow shadow-black p-2">
        @if(session()->has('success'))
        <div class="bg-green-300 rounded-lg text-center p-2" x-show='isVisible' x-data='{ isVisible: true}'
            x-init="setTimeout(()=> { isVisible = false}, 2000)">{{
            session('success') }}</div>
        @endif
        <div class="flex flex-col mb-5">
            <label for="name" class="opacity-70 p-1 text-sm">Name</label>
            <input type="text" id="name" name="name" class="p-2 border-2 border-black/30 rounded-lg bg-white/20"
                wire:model='name' readonly>
        </div>
        <div class="flex flex-col mb-5">
            <label for="email" class="opacity-70 p-1 text-sm">Email</label>
            <input type="email" id="email" class="p-2 border-2 border-black/30 rounded-lg  bg-white/20"
                wire:model='email' readonly>
        </div>
        <div class="flex flex-col mb-5">
            <label for="contact_number" class="opacity-70 p-1 text-sm">Contact Number</label>
            <input type="text" id="contact_number" class="p-2 border-2 border-black/30 rounded-lg  bg-white/20"
                wire:model='contact_number' readonly>
        </div>
        <div class="flex flex-col mb-5">
            <label for="address" class="opacity-70 p-1 text-sm">Address</label>
            <input type="text" id="address" class="p-2 border-2 border-black/30 rounded-lg  bg-white/20"
                wire:model='address' readonly>
        </div>
        <div class="flex justify-evenly mb-5">
            {{-- <button type="submit">Update</button> --}}
        </div>
        <div class="flex justify-evenly mb-5">
            <button class="w-1/4 bg-blue-500 rounded p-2 text-center" @click="isOpen = true">Edit</button>
            <form wire:submit='deleteUser' class="w-1/4 bg-red-500 rounded p-2 text-center">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
    <div>
        <div x-show="isOpen" @click.away="isOpen = false"
            class="absolute top-0 left-0 w-full inset-0 flex items-center justify-center z-50 w-full bg-gray-500/50 backdrop-blur-md rounded-lg shadow-md shadow-black">
            <form class="modal" wire:submit='update'>
                @csrf
                <div class="flex flex-col mb-5">
                    <label for="name" class="opacity-70 p-1 text-sm">Name</label>
                    <input type="text" id="name" class="p-2 border-2 border-black/30 rounded-lg" wire:model='name'>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="email" class="opacity-70 p-1 text-sm">Email</label>
                    <input type="email" id="email" class="p-2 border-2 border-black/30 rounded-lg" wire:model='email'>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="contact_number" class="opacity-70 p-1 text-sm">Contact Number</label>
                    <input type="text" id="contact_number" class="p-2 border-2 border-black/30 rounded-lg"
                        wire:model='contact_number'>

                </div>
                <div class="flex flex-col mb-5">
                    <label for="address" class="opacity-70 p-1 text-sm">Address</label>
                    <input type="text" id="address" class="p-2 border-2 border-black/30 rounded-lg"
                        wire:model='address'>
                </div>
                <div class="flex justify-evenly w-full mb-5">
                    <button type="submit" class="bg-blue-500 rounded p-2 text-center"
                        @click="isOpen = true">Update</button>
                    <button @click="isOpen = false" class="bg-red-300 rounded p-2 text-center"
                        wire:click.prevent='resetForm'>Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>