<th {{ $attributes->merge(['class' => 'resizable px-4 py-2 text-left text-sm font-medium text-gray-600 w-32']) }}>
	{{ $slot }}
	<div class="resizer"></div>
</th>