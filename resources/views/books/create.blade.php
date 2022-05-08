<x-layout title="Adicionar Livro" fixedBottom="">
       
    @if (isset($_GET['alert']) && $_GET['alert'] == 'error')
        <x-alert class="danger" msg="Prencha corretamente o formulario"></x-alert>
    @endif

    <div class="container" style="margin-top: 10px;">
        <div class="container">
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="bookSearch" id="bookSearch" placeholder="Procurar livro" onkeyup="searchBook(this.value)">
                        <div class="shadow-lg" > 
                            <ul class="list-group list-group-flush" id="bookSearchList" style="display: none;">
                            </ul>
                        </div>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="container mt-5" id="formBook" style="display: none;"></div>
                    </form>
                </div>
        </div>
    </div>
</x-layout>