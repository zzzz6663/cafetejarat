@if ($paginator->lastPage() > 1)
    <div class="pagination">
            <ul>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a  class="page"  href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        <span class="pagination-result">
            صفحه
            {{$paginator->currentPage()}}
                از
               {{$paginator->lastPage()}}
            </span>

    </div>

<div class="page-nav">
    <span class="next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disn' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >
               <svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z" fill="currentColor"></path></svg>
        </a>
    </span>
     <span class="prev {{ ($paginator->currentPage() == 1) ? ' disn' : '' }} ">
     <a href="{{ $paginator->url($paginator->currentPage()-1) }}">
             <svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M20.465 8.36104H0.115967V9.87304H20.465L16.411 13.928L17.48 14.997L23.359 9.11804L17.479 3.23804L16.411 4.30704L20.465 8.36104Z" fill="currentColor"></path></svg>
     </a>
    </span>
</div>
@endif
