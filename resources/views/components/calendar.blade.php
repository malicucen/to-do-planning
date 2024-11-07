<div class="lg:flex lg:h-full lg:flex-col">
    <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
        <h1 class="text-base font-semibold text-gray-900">
            <span>Week count: {{ $weekCount }}</span>
        </h1>
    </header>
    <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
        <div
            class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs/6 font-semibold text-gray-700 lg:flex-none">
            <div class="flex justify-center bg-white py-2">
                <span>M</span>
                <span class="sr-only sm:not-sr-only">on</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>T</span>
                <span class="sr-only sm:not-sr-only">ue</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>W</span>
                <span class="sr-only sm:not-sr-only">ed</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>T</span>
                <span class="sr-only sm:not-sr-only">hu</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>F</span>
                <span class="sr-only sm:not-sr-only">ri</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>S</span>
                <span class="sr-only sm:not-sr-only">at</span>
            </div>
            <div class="flex justify-center bg-white py-2">
                <span>S</span>
                <span class="sr-only sm:not-sr-only">un</span>
            </div>
        </div>
        <div class="flex bg-gray-200 text-xs/6 text-gray-700 lg:flex-auto">
            <div class="hidden w-full lg:grid lg:grid-cols-7 lg:gap-px">
                @foreach($period as $date)
                    <div
                        class="{{ $date->isCurrentMonth() ? 'relative bg-white px-3 py-2' : 'relative bg-gray-50 px-3 py-2 text-gray-500' }}">
                        <time datetime="{{ $date->format('Y-m-d') }}">{{ $date->format('d') }}</time>
                        <ol class="mt-2">
                            @foreach($tasks as $task)
                                @if($date->gte($task->start_date) && $date->lte($task->end_date) && !$date->isWeekend())
                                    <li>
                                        <a href="#" class="group flex">
                                            <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                                {{ $task->name }}</p>
                                            <time datetime="2022-01-03T10:00"
                                                  class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">
                                                {{ $task->developer->name }}
                                            </time>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
