jQuery(document).ready(function ($) {
    var colors = [
        {
            primary: '188, 59, 59',
            secondary: '201, 98, 98'
        },
        {
            primary: '44, 141, 80',
            secondary: '59, 188, 106'
        },
        {
            primary: '215, 137, 181',
            secondary: '228, 177, 206'
        },
        {
            primary: '98, 163, 201',
            secondary: '137, 186, 215',
        },
        {
            primary: '112, 112, 112',
            secondary: '141, 141, 141'
        },
        {
            primary: '188, 59, 132',
            secondary: '201, 98, 157'
        },
        {
            primary: '224, 145, 115',
            secondary: '232, 172, 150'
        },
        {
            primary: '201, 197, 90',
            secondary: '212, 209, 123'
        },
    ]

    $('.dropdown-item').click(function () {
        var index = $(this).data('index');
        // document.documentElement.style.setProperty('--primary', colors[index].primary);
        // document.documentElement.style.setProperty('--secondary', colors[index].secondary);
        $(':root').css('--primary', colors[index].primary);
        $(':root').css('--secondary', colors[index].secondary);

        localStorage.setItem("colors", JSON.stringify(colors[index]));
        console.log(localStorage);
    })

    $('.card-title').click(function () {
        location.href = 'acontecimento.html';
    })

    $('.back').click(function () {
        location.href = $(this).data('href');
    })

    $('.alternar .dropdown-toggle').html(
        $('.tribe-events-c-view-selector__list-item--active span').clone()
    )

    $(function () {   //same as: $(function() {
        c = JSON.parse(localStorage.getItem('colors'));
        console.log(c);
        if (c != null) {
            console.log(c.primary);
            $(':root').css('--primary', c.primary);
            $(':root').css('--secondary', c.secondary);
        }
    })
});


