document.querySelector('#avatar').addEventListener('change', () => {
    const file = document.querySelector('#avatar').files[0]
    if(file) {
        const reader = new FileReader()

        reader.addEventListener('load', () => {
            if(reader.result.includes('image/gif') || reader.result.includes('image/jpeg') || reader.result.includes('image/png') || reader.result.includes('image/jpg')) {
                document.querySelector('.form__avatar').setAttribute('src', reader.result)
            }
        })

        reader.readAsDataURL(file)
    }
})