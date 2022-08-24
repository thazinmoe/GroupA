                <ul class="clearfix">
                @foreach($travelPackages as $travel)
                <li>                  
                <a href="{{ route('detail', $travel) }}" class="package-link">
                  <div class="card">
                    <img src="{{ Storage::url($travel->image)  }}">
                    <h1>{{$travel->name}}</h1>
                    <p class="price">{{number_format($travel->price)}} MMK</p>
                    <a href="{{ route('detail', $travel) }}"><button>Book Now</button></a>
                  </div>
                </a>
                </li>
                @endforeach
                
              </ul>    
              <div class="pagination">
                @if(request()->is('package-travel'))
                  {!! $travelPackages->render() !!}
                @endif
              </div>