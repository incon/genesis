@props([
    'type' => 'primary', 
    'size' => 'md', 
    'tag' => 'button',
    'href' => '/',
    'submit' => false,
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'px-2.5 py-1.5 text-xs font-medium rounded-md',
        'md' => 'px-4 py-2 text-sm font-medium rounded-md',
        'lg' => 'px-5 py-3  text-sm font-medium rounded-md',
        'xl' => 'px-6 py-3.5 text-base font-medium rounded-md',
        '2xl' => 'px-7 py-4 text-base font-medium rounded-md'
    };
@endphp

@php
    $typeClasses = match ($type) {
        'primary' => 'bg-gray-900 text-white hover:bg-gray-800 focus:ring-2 focus:ring-gray-900 focus:ring-offset-2',
        'secondary' => 'bg-white rounded-md border text-gray-500 hover:text-gray-700 border-gray-200/70 hover:bg-gray-50 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200/60 focus:shadow-outline',
        'success' => 'bg-green-600 text-white hover:bg-green-600/90 focus:ring-2 focus:ring-offset-2 focus:bg-green-700/90 focus:ring-green-700',
        'info' => 'bg-blue-600 text-white hover:bg-blue-600/90 focus:ring-2 focus:ring-offset-2 focus:bg-blue-700/90 focus:ring-blue-700',
        'warning' => 'bg-amber-500 text-white hover:bg-amber-500/90 focus:ring-2 focus:ring-offset-2 focus:bg-amber-600/90 focus:ring-amber-600',
        'danger' => 'bg-red-600 text-white hover:bg-red-600/90 focus:ring-2 focus:ring-offset-2 focus:bg-red-700/90 focus:ring-red-700',
    };
@endphp

@php
switch ($tag ?? 'button') {
    case 'button':
        $tagAttr = ($submit) ? 'button type="submit"' : 'button type="button"';
        $tagClose = 'button';
        break;
    case 'a':
        $link = $href ?? '';
        $tagAttr = 'a  href="' . $link . '"';
        $tagClose = 'a';
        break;
    default:
        $tagAttr = 'button type="button"';
        $tagClose = 'button';
        break;
}
@endphp

<{!! $tagAttr !!} {!! $attributes->except(['class']) !!} class="{{ $sizeClasses }} {{ $typeClasses }} cursor-pointer inline-flex items-center w-full justify-center items-center font-medium focus:outline-none">
    {{ $slot }}
</{{ $tagClose }}>