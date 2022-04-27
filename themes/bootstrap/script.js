

jQuery(document).ready(function($) {
    var colors = [
        {
            primary: '#bc3b3bff',
            secondary: '#c96262ff'
        },
        {
            primary: '#2c8d50ff',
            secondary: '#3bbc6aff'
        },
        {
            primary: '#d789b5ff',
            secondary: '#e4b1ceff'
        },
        {
            primary: '#62a3c9ff',
            secondary: '#89bad7ff'
        },
        {
            primary: '#707070ff',
            secondary: '#8d8d8dff'
        },
        {
            primary: '#bc3b84ff',
            secondary: '#c9629dff'
        },
        {
            primary: '#e09173ff',
            secondary: '#e8ac96ff'
        },
        {
            primary: '#c9c55aff',
            secondary: '#d4d17bff'
        },
    ]
    
    $('.dropdown-item').click(function () {
        var index = $(this).data('index');
        document.documentElement.style.setProperty('--primary', colors[index].primary);
        document.documentElement.style.setProperty('--secondary', colors[index].secondary);
    })
    
    $('.card-title').click(function () {
        location.href = 'acontecimento.html';
    })
    
    $('.back').click(function () {
        location.href = $(this).data('href');
    })
});