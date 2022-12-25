<x-guest-layout>
    <div class="bg-gray mt-1 py-6">
        <div class="container px-4">
            <h2 class="font-bold text-2xl text-center mb-6">{{$title}}</h2>
            <div class="flex justify-center">
                <div class="max-w-7xl w-full inline-flex single-feature gap-10 flex-wrap mx-auto">
                    @foreach($courses as $course)
                        @include('components/course-box', $course)
                    @endforeach
                </div>
            </div>
            <div class="mt-5">
                {{$courses->links()}}
            </div>
        </div>
    </div>
</x-guest-layout>
