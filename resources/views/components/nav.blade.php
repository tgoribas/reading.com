<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm ">
    <div class="container">
        <a class="navbar-brand text-danger" href="{{@url()->to('/');}}"><i class="bi bi-book"></i> READING.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-3 me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{@url()->to('/');}}">Meus Livros</a>
                </li>
            </ul>
            <span class="navbar-text">
                <a name="adicionar" id="adicionar" class="btn btn-danger btn-sm text-light me-3 rounded-pill" href="{{@url()->to('/adicionar');}}" role="button">Adicionar Livro</a>
                <img src="https://i.pravatar.cc/40" class="rounded-pill" alt="User">
            </span>
        </div>
    </div>
</nav>
