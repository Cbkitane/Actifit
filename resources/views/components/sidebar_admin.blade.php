<div class="flex flex-col justify-around fixed md:w-1/5 h-screen border-2 border-black p-3 overflow-x-hidden"
        style="background-color: var(--color-2); color: var(--color-1)">
        <div class="text-center p-2 flex justify-center items-center">
                <img src="https://imgs.search.brave.com/9uYjfjUbHo1eJbiWdA-nTrk3ctkQTdCXoB7mlZsesug/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9zZWVr/bG9nby5jb20vaW1h/Z2VzL0YvZml0bmVz/cy1neW0tbG9nby05/MTkxQ0Q0Q0YyLXNl/ZWtsb2dvLmNvbS5w/bmc"
                        alt="Gym Logo" class="w-40 h-40">
        </div>
        <ul class="flex flex-col leading-10 px-1 text-xl">
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href={{ route('admin.index')
                                }}>Home</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block"
                                href="{{ route('admin.members') }}">Members</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href="">Equipment</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href="">Packages</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href="">Schedules</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href="">Payments</a></li>
                <li class="my-1 w-full rounded-md" style=""><a class="p-2 block" href={{ route('admin.users')
                                }}>Users</a></li>
        </ul>
        <div class="flex justify-evenly">
                <a href="">Account Settings</a>
                <div>|</div>
                <form method="POST" action="{{ route('logout') }}"
                        onsubmit="return confirm('Are you sure you want to logout?')">
                        @csrf
                        <button type="submit">Logout</button>
                </form>
        </div>
</div>

<style>
        ul li a:active {
                background: var(--color-6);
        }
</style>