<th {{ $attributes->merge(['class' => 'resizable py-2 text-left text-sm font-bold text-gray-600 border-b border-gray-200']) }}>
	{{ $slot }}
	<div class="resizer"></div>
</th>