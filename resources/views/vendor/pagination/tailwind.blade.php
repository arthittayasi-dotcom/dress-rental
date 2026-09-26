@if ($paginator->hasPages())

<nav role="navigation"
aria-label="{{ __('Pagination Navigation') }}">


<div class="flex items-center justify-center gap-3">



{{-- Previous Button --}}

@if ($paginator->onFirstPage())


<span
class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
bg-white
border border-[#EEE8F6]
text-[#CFC5E5]
cursor-not-allowed">


<svg class="w-5 h-5"
fill="currentColor"
viewBox="0 0 20 20">


<path fill-rule="evenodd"
d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
clip-rule="evenodd" />


</svg>


</span>



@else



<a href="{{ $paginator->previousPageUrl() }}"

class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
bg-white
border border-[#EEE8F6]
text-[#9B8AC9]
hover:bg-[#FFF1F7]
transition">


<svg class="w-5 h-5"
fill="currentColor"
viewBox="0 0 20 20">


<path fill-rule="evenodd"
d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
clip-rule="evenodd" />


</svg>


</a>



@endif





{{-- Pagination Number --}}


@foreach ($elements as $element)


@if (is_string($element))


<span
class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
bg-white
border border-[#EEE8F6]
text-slate-400
text-base">


{{ $element }}


</span>


@endif
@if (is_array($element))


@foreach ($element as $page => $url)



@if ($page == $paginator->currentPage())


<span aria-current="page">


<span
class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
text-base
font-semibold
text-white
bg-gradient-to-r from-[#87BFE8] via-[#A89CCF] to-[#DEA9BF]
shadow-sm">


{{ $page }}


</span>


</span>



@else



<a href="{{ $url }}"


class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
text-base
font-medium
text-slate-600
bg-white
border border-[#EEE8F6]
hover:bg-[#FFF1F7]
hover:text-[#9B8AC9]
transition">


{{ $page }}


</a>



@endif



@endforeach


@endif



@endforeach
{{-- Next Button --}}


@if ($paginator->hasMorePages())


<a href="{{ $paginator->nextPageUrl() }}"


class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
bg-white
border border-[#EEE8F6]
text-[#9B8AC9]
hover:bg-[#FFF1F7]
transition">


<svg class="w-5 h-5"
fill="currentColor"
viewBox="0 0 20 20">


<path fill-rule="evenodd"
d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
clip-rule="evenodd" />


</svg>


</a>



@else



<span

class="inline-flex items-center justify-center w-12 h-12
rounded-2xl
bg-white
border border-[#EEE8F6]
text-[#D8CEE8]
cursor-not-allowed">


<svg class="w-5 h-5"
fill="currentColor"
viewBox="0 0 20 20">


<path fill-rule="evenodd"
d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
clip-rule="evenodd" />


</svg>


</span>



@endif



</div>


</nav>


@endif