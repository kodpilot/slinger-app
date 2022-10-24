
	
	
	@if ($paginator->hasPages())
	<ul style="list-style-type: none;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;" class="pagination">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
		<li class="disabled"><i class="w-icon-long-arrow-left"></i></li>
		@else
		<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="w-icon-long-arrow-left"></i></a></li>
		@endif

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
		{{-- "Three Dots" Separator --}}
		@if (is_string($element))
		<li style="margin-left: 10px" class="page-item">{{ $element }}</li>
		@endif

		{{-- Array Of Links --}}
		@if (is_array($element))
		@foreach ($element as $page => $url)
		@if ($page == $paginator->currentPage())
		<li class="page-item active" style="margin-left: 10px"><a style="font-weight: 900; color: #f79321;" class="current-page">{{ $page }}</a></li>
		@else
		<li style="margin-left: 10px" class="page-item"><a  href="{{ $url }}">{{ $page }}</a></li>
		@endif
		@endforeach
		@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
		<li style="margin-left: 10px">
			<a href="{{ $paginator->nextPageUrl() }}" rel="next">
				<i class="w-icon-long-arrow-right"></i>
			</a>
		</li>
		@else
		<li style="margin-left: 10px">
			<i class="w-icon-long-arrow-right"></i>
		</li>
		@endif
	</ul>
	@endif

<!-- Pagination / End -->