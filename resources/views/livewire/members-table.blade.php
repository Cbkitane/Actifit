<div>
    <div class="flex flex-col">
        <div class="flex justify-between">
            <div class="bg-blue-200 rounded-sm flex items-center p-2"><a href="">Add New User</a></div>
            <input type="text" placeholder="Search here..." class="border-2 border-black w-1/2 mx-auto p-2 rounded-lg"
                wire:model='search' wire:keydown='findUser'>
            {{-- <div></div> --}}
        </div>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 cursor-pointer" wire:click="sortBy('name')">Name</th>
                                <th scope=" col" class="px-6 py-4 cursor-pointer" wire:click="sortBy('address')">
                                    Membership Type
                                </th>
                                <th scope=" col" class="px-6 py-4 cursor-pointer" wire:click="sortBy('address')">
                                    Membership Status
                                </th>

                                </th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b dark:border-neutral-500">
                                {{-- <td class="whitespace-nowrap px-6 py-4 font-medium">1</td> --}}
                                <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">Monthly</td>
                                <td class="whitespace-nowrap px-6 py-4"><span
                                        class="bg-green-500 p-2 rounded">Active</span></td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <a href={{ route('admin.view.user', ['id'=> $user->id]) }}>View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end my-5 mx-10">
                        {{-- {{ $users->links() }} --}}
                        {{ $users->links('custom-pagination') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>