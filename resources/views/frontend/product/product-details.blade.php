@extends('layouts.front')

@section('title', $product->name)

@section('main-content')
    <div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ route('category') }}">
                    Collection
                </a>
                 /
                 <a href="{{ route('category', $product->category->slug) }}">
                    {{ $product->category->name }}
                </a>
                  /
                  <a href="{{ route('category',[$product->category->slug,  $product->slug]) }}">
                    {{ $product->name }}
                </a>
             </h6>
        </div>
    </div>
    <div class="container  pb-5">
        <div class=" product_data  p-3 mb-5 bg-white rounded">
            <div class="">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset($product->image) }}" alt="Product Image" height="250px">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == 1)
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                        @php
                            $rating_num = number_format($rating_value);
                            
                        @endphp 
                        <div class="rating">
                            @for ($i = 1; $i<= $rating_num; $i++)
                            <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rating_num+1;  $j<= 5; $j++)
                            <i class="fa fa-star"></i> 
                            @endfor
                            @if ($ratings->count() > 0)
                                <span>{{ $ratings->count() }} Ratings</span>
                             @else
                                 No Ratings
                            @endif

                        </div>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                
                                <label for="quantity">Quantity</label>
                                <div class="input-group  mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control text-center qty-input" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                  </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 float-start addToWishlist">Add to Wishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">{!! $product->description !!}</p>
                </div>
                <hr>
                <div class="row">
                    @if (Auth::check())
                    <div class="col-md-4">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Rate this product
                        </button>
                        <span type="button" class="" data-bs-toggle="modal" data-bs-target="#review">
                            Write a Review
                        </span>
                       
                    </div>
                    @else
                      <div class="col-md-4">
                            <a href="{{ route('login') }}" class="btn btn-link" >
                                Rate this product
                            </a>
                            <a href="{{ route('login') }}" type="button" class="">
                                Write a Review
                            </a>
                      </div>  
                    @endif
                    <div class="col-md-8">
                        @foreach ($total_reviews as $item)
                            <div class="user-review">
                                <label for="">{{ $item->user->name.' '.$item->user->lname ?? "" }}</label><br>
                                @php
                                    $rating = App\Models\Rating::where('prod_id', $product->id)->where('user_id', $item->user->id)->first();
                                @endphp
                                @if ($rating)
                                    @php
                                        $user_rateing = $rating->stars_rated;
                                    @endphp
                                    {{-- @dd($user_rateing) --}}
                                    @for ($i = 1; $i<= $user_rateing; $i++)
                                    <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $user_rateing+1;  $j<= 5; $j++)
                                    <i class="fa fa-star "></i> 
                                    @endfor
                                @endif
                                
                                <small>Review on {{ $item->created_at->format('d M Y') }}</small>
                                <p>{{ $item->user_review }}</p>
                            </div>
                        @endforeach
                    </div>  
            </div>
            </div>
        </div>
    </div>

    <!-- Modal 1-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('add-user-rating') }}" method="post">
            @csrf
            <input type="hidden" name="prod_id" value="{{ $product->id }}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Rate {{ $product->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if ($user_rating)
                        @for ($i = 1; $i<= $user_rating->stars_rated; $i++)
                            <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                            <label for="rating{{ $i }}" class="fa fa-star"></label>
                        @endfor
                        @for ($j = $user_rating->stars_rated + 1; $j<= 5; $j++)
                            <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}">
                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                        @endfor
                    @else
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!----Modal 2---->

  <div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('add-user-review') }}" method="post">
            @csrf
         <input type="hidden" name="prod_id" value="{{ $product->id }}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> You are writing a review {{ $product->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="user_review">Write A Review</label>
                <textarea name="user_review" id="user_review" cols="30" rows="3" class="form-control">{{ $prod_review->user_review ?? '' }}</textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection


