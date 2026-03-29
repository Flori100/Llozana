import '../css/app.css'

const observer = new IntersectionObserver((entries) => {

    entries.forEach(entry => {

        if (entry.isIntersecting) {
            entry.target.classList.add('animate-slide-in-down')
        }

    })

})

document.querySelectorAll('.fade-element').forEach(el => {
    observer.observe(el)
})