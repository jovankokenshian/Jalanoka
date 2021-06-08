require('./bootstrap');


if (document.getElementById('bookButton')){
    document.getElementById("bookButton").addEventListener('click', function(event) {
        event.preventDefault();
    
        var elems = document.querySelectorAll(".sectionImage");
        [].forEach.call(elems, function(el) {
          el.classList.remove('animate-fade-in-right');
          el.classList.add('animate-fade-out-left');
        });

        setTimeout(function (){
            document.getElementById("allimage").remove();
        }, 1000);    
    window.location.href = "posts";

    });
}

// window.addEventListener("scroll", () => {
//     const currentScroll = window.pageYOffset;
//     if (currentScroll <= 500) {
//       opacity = 0 + currentScroll / 500;
//     } else {
//       opacity = 1;
//     }
//     document.querySelector(".front").style.opacity = opacity;
//   });
  