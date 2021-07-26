<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple to-purple-lighter border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-80 active:opoacity-80 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
