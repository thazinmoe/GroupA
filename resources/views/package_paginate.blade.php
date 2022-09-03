                <ul class="clearfix">
                  @forelse($travelPackages as $travel)
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
                  @empty
                  <div class="alert alert-danger">
                    No Data Available!!
                  </div>
                  @endforelse

                </ul>
                <div class="pagination">
                  @if(request()->is('package-travel'))
                  {!! $travelPackages->render() !!}
                  @endif
                </div>