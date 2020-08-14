let activateBtn = document.querySelector('.section__perks')
let popupPerks = document.querySelector('.popup__perks')
let errorPerks = document.querySelector('.errorPerk')

let buyPerk = document.querySelector('.btnPerks')
let perkField = document.querySelector('#perkAmount')

/* (perkAmount *2) * 10 = cost of perk */

buyPerk.addEventListener('click', () => {
    let perkAmount = 0
    perkAmount = perkField.value 
    perkType = document.querySelector('#perkTypes').value

    if(perkAmount == "") {
        error = "You must enter the amount of perk points you want to spend"
        errorPerks.innerHTML = error
    }else {
        if(perkAmount <= 0) {
            error = "You cannot add 0 or negative amounts of perk points!"
            errorPerks.innerHTML = error 
        }else {
            if(perkAmount.includes(',') || perkAmount.includes('.')) {
                error = "You cannot use a comma in your amount of perk points!"
                errorPerks.innerHTML = error 
            }else {
                if((usedPerkPoints + parseInt(perkAmount)) > 100 /* 100 is max */) {
                    error = "You cannot spend more perk points than you have available!"
                    errorPerks.innerHTML = error
                }else {
                    if((perkAmount*2)*10 > playerCash) {
                        error = "You don't have enough cash to pay for this transaction!"
                        errorPerks.innerHTML = error
                    }else {
                        error = ""
                        errorPerks.innerHTML = error

                        let formData = new FormData();
                        formData.append('perkamount', perkAmount)  
                        formData.append('token', token)
                        formData.append('perktypes', perkType)
                        fetch('ajax/updatePerks.php', {
                            method: 'POST',
                            body: formData
                            })
                            .then((response) => response.json())
                            .then((result) => {
                                document.querySelector('.cash__display').innerHTML =`$${result.data.cash}` 
                                document.querySelector('.section__perks h2').innerHTML = `perks ${result.data.perksUsed}/100`
                                document.querySelector('.warPerkAmount').innerHTML = `War<br>(${result.data.perkWar})`
                                document.querySelector('.economicsPerkAmount').innerHTML = `Economics<br>(${result.data.perkEconomy})`
                                document.querySelector('.managementPerkAmount').innerHTML = `Management<br>(${result.data.perkManagement})`
                                popupPerks.style.display = "none"
                                blurred.style.display = "none"
                                document.querySelector('body').style.overflow = "scroll"
                            })
                            .catch((error) => {
                            console.error('Error:', error);
                            });
                    }
                }
            }
        }
    }
})

perkField.addEventListener('keyup', () => {
    perkType = document.querySelector('#perkTypes').value
    document.querySelector('.perkDisplay').innerHTML = `${perkType}: ${perkField.value}`
    document.querySelector('.costDisplay').innerHTML = `cost: ${ (perkField.value *2) * 10}`
})

document.querySelector('#perkTypes').addEventListener('change', () => {
    perkType = document.querySelector('#perkTypes').value
    document.querySelector('.perkDisplay').innerHTML = `${perkType}: ${perkField.value}`
    document.querySelector('.costDisplay').innerHTML = `cost: ${ (perkField.value *2) * 10}`
})

activateBtn.addEventListener('click', () => {
    popupPerks.style.display = "flex"
    blurred.style.display = "flex"
    document.querySelector('body').style.overflow = "hidden"
})

blurred.addEventListener('click', () => {
    popupPerks.style.display = "none"
    blurred.style.display = "none"
    document.querySelector('body').style.overflow = "scroll"
})