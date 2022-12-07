<div class="row">
    <div class="col-lg-12 order-2 order-lg-1">
        <h5 class="text-uppercase mb-4">Categories</h5>
        <div class="py-2 px-4 bg-black text-white mb-3">
            <select id="categories" class="list-unstyled small text-muted ps-lg-4 font-weight-normal" onchange="this.options[this.selectedIndex].value && (window.location = '/products?category='+this.options[this.selectedIndex].value);">
                @if($categoryId == null)
                    <option value="{{$categoryId}}" selected="selected">ALL</option>
                @else
                    @foreach($categories as $category)
                        @if ($category->id == $categoryId)
                            <option value="{{$categoryId}}" selected="selected">{{ucfirst(strtolower($category->name))}}</option>
                        @else
                            <option value="{{$category->id}}">{{ucfirst(strtolower($category->name))}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
