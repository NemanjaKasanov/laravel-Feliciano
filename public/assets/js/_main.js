$(document).ready(function(){
    // Initial
    $('.preventDefault').click(function(e){ e.preventDefault(); });
    $('#itemAddedToCart').hide();
    getItemsInCartNumber();
    getLikesNumber();
    getProductComments();

    // Events For Search, Order By and Category
    $('.category, #search_btn').click(function(e){
        e.preventDefault();

        let category;
        if($(this).attr('id') == 'search_btn')
            category = $('.category.active').attr('id');
        else
            category = $(this).attr('id');
        let search = $('#search').val();

        getDishes(category, search);
    });

    // Get Price of Size
    $('#size').change(function(){
        let _token = $("input[name='_token']").val();
        let id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            'url': '/Feliciano/public/getSizePrice',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                _token: _token,
                id: id
            },
            success: function(price){
                $('#product_price').html(price);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    // Add Item to Cart
    $('#submit_order_btn').click(function(){
        let _token = $("input[name='_token']").val();
        let product = $('#product_id').val();
        let price = $('#size').val();
        let extras = [];

        $("input:checkbox[name='extras']:checked").each(function(){
            extras.push($(this).val());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            'url': '/Feliciano/public/add_to_cart',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                _token: _token,
                product: product,
                price: price,
                extras: extras
            },
            success: function(data){
                getItemsInCartNumber();
                $('#itemAddedToCart').show();
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    // Like Product
    $('#like').click(function(){
        let _token = $("input[name='_token']").val();
        let product = $('#product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            'url': '/Feliciano/public/like_product',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                _token: _token,
                product: product
            },
            success: function(data){
                getLikesNumber(data);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    // Comment Product
    $('#submit_comment_btn').click(function(){
        let _token = $("input[name='_token']").val();
        let product = $('#product_id').val();
        let comment = $('#comment').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            'url': '/Feliciano/public/comment_product',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                _token: _token,
                product: product,
                comment: comment
            },
            success: function(data){
                getProductComments();
                $('#comment').val("");
            },
            error: function(err){
                console.log(err);
            }
        });
    });

});

function getProductComments(){
    let _token = $("input[name='_token']").val();
    let product = $('#product_id').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        'url': '/Feliciano/public/get_comments',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            _token: _token,
            product: product
        },
        success: function(data){
            displayComments(data);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function displayComments(data){
    let html = '';
    if(data.length != 0) {
        data.forEach(el => {
            html += `
                <li class="comment border-top pt-2">
                    <div class="comment">
                        <h3>${el.user.name} ${el.user.last_name}</h3>
                        <div class="meta mb-2">${el.time}</div>
                        <p>${el.content}</p>
                    </div>
                </li>
            `;
        });
    }
    else{
        html += `
            <li>
                <p class="h4">No comments so far.</p>
            </li>`;
    }
    $('#comments_display').html(html);
}

function getLikesNumber(){
    let _token = $("input[name='_token']").val();
    let product = $('#product_id').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        'url': '/Feliciano/public/get_likes_number',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            _token: _token,
            product: product
        },
        success: function(data){
            $('#likes_number').html(data);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function getItemsInCartNumber(){
    let _token = $("input[name='_token']").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        'url': '/Feliciano/public/get_cart_items_number',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            _token: _token
        },
        success: function(data){
            $('#orderItemsNumber').html(data);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function getDishes(category, search){
    let _token = $("input[name='_token']").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        'url': '/Feliciano/public/search',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            _token: _token,
            category: category,
            search: search
        },
        success: function(data){
            showDishes(data);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function showDishes(data){
    let html = '';

    data.forEach(el => {
        html += `
            <div class="col-md-4">
                <div class="blog-entry">
                    <a href="/Feliciano/public/dish/${el.id}" class="block-20" style="background-image: url('/Feliciano/public/assets/img/${el.image}')"></a>
                    <div class="text pt-3 pb-4 px-4">
                        <h3 class="heading"><a href="/Feliciano/public/dish/${el.id}">${el.name}</a></h3>
                        <p>${el.description}</p>
                        <p>`;

        el.ingredients.forEach(ing => {
            if(ing == el.ingredients[el.ingredients.length - 1])
                html += `<span>${ing.name}</span>`;
            else
                html += `<span>${ing.name}, </span>`;
        });

        html += `       </p>
                        <div class="col-12 d-flex">
                            <p><a href="/Feliciano/public/dish/${el.id}" class="btn btn-primary">Add to order</a></p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    if(html == ''){
        html += `
            <div class="col-12 text-center mt-5 mb-5">
                <p class="h1">Nothing to display.</p>
                <p>We have found nothing according to the input.</p>
            </div>
        `;
    }

    $('#productsDisplay').html(html);
}
