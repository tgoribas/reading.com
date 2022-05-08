/**
 * Faz a chamada da API para fazer a busca dos livros
 * @param {string} search 
 */
function searchBook(search){
    // Elemento da lista de livros
    var bookList = document.getElementById("bookSearchList");

    // Verifica se o texto é maior que 2 caracteres
    if(search.length>2){
        // Parametros para a busca dos livros
        var params = 'volumes?q=' + encodeURI( search ) + '&maxResults=3&printType=books&orderBy=relevance';
        // Faz a chamdada da API
        apiBook(params,'writeListBook');
    } else {
        bookList.style.display="none";
    }
}

/**
 * Faz a chamda da API para inserir o formulario
 * @param {string} idGoogle 
 */
function formBook(idGoogle){
    // Elemento para inserir o formulario
    var bookForm = document.getElementById("formBook");
    // Elemento da lista de livros
    var bookList = document.getElementById("bookSearchList");


    // Verifica se o idGoogle é uma string
    if(typeof idGoogle === 'string'){
        // Parametros para a busca
        var params = 'volumes/' + idGoogle;
        // Faz a chamada da API
        apiBook(params,'writeBookForm');
        // Remove a lista de livros
        bookList.style.display="none";
    } else {
        bookForm.style.display="none";
    }
}


/**
 * Função para imprimir na tela o formulario com o livro
 * @param {json} json 
 */
function writeBookForm(json) {
    // Elemento para inserir o formulario
    var bookForm = document.getElementById("formBook");
    var html = '';

    if(json) {
        // Prepara as variaveis do livro
        var book = {
            'title'     : json.volumeInfo.title,
            'idGoogle'  : json.id,
            'authors'   : json.volumeInfo.authors[0],
            'pages'     : json.volumeInfo.pageCount,
            'published' : json.volumeInfo.publishedDate,
            'isbn'      : json.volumeInfo.industryIdentifiers[0].identifier,
            'image'     : (json.volumeInfo.imageLinks) ? json.volumeInfo.imageLinks.smallThumbnail : 'capalivro.jpg'
        }
        html += `
        <div class="row">
        <div class="col-md-3">
            <img src="${book.image}" class="w-100 rounded-3" alt="">
        </div>
        <div class="col-md-9">
            <h3 class="fs-5 mb-0">${book.title}</h3>
            <p class="fs-6 text-primary my-0">${book.authors}</p>
            <p class="fs-12px text-primary my-0">${book.pages} Paginas</p>
            <div class="row g-3 my-2 align-items-center">
                <div class="col-md-3">
                    <label for="dateStart" name="dateStart" class="col-form-label">Inicio da Leitura</label>
                </div>
                <div class="col-auto">
                    <input type="date" id="dateStart" name="dateStart" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="dateEnd" class="col-form-label">Termino da Leitura</label>
                </div>
                <div class="col-auto">
                    <input type="date" id="dateEnd" name="dateEnd" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <p class="my-2">
            <input type="hidden" name="idGoogle" value="${book.idGoogle}" >
            <input type="hidden" name="ratingBook" id="ratingBook" value="0" >
            <label for="inputPassword6" class="col-form-label">Sua Avaliação</label>
                <i class="bi bi-star-fill text-star cursor-pointer" id="star_1" onmouseover="ratingHover('1')" onmouseout="ratingOff()" onclick="ratingClick('1')"></i>
                <i class="bi bi-star-fill text-star cursor-pointer" id="star_2" onmouseover="ratingHover('2')" onmouseout="ratingOff()" onclick="ratingClick('2')"></i>
                <i class="bi bi-star-fill text-star cursor-pointer" id="star_3" onmouseover="ratingHover('3')" onmouseout="ratingOff()" onclick="ratingClick('3')"></i>
                <i class="bi bi-star-fill text-star cursor-pointer" id="star_4" onmouseover="ratingHover('4')" onmouseout="ratingOff()" onclick="ratingClick('4')"></i>
                <i class="bi bi-star-fill text-star cursor-pointer" id="star_5" onmouseover="ratingHover('5')" onmouseout="ratingOff()" onclick="ratingClick('5')"></i>
            </p>
            <p class=" mt-2"> Resenha </p>
            <textarea class="form-control" name="resenhaLivro" id="resenhaLivro" cols="30" rows="6"></textarea>
            <button type="submit" class="btn btn-danger mt-3">Adiconar Livro</button>
        </div>
        </div>
        `;
        // Imprime na tela o formulario
        bookForm.innerHTML = html;
        bookForm.style.display="block";        
    }
}



/**
 * Função para imprimir na tela a lista de livros da busca
 * @param {json} json 
 */
function writeListBook(json) {
    // Elemento da lista de livros
    var bookList = document.getElementById("bookSearchList");
    var html = '';

    if(json) {
        // Passa por todos os items
        json.items.forEach(element => {
            // Prepara as variveis com os livros
            var book = {
                'title'     : element.volumeInfo.title,
                'idGoogle'  : element.id,
                'authors'   : element.volumeInfo.authors[0],
                'published' : element.volumeInfo.publishedDate,
                'isbn'      : element.volumeInfo.industryIdentifiers[0].identifier,
                'image'     : (element.volumeInfo.imageLinks) ? element.volumeInfo.imageLinks.smallThumbnail : 'capalivro.jpg'
            }
            html += `
            <li class="list-group-item cursor-pointer" onclick="formBook('${book.idGoogle}')" >
            <div class="row ">
                <div class="col-md-1">
                    <img src="${book.image}" class="w-100 rounded-2" alt="">
                </div>
                <div class="col-md-11">
                    <h3 class="fs-6 mb-0">${book.title}</h3>
                    <p class="fs-14px text-primary my-0">${book.authors}</p>
                    <p class="fs-12px mt-1 fw-bold">${book.published}</p>
                </div>
            </div>
            </li>
            `;
            // Imprime na tela a lista com o livro
            bookList.innerHTML = html;
            bookList.style.display="block";
            // console.log(book);
        });
    } else {
        // Mensagem quando nenhum livro e encontrado
        html = `
        <li class="list-group-item">
        <div class="row ">
            <div class="col-md-12">
                <h3 class="fs-6 mb-0">Nenhum Livro foi encontrado</h3>
            </div>
        </div>
        </li>
        `;
        bookList.innerHTML = html;
        bookList.style.display="block";
    }
}

/**
 * Função que faz a busca dos livros na API.
 * @param {string} params 
 * @param {string} callfunction 
 */
function apiBook(params,callfunction){
    // URL DA API
    var urlAPI = 'https://www.googleapis.com/books/v1/';
    var xmlreq =  new XMLHttpRequest();
    var json = null;
    // Inicia a requicião
    xmlreq.open("GET", urlAPI+params, true);
    xmlreq.onreadystatechange = function(){
        // Verifica o Status da Requisição
        if (xmlreq.readyState == 4 && xmlreq.status == 200 ) {
            json = JSON.parse(xmlreq.responseText);
            // (json.totalItems > 0), verifica se foi encontrado itens [BUSCA FEITA COM A QUERY]
            // (json.id), verifica se existe 'id' da busca do livro [BUSCA FEITA COM GOOGLE ID]
            if (json.totalItems > 0 || json.id) {
                // Faz a chamdada da função dinamicamente pelo conteúdo da variavel  'callfunction'
                window[callfunction](json);
            } else {
                window[callfunction](null);
            }
        } else {
            // console.log("Error na Busca");
            window[callfunction](null);
        }
    };
    xmlreq.send();
}

/**
 * PONTUAÇÃO 5 ESTRELA
 * Funções para o efeito da pontuação em formato 5 estrela.
 */

// Variavel para controlar o pontuação que foi selecionada
var ratingBook = 0;

// Função ONMOUSEOVER
function ratingHover(rating) {
    removeAllRating();
    insertStar(rating);
}

// Função ONMOUSEOUT
function ratingOff() {
    removeAllRating();
    insertStar(ratingBook);
}

// Função ONCLICK
function ratingClick(rating) {
    ratingBook = rating;
    insertStar(rating);
    document.getElementById("ratingBook").value = ratingBook;
}

// Remove todas as estrelas
function removeAllRating(){
    for (let i = 1; i <= 5; i++) {
        var star = document.getElementById("star_"+i);
        star.classList.remove("text-warning");
        star.classList.add("text-star");
    }
}

// Insere as estrelas com quantidade passada pela variavel 'rating'
function insertStar(rating){
    for (let i = 1; i <= rating; i++) {
        var star = document.getElementById("star_"+i);
        star.classList.remove("text-star");
        star.classList.add("text-warning");
    }
}