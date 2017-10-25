<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        @for($i = 1; $i <= count(Request::segments()); $i++)
            <li class="breadcrumb-item">
                <a href="@for($j = 1; $j <= count(Request::segments()); $j++)

                        @endfor
                    ">{{ ucfirst(Request::segment($i))  }}</a>
            </li>
        @endfor
    </ol>
</nav>