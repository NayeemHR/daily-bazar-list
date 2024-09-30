<button {{ $attributes->merge(['type' => 'submit', 'class' => 'z-flex rounded-md bg-[#7aa12a] px-3.5 py-2.5  text-sm font-semibold text-white shadow-sm hover:bg-[#88b42f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-[#7aa12a] mt-4 mb-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
