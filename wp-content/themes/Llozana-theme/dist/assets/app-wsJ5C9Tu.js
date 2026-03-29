const s=new IntersectionObserver(e=>{e.forEach(r=>{r.isIntersecting&&r.target.classList.add("animate-slide-in-down")})});document.querySelectorAll(".fade-element").forEach(e=>{s.observe(e)});
