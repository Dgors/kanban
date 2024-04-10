//В разработке
/*
Код для каждого элемента:
if (element.classList.contains('status-max')) {
        element.addEventListener('click', function () {
            element.classList.remove('status-max');
            element.classList.add('status-min')
        })
    }

 */
let elements = document.querySelectorAll('.status-form')
elements.forEach(function(element) {
    element.addEventListener('click', function () {
    if (element.classList.contains('status-max')) {
        elements.forEach(function (element) {
            element.classList.remove('status-max');
            element.classList.add('status-min');
        })
    } else {
        elements.forEach(function (element) {
            element.classList.remove('status-min');
            element.classList.add('status-max');
        })
    }
    })

})
