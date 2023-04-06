@extends('users.app')
@section('single')

@isset($book)
    
    <div class="container text-center">
        <div class="text-align">
        <img src="{{url($book->image)}}" alt="" height="500" width="auto"><br><br>
                
            <h3>
                <b>{{$book->about}}<br></b>
            </h3>
            
            <h4>
                
                Ad:{{$book->book}}<br>
                Məhsul kodu:{{$book->code}}<br>
                Səhifə sayı:{{$book->page}}<br>
                Nəşriyyat:{{$book->publisher}}<br>
                Cild:{{$book->binding}}<br>
                Dil:
                @if ($book->language = "AZ")
                    Azərbaycan
                @elseif ($book->language = "TR")
                    Türk dili
                @elseif ($book->language = "RU")
                    Rus dili
                @elseif ($book->language = "EN")
                    İngilis dili
                @else
                    
                @endif
                <br>
                Müəllif:{{$book->author}}<br>
                Janr:{{$book->category}}<br>
                Qiymət:{{$book->price}}<br>
                Status:
                @if ($book->stock > 0)
                mövcuddur <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                          </svg>    
                @elseif($book->stock == 0)
                mövcud deyil <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                             </svg>  
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>  
                @endif
                <br>
                
                <a href="#"><input type="submit" name="order" value="Sifariş et" class="btn btn-success disabled">Müvəqqəti işləmir</a>
                
            </h4>
        </div>
    </div>
@endisset


@endsection