<div class="grid justify-items-stretch m-1">
    <div  {{ $attributes->merge([ 'class' => "border rounded-md shadow-sm border-gray-300 p-3"]) }}>
        {{ $slot }}
    </div>
</div>
