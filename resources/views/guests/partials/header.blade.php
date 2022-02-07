<header>
    {{-- header-top --}}
    <div class="container-fluid d-flex p-4 mx-3 justify-content-between align-items-center">
        <div class="header-logo ">
            <a href="/" class="d-flex">
                <img class="img-fluid" src="https://cdn.worldvectorlogo.com/logos/carrefour-supermarket-logo.svg" alt="">
            </a>
        </div>
        {{-- search-bar --}}
        <div class="search-bar-container mx-2">
            <form class="searchForm">
                <input class="SearchBar" id="search" type="text" placeholder="Di cosa hai bisogno?" required>
                <input id="submit" type="submit" value="lente">
            </form>
        </div>

        {{-- header-right --}}
        <div class="right-header d-flex align-items-center">
            {{-- badge --}}
            <div class="paybackBadge mx-3">
                sks
            </div>
            {{-- carrello --}}
            <div class="minicart  mx-3">
                <a href="/">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
    {{-- header-bottom --}}
    <div class="container-fluid"></div>
</header>