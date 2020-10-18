<!-- Start Small Banner  -->
<style>
    .feat-nav{
        display: contents;
        flex-wrap: wrap;
        list-style: none;
        justify-content: center;
        max-width: 1220px;
        margin: auto;
    }
    .feat-nav a{
        font-size: 14px;
        font-weight: 600;
        color: #231f20;
        -webkit-transition: all 0.33s;
        -moz-transition: all 0.33s;
        transition: all 0.33s;
        border: 1px solid #ddd;
        margin: 0 -1px -1px 0;
        background: #fff;
        display: flex;
        align-items: center;
        padding: 15px 15px 20px 15px;
        width: 16.75%;
        justify-content: center;
        flex-direction: column;
    }
    .feat-nav .image-tab{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .feat-nav a span{
        margin-left: 10px;
        text-align: center;
    }
    .feat-nav a:hover{
        color: orange;
    }
</style>

<section class="small-banner section" style="background: #f2f2f2;">
    <div class="container p-4">
        <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                    </div>
                </div>
            </div>
        <div class="row">
            <!-- Single Banner  -->
            <div class="feat-nav">
        @foreach( App\Category::where('featured', 1)->inRandomOrder()->get()->take(12) as $category)
            <a href="{{ route('category.product.new2', $category->slug) }}">
                <div class="image-tab">
                    <img src="{{ asset( $category->image ) }}" style="" alt="#">
                    
                </div>
                <span>{{ $category->name }}</span>
            </a>
            
        @endforeach
                </div>
        </div>


        {{-- Brands section  --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="section-title">
                    <h2>Shop By Brands</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Banner  -->
            <div class="feat-nav">
        @foreach( App\Brand::where('status', 1)->inRandomOrder()->get()->take(12) as $brand)
            <a href="{{ route('products.brands', $brand->brandId) }}">
                <div class="image-tab">
                    <img src="{{ asset( $brand->image ) }}" style="" alt="#">
                    
                </div>
                <span>{{ $brand->brandName }}</span>
            </a>
            
        @endforeach
                </div>
        </div>


    </div>
</section>
<!-- End Small Banner -->