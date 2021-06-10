require('./bootstrap');
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init();

if (document.getElementById('bookButton')){
    document.getElementById("bookButton").addEventListener('click', function(event) {
        event.preventDefault();
    
        var elems = document.querySelectorAll(".sectionImage");
        [].forEach.call(elems, function(el) {
          el.classList.remove('animate-fade-in-right');
          setTimeout(function (){
            el.classList.add('animate-fade-out-left');
            }, 400);   
        });

        setTimeout(function (){
            document.getElementById("allimage").remove();
        }, 200);    
    window.location.href = "hotel_lists";

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
  