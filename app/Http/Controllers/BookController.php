<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;


class BookController extends Controller
{
    // Variavel para simular o usuario
    public $idUser = 2;

    public function index()
    { 
        // Faz o SELECT dos livros do usuario
        $userBook = UserBook::query()->orderBy('dateStart','DESC')->get();
        // echo ;
        if(count($userBook)>0) {
            foreach ($userBook as $book) {
                // URL DA API
                $urlAPI = 'https://www.googleapis.com/books/v1/volumes/'. $book->idGoogle;
    
                //CURL INIT
                $curl = curl_init($urlAPI);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
                //$html armazena o conteúdo da requisição
                $html = curl_exec($curl);
    
                if (curl_error($curl)) { die(curl_error($curl)); }
    
                // Check for HTTP Codes
                $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                //CURL END
    
                if ($status == 200) {
                    $json = json_decode($html, true);
                    curl_close($curl);
                    // Prepara as variaveis com o livro.
                    $books[] = [
                        'id'        => $book->id,
                        'title'     => $json['volumeInfo']['title'],
                        'authors'   => $json['volumeInfo']['authors'][0],
                        'pages'     => $json['volumeInfo']['pageCount'],
                        'published' => $json['volumeInfo']['publishedDate'],
                        'image'     => ($json['volumeInfo']['imageLinks']) ? $json['volumeInfo']['imageLinks']['smallThumbnail'] : '',
                        'rating'    => $book->rating,
                        'dateStart' => Carbon::createFromFormat('Y-m-d', $book->dateStart)->format('d/m/Y'),
                        'dateEnd'   => ($book->dateEnd != null) ? Carbon::createFromFormat('Y-m-d', $book->dateEnd)->format('d/m/Y'): '',
                        'status'    => ($book->dateEnd != null) ? 'finalizado' : 'pendente'
                    ];
                }
            }
        } else {
            $books = null;
        }

        return view('books.index', compact('books'));
    }

    public function create ()
    {   
        return view('books.create');
    }

    public function store (Request $request)
    {

        // Validação dos campos do formulario
        $validator = Validator::make($request->all(), [
            'idGoogle' => 'required',
            'dateStart' => 'required|date',
            'dateEnd' => 'sometimes|nullable|date'
        ]);
 
        if ($validator->fails()) {
            return redirect('adicionar/?alert=error')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Prepara a variavel para salvar o livro
        $post = [
            'idGoogle'  => $request->input('idGoogle'),
            'userFK'    => $this->idUser,
            'ISBN_13'   => '9999999999999',
            'dateStart' => $request->input('dateStart'),
            'dateEnd'   => $request->input('dateEnd'),
            'rating'    => $request->input('ratingBook'),
            'review'    => $request->input('resenhaLivro')
        ];

        $userBook = new UserBook();
        $userBook->idGoogle  = $post['idGoogle'];
        $userBook->userFK    = $post['userFK'];
        $userBook->ISBN_13   = $post['ISBN_13'];
        $userBook->dateStart = $post['dateStart'];
        $userBook->dateEnd   = $post['dateEnd'];
        $userBook->rating    = $post['rating'];
        $userBook->review    = $post['review'];

        if ($userBook->save()){
            return redirect('/?alert=success');
        } else {
            return redirect('/adicionar/?alert=error');
        }
    }

    public function destroy(Request $request)
    {
        // Deleta o livro do usuario
        if(UserBook::where('id',$request->input('userbook'))->delete()){
            return redirect('/?alert=deleteok');
        } else {
            return redirect('/?alert=deleteerror');
        }
    }

}
