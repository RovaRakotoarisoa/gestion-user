<th {{ $attributes->merge(['class' => 'resizable py-2 text-white text-left text-sm font-bold text-gray-600']) }}>
	{{ $slot }}
	<div class="resizer"></div>
</th>