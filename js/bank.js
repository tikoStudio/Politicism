let popupBank = document.querySelector('.popup__bank')
let btn = popupBank.querySelector('.btnBank')
let checkbox = popupBank.querySelector('#check')
let errorField = popupBank.querySelector('.error')

let playerCash = parseInt(cash)
let playerBank = parseInt(bank)

let error


btn.addEventListener('click', () => {
    let transferAmount = 0
    transferAmount = popupBank.querySelector('#transferAmount').value
    if(checkbox.checked) { //amount taken from bank to player
        if(transferAmount == "") {
            error = "You must give an amount of cash to recieve!"
            errorField.innerHTML = error
        }else {
            if(playerBank >= transferAmount) {
                if(transferAmount <= 0) {
                    error = "You cannot send 0 or negative numbers!"
                    errorField.innerHTML = error
                }else {
                    if(transferAmount.includes(',') || transferAmount.includes('.')) {
                        error = "You cannot use a comma in your transfer amount!"
                        errorField.innerHTML = error
                    }else {
                        let formData = new FormData();
                        formData.append('transferamount', transferAmount)  
                        formData.append('token', token)
                        fetch('ajax/getCashFromBank.php', {
                            method: 'POST',
                            body: formData
                            })
                            .then((response) => response.json())
                            .then((result) => {
                                // temp remove the thing from screen and add updated numbers on page
                                document.querySelector('.bank__amount__popup').innerHTML = `bank: $${result['bank']}`
                                document.querySelector('.cash__amount__popup').innerHTML = `cash: $${result['cash']}`
                                document.querySelector('.cash__display').innerHTML = `$${result['cash']}`
                                document.querySelector('.bank__display').innerHTML = `$${result['bank']}`
                                playerCash = result['cash']
                                playerBank = result['bank']
                                error = ""
                                errorField.innerHTML = error
                                popupBank.style.display = "none"
                                blurred.style.display = "none"
                                document.querySelector('body').style.overflow = "scroll"
                            })
                            .catch((error) => {
                            console.error('Error:', error);
                            });
                    }
                }
            }else {
                error = "You do not have enough money in the bank!"
                errorField.innerHTML = error
            }
        }
    } else { // amount taken from player to bank
        if(transferAmount == "") {
            error = "You must give an amount of cash to transfer!"
            errorField.innerHTML = error
        }else {
            if(playerCash >= transferAmount) {
                if(transferAmount <= 0) {
                    error = "You cannot send 0 or negative numbers!"
                    errorField.innerHTML = error
                }else {
                    if(transferAmount.includes(',') || transferAmount.includes('.')) {
                        error = "You cannot use a comma in your transfer amount!"
                        errorField.innerHTML = error
                    }else {
                        let formData = new FormData();
                        formData.append('transferamount', transferAmount)  
                        formData.append('token', token)
                        fetch('ajax/getBankFromCash.php', {
                            method: 'POST',
                            body: formData
                            })
                            .then((response) => response.json())
                            .then((result) => {
                               // temp remove the thing from screen and add updated numbers on page
                                document.querySelector('.bank__amount__popup').innerHTML = `bank: $${result['bank']}`
                                document.querySelector('.cash__amount__popup').innerHTML = `cash: $${result['cash']}`
                                document.querySelector('.cash__display').innerHTML = `$${result['cash']}`
                                document.querySelector('.bank__display').innerHTML = `$${result['bank']}`
                                playerCash = result['cash']
                                playerBank = result['bank']
                                error = ""
                                errorField.innerHTML = error
                                popupBank.style.display = "none"
                                blurred.style.display = "none"
                                document.querySelector('body').style.overflow = "scroll"
                            })
                            .catch((error) => {
                            console.error('Error:', error);
                            });
                    }             
                }
            }else {
                error = "You do not have enough cash on your account!"
                errorField.innerHTML = error
            }
        } 
    }

})

let activeBtn = document.querySelector('.btn__bank')
let blurred = document.querySelector('.blur')

activeBtn.addEventListener('click', () => {
    popupBank.style.display = "flex"
    blurred.style.display = "flex"
    document.querySelector('body').style.overflow = "hidden"
})

blurred.addEventListener('click', () => {
    popupBank.style.display = "none"
    blurred.style.display = "none"
    document.querySelector('body').style.overflow = "scroll"
})

warehouseBtn = document.querySelector('.btn__warehouse')

warehouseBtn.addEventListener('click', () => {
    window.location.href = "warehouse.php";
})