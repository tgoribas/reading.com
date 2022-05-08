<x-layout title="Meus Livros" fixedBottom="" >

    @if (isset($_GET['alert']) && $_GET['alert'] == 'deleteok')
        <x-alert class="success" msg="Livro deletado com sucesso"></x-alert>
    @elseif (isset($_GET['alert']) && $_GET['alert'] == 'success')
        <x-alert class="success" msg="Livro inserido com sucesso"></x-alert>
    @elseif (isset($_GET['alert']) && $_GET['alert'] == 'deleteerror')
        <x-alert class="danger" msg="Desculpe, tivemos um problema para remover seu livro"></x-alert>
    @endif

    <div class="container">
        <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#todos">Todos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#pendentes">Livros Pendentes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#terminados">Livros Terminados</a>
        </li>
        </ul>

        <div class="tab-content pt-4">
            <div class="tab-pane container active" id="todos">
                <div class="row gx-5 gy-4 ">
                @foreach ($books as $book)
                    <x-cardbook :book="$book"></x-cardbook>
                @endforeach
                </div>
            </div>

            <div class="tab-pane container fade" id="pendentes">
                <div class="row gx-5 gy-4 ">
                @foreach ($books as $book)
                    @if($book['status'] == 'pendente')
                    <x-cardbook :book="$book"></x-cardbook>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="tab-pane container fade" id="terminados">
                <div class="row gx-5 gy-4 ">
                @foreach ($books as $book)
                    @if($book['status'] == 'finalizado')
                    <x-cardbook :book="$book"></x-cardbook>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layout>