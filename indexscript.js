const menuToggle = document.querySelector(".toggle"); //menu toggle mentioned above
const showcase = document.querySelector(".showcase"); //showcase toggle so it can move.

menuToggle.addEventListener('click', () => { //onclick listener to activate the right side menu.
    menuToggle.classList.toggle('active')
    showcase.classList.toggle('active')
})


document.querySelectorAll('.addbtn').forEach(x => { //onclick listener to make the add to cart button increase the amount for any item and increase the total amount
    x.addEventListener('click', e => {
        var row = e.target.parentElement.parentElement;

        var input = row.querySelector('input.quantity')
        var value = parseInt(input.value)

        var price = row.querySelector('td[data-td-type = "price"]') //we get the data from the table built in php and we use it in javascript as a piece of text
        price = price.innerText //get the text in a var
        price = parseFloat(price.substr(1)) //parse the value of the variable without the $

        var total = document.getElementById('total')
        total.value = '$' + (price + parseFloat(total.value.substr(1))).toFixed(2) //to avoid too many decimal numbers

        input.value = value + 1 //adding to the value
    })
})

document.querySelectorAll('.removebtn').forEach(x => { //onclick listener to made the remove button decrease the amount for any item and decrease the total amount
    x.addEventListener('click', e => {
        var row = e.target.parentElement.parentElement;

        var input = row.querySelector('input.quantity')
        var value = parseInt(input.value)

        if (input.value > 0) { //filter for going lower than 0.
            input.value = value - 1;

            var price = row.querySelector('td[data-td-type = "price"]')
            price = price.innerText
            price = parseFloat(price.substr(1))

            var total = document.getElementById('total')
            total.value = "$" + (parseFloat(total.value.substr(1)) - price).toFixed(2) //to avoid too many decimal numbers
        }
    })
})

document.querySelectorAll('.checkouts').forEach(x => { //javascript local storage save for the order description so we can use it in multiple pages.
    x.addEventListener('click', e => {

        var str = document.getElementById('desc').value
        window.localStorage.setItem('description', str)

        var tot = document.getElementById('total').value
        window.localStorage.setItem('grandtotal', tot)
    })
})