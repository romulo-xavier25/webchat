<nav class="navSidebar">
    <ul class="menuSidebar">

        @php
            $paginaLink = basename($_SERVER['REQUEST_URI']);
        @endphp


        <li>
            <a <?php if($paginaLink == "perfil") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="{{ route('perfil') }}">
                <img src="{{ asset('images/user-profile.svg') }}" class="iconeMenuLateral" alt=""> 
                Perfil
            </a>
        </li>
        <li>
            <a <?php if($paginaLink == "meus-anuncios") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="{{ route('meus-anuncios') }}">
                <img src="{{ asset('images/megaphone.svg') }}" class="iconeMenuLateral" alt=""> 
                Meus Anúncios
            </a>
        </li>
        <li>
            <a <?php if($paginaLink == "chat") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="{{ route('chat') }}">
                <img src="{{ asset('images/chat-bubble-with-lines.svg') }}" class="iconeMenuLateral" alt=""> 
                Chat
            </a>
        </li>
        <li>
            <a href="">
                <img src="{{ asset('images/credit-card-payment.svg') }}" class="iconeMenuLateral" alt=""> 
                Pagamentos
            </a>
        </li>
    </ul>
</nav>