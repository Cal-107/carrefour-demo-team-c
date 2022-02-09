<header>
    {{-- headerBunner --}}
    <div class="headerBunner d-flex justify-content-between align-items-center p-1 px-4">
        <div class="HeaderBunnerLeft">
            <a href="/">Lavora con noi</a>
        </div>
        <div class="HeaderBunnerRight ">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="/">Serve aiuto?</a>
                </li>
                <li>
                    <a href="/">Volantini</a>
                </li>
                <li>
                    <a href="/">Punti vendita</a>
                </li>
                <li>
                    <a href="/">Servizi</a>
                </li>
                <li>
                    <a href="/">Carta Carrefour Findomestic</a>
                </li>
            </ul>
        </div>
    </div>


    {{-- header-top --}}
    <div class="d-flex pt-4 pb-2 px-3 mx-3 justify-content-between align-items-center">
        <div class="header-logo ">
            <a href="/" class="d-flex">
                <img class="img-fluid" src="https://cdn.worldvectorlogo.com/logos/carrefour-supermarket-logo.svg" alt="">
            </a>
        </div>
        {{-- search-bar --}}
        <div class="search-bar-container mx-2">
            <form class="searchForm">
                 <input class="SearchBar Search" id="search" type="text" placeholder="Di cosa hai bisogno?" required>
                 <input class="SearchBar"id="submit" type="submit" value="Search">
            </form>
        </div>

        {{-- header-right --}}
        <div class="right-header d-flex align-items-center">
            {{-- badge --}}
             <div class="paybackBadge mx-5">
                 <a href="/">
                    <div class="payback-top">PAYBACK</div>
                    <div class="payback-bottom">Scopri Payback</div>
                 </a>
            </div>
            {{-- carrello --}}
            <div class="minicart mx-4">
                <a href="/">
                      <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
    
    {{-- header-bottom --}}

    <div class="p-2 mx-2">
        <div class="headerNavRight">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="\">Spesa Online</a>
                </li>
                <li>
                    <a href="\">Promozioni</a>
                </li>
            </ul>
        </div>
    </div>
</header>