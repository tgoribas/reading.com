                    
                    <div class="col-md-6  d-flex">
                        <div class="row rounded-3 p-3 shadow-sm"  style="display: flex;justify-content: center;">
                            <div class="col-md-3">
                                <img src="{{$book['image']}}" class="w-100 rounded-2" alt="">
                            </div>
                            <div class="col-md-9">
                                <h3 class="fs-6 mb-0">{{$book['title']}}</h3>
                                <p class="fs-14px text-primary my-0">{{$book['authors']}}</p>
                                <p class="my-0">
                                    @for ($i=1; $i <= 5; $i++)
                                        <i class="bi bi-star-fill text-{{($i<=$book['rating']) ? 'warning' : 'star'}}"></i>
                                    @endfor
                                </p>
                                <p class="fs-12px mt-2">
                                    Você começou ler o livro em: <span class="fw-bold">{{$book['dateStart']}}</span>
                                    @if ($book['status'] == 'finalizado')
                                    <br>Você começou terminou o livro em: <span class="fw-bold">{{$book['dateEnd']}}</span>
                                    @endif
                                </p>
                                <div class="text-end" style="display: flex;justify-content: end;">
                                    @if ($book['status'] == 'pendente')
                                    <a name="" id="" class="btn btn-light btn-sm" href="#" role="button">Terminar Livro</a>
                                    @endif
                                    <a name="" id="" class="btn btn-light btn-sm ms-2" href="#" role="button"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/delete" method="POST">
                                        <input type="hidden" value="{{$book['id']}}" name="userbook">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light btn-sm ms-2"><i class="bi bi-trash-fill"></i></button>               
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>