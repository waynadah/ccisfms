<div class="bg-gray-50 p-3 rounded-xl shadow-xl text-center">
    <h5 class="text-lg font-medium text-gray-700">
        {{ $title }}
        <span 
            title="{{ $tooltip }}"
            class="border border-gray-400 px-[5px] rounded-full text-xs text-gray-400 dark:text-white dark:bg-gray-400 cursor-pointer hover:bg-gray-400 hover:text-white"
        >
            &quest;
        </span>
    </h5>
    <p class="text-3xl font-semibold {{ $color }}">{{ $amount }}</p>
    <span class="text-xs">{{ $label }}</span>
</div>
