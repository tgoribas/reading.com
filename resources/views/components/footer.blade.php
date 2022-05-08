<footer class="container-fluid bg-white {{$fixedBottom}} p-5">
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <a class="navbar-brand text-danger" href="#"><i class="bi bi-book"></i> READING.COM</a>
        </div>
        <div class="col-md-4">
            <span class="fw-bold">Reading.com</span>
            <ul class="list-unstyled">
                <li><a href="{{@url()->to('/');}}" title="Meu Livros" class="text-decoration-none text-danger">Meus Livros</a></li>
                <li><a href="{{@url()->to('/adicionar');}}" title="Adicionar Livro" class="text-decoration-none text-danger">Adicionar Livros</a></li>
            </ul>

        </div>
        <div class="col-md-4">
            <span class="fw-bold">Inscreva-se</span>
            <form action="">
                <div class="mb-3">
                  <input type="text"
                    class="form-control" name="email" aria-describedby="helpId" placeholder="Seu Email">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger btn-block">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</footer>