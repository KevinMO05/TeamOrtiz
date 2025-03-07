@props(['size' => 'w-full'])

<div {{$attributes->merge(['class' => 'flex flex-col mt-4 ' . $size ])}}>
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200  md:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>