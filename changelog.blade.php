@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-12">

    <div class="mb-12">
        <h1 class="text-4xl font-bold">
            Changelog
        </h1>

        <p class="mt-2 text-gray-600">
            What's new, improved, and fixed.
        </p>
    </div>

    @foreach ($releases as $release)

        <article class="mb-16">

            <div class="flex items-center gap-4 mb-4">

                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                    v{{ $release->version }}
                </span>

                <time class="text-gray-500">
                    {{ $release->released_at?->format('F d, Y') }}
                </time>

            </div>

            @if ($release->title)
                <h2 class="text-2xl font-semibold">
                    {{ $release->title }}
                </h2>
            @endif

            @if ($release->description)
                <p class="mt-2 text-gray-600">
                    {{ $release->description }}
                </p>
            @endif

            <div class="mt-6 space-y-6">

                @foreach ($release->entries->groupBy('type') as $type => $entries)

                    <section>

                        <h3 class="font-semibold capitalize">
                            {{ $type }}
                        </h3>

                        <ul class="mt-2 space-y-3">

                            @foreach ($entries as $entry)

                                <li class="border-l-2 border-gray-200 pl-4">

                                    <div class="font-medium">
                                        {{ $entry->title }}
                                    </div>

                                    @if ($entry->description)
                                        <div class="text-gray-600 text-sm mt-1">
                                            {{ $entry->description }}
                                        </div>
                                    @endif

                                </li>

                            @endforeach

                        </ul>

                    </section>

                @endforeach

            </div>

        </article>

    @endforeach

    {{ $releases->links() }}

</div>

@endsection
