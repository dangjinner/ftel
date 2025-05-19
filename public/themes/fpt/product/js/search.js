let queryParams = {
    query: '',
    attribute: {},
    sort: 'latest',
    price_start: 0,
    price_end: 0,
    category: '',
    brand: '',
};

function fetchProducts() {
    queryParams.query = $('#query').val();
    var url = route('product.shop.list', queryParams);
    window.location = url;
};

function toggleAttributeFilter(slug, value) {
    if (! queryParams.attribute.hasOwnProperty(slug)) {
        queryParams.attribute[slug] = [];
    }


    if (queryParams.attribute[slug].includes(value)) {
        console.log(queryParams.attribute[slug].indexOf(value));
    } else {
        queryParams.attribute[slug].push(value);
    }
};

function getCat()
{
    queryParams.category = $('#category').val();
}



$('.select-title').on('change', function(){
    // getCat();
    getAttributes();
    queryParams.sort = $(this).val();
    fetchProducts();
});

function getSort()
{
    queryParams.sort = $('.select-title').val();
}

function getAttributes()
{
    $('ul.scroll-product').each(function(){
        let slug = $(this).data('attribute');
        queryParams.attribute[slug] = [];

        let attributeChecked = $(this).find(`.${slug}:checked`).map(function() {
            return $(this).val();
        }).get();

        $.each(attributeChecked, function(index, value){
            toggleAttributeFilter(slug, value);
        })
    });
}

$('input[type="checkbox"]').click(function(){
    getSort();
    // getCat();
    $('ul.scroll-product').each(function(){
        let slug = $(this).data('attribute');
        queryParams.attribute[slug] = [];

        let attributeChecked = $(this).find(`.${slug}:checked`).map(function() {
            return $(this).val();
        }).get();

        $.each(attributeChecked, function(index, value){
            toggleAttributeFilter(slug, value);
        })
    });
    fetchProducts();
});

